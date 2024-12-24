<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    
    public function index()
    {
        $borrows = DB::table("borrows")
        ->join("books","borrows.book_id","=","books.id")
        ->join("readers","borrows.reader_id","=","readers.id")
        ->select("borrows.*", "books.name as book_name", 
                "readers.name as reader_name", "books.category", "readers.phone")
        ->orderBy("id", "desc")
        ->get();

        // dd($borrows);
        return view("borrows.index", compact("borrows"));
    }

    public function create()
    {
        $readers = Reader::all();
        $books = Book::all();
        return view("borrows.create", compact(["readers","books"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::table("borrows")->insert([
            "book_id"=> $request->book_id,
            "reader_id" => $request->reader_id,
            "borrow_date" => $request->borrow_date,
            "return_date" => $request->return_date,
            "status" => 1,
        ]);

        $book = Book::find($request->book_id);
        // dd($book);
        // dd($book->remaining_quantity);

        $book->remaining_quantity = $book->remaining_quantity -1;
        $book->save();

        return redirect()->route("borrows.index")->with("success","tạo thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrow = DB::table("borrows")->where("id", $id)->first();
        // dd($borrow);
        $book = Book::find($borrow->book_id);
        $reader = Reader::find($borrow->reader_id);

        return view("borrows.show", compact(["borrow","book","reader"]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $borrow = DB::table("borrows")->where("id", "=", $id)->first();
        $books = Book::all();
        $readers = Reader::all();
        // dd($borrow);
        return view("borrows.edit", compact(["borrow","books","readers"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status = $request->status;
        $borrow = DB::table("borrows")->where("id", $id);

        $bValue = $borrow->first();
        $book = Book::find($bValue->book_id);
        
        $borrow->update([
            "book_id"=> $request->book_id,
            "reader_id" => $request->reader_id,
            "borrow_date" => $request->borrow_date,
            "return_date" => $request->return_date,
            "status" => $status,
        ]);

        if( $status != (string)$bValue->status){
            if($status == "1"){
                Book::where("id", $book->id)->update([
                    "remaining_quantity" => $book->remaining_quantity - 1
                ]);
            }
            else{
                Book::where("id", $book->id)->update([
                    "remaining_quantity"=> $book->remaining_quantity + 1
                    ]);
            }
        }



        return redirect()->route("borrows.index")->with("success","ok");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd("không xóa nhé");
        // DB::table("borrows")->where("id", $id)->delete();
        // return redirect()->route("borrows.index")->with("success","xóa ok");
    }
}
