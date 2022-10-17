<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizeshapeRequest;
use App\Models\Sizeshape;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SizeshapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizeshapes = Sizeshape::latest()->paginate(15);
        return view('sizeshape.index', compact('sizeshapes'));
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
    public function store(SizeshapeRequest $request)
    {
        #dd($request);
        Sizeshape::create([
            'title' => $request->title,
        ]);
        return redirect()->route('sizeshape.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sizeshape  $sizeshape
     * @return \Illuminate\Http\Response
     */
    public function show(Sizeshape $sizeshape)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sizeshape  $sizeshape
     * @return \Illuminate\Http\Response
     */
    public function edit(Sizeshape $sizeshape)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sizeshape  $sizeshape
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sizeshape $sizeshape)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sizeshape  $sizeshape
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sizeshape $sizeshape)
    {
        $sizeshape->delete();
        return redirect()->route('sizeshape.index');
    }

    public function trash()
    {
        $sizeshapes = Sizeshape::onlyTrashed()->get();
        return view('sizeshape.trash', compact('sizeshapes'));
    }

    public function restore($id)
    {
        $sizeshapes = Sizeshape::onlyTrashed()->find($id);
        $sizeshapes->restore();

        return redirect()
            ->route('sizeshape.trash');
    }

    public function delete($id)
    {
        try {
            $sizeshapes = Sizeshape::onlyTrashed()->find($id);
            $sizeshapes->forceDelete();

            return redirect()
                ->route('sizeshape.trash')
                ->withMessage('Successfully deleted');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
