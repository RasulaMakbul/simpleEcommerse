<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Sizeshape;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $products = Product::all();
        if ($keyword = request('keyword')) {
            $products = Product::latest()
                ->where('title', 'LIKE', "%{$keyword}%")
                ->paginate(15);
        } else {
            $products = Product::latest()->paginate(15);
        }


        return view('audience.home', compact('categories', 'products'));
    }

    public function productList(Category $category)
    {
        return view('audience.products', compact('category'));
    }
    public function productDetails(Product $product)
    {
        #dd($product);


        return view('audience.product', compact('product'));
    }
}
