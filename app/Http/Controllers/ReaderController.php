<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $readers = Reader::all();
        return view("readers.index", compact("readers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("readers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $reader = Reader::create($request->all());
        return redirect()->route('readers.index')->with('success','create sucess');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reader $reader)
    {
        $books = $reader->books()->get();
        return view('readers.show', compact(["books", "reader"]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reader $reader)
    {
        return view('readers.edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reader $reader)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $reader->update($request->all());
        return redirect()->route('readers.index')->with('success','updated sucess');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reader $reader)
    {
        //

        $reader->delete();
        return redirect()->route('readers.index')->with('success','');
    }
}
