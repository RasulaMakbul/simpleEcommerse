<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #orderBy('id', 'desc')
        $products = Product::latest()->paginate(15);
        return view('products.productList', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('categoryName', 'id')->toArray();
        $colors = Color::pluck('title', 'id')->toArray();
        return view('products.productAdd', compact('categories', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $requestData = ([
            'productName' => $request->productName,
            'category_id' => $request->category_id,
            'unitPrice' => $request->unitPrice,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);
        $product = Product::create($requestData);
        $product->colors()->attach($request->colors);


        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        #dd($product->category->categoryName);
        #return view('product.show',compact('product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $categories = Category::pluck('categoryName', 'id')->toArray();
        $colors = Color::pluck('title', 'id')->toArray();

        $selectedColors = $product->colors()->pluck('id')->toArray();

        return view('Products.productEdit', compact('product', 'categories', 'colors', 'selectedColors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $requestData = [
            'productName' => $request->productName,
            'category_id' => $request->category_id,
            'unitPrice' => $request->unitPrice,
            'stock' => $request->stock,
            'description' => $request->description,
        ];
        $product->update($requestData);
        $product->colors()->sync($request->colors);
        return redirect()->route('product.index');
    }

    public function downloadPdf()
    {
        $products = Product::all();
        #dd($orders);
        $pdf = Pdf::loadView('products.pdf', compact('products'));
        return $pdf->download('products.list.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();
        return redirect()->route('product.index');
    }

    public function trash()
    {
        $products = Product::onlyTrashed()->get();
        return view('products.trash', compact('products'));
    }

    public function restore($id)
    {
        $products = Product::onlyTrashed()->find($id);
        $products->restore();

        return redirect()
            ->route('product.trash');
    }

    public function delete($id)
    {
        try {
            $products = Product::onlyTrashed()->find($id);
            $products->forceDelete();
            $products->colors()->detach();

            return redirect()
                ->route('product.trash')
                ->withMessage('Successfully deleted');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
