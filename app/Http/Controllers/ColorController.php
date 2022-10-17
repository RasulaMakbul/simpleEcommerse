<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::latest()->paginate(15);
        return view('color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {
        Color::create([
            'title' => $request->title,
            'colorCode' => $request->colorCode,
        ]);
        return redirect()->route('color.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('color.index');
    }

    public function trash()
    {
        $colors = Color::onlyTrashed()->get();
        return view('color.trash', compact('colors'));
    }

    public function restore($id)
    {
        $colors = Color::onlyTrashed()->find($id);
        $colors->restore();

        return redirect()
            ->route('color.trash');
    }

    public function delete($id)
    {
        try {
            $colors = Color::onlyTrashed()->find($id);
            $colors->forceDelete();

            return redirect()
                ->route('color.trash')
                ->withMessage('Successfully deleted');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
