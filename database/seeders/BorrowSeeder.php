<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Reader;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberBook = Book::count();
        $faker = Faker::create();
        Reader::all()->each(function($reader) use ($numberBook, $faker): void {
            $books = Book::inRandomOrder()->skip(rand(1, $numberBook))->take(3)->get();
            foreach ($books as $book) {
                $bookRemaining = $book->remaining_quantity;
                $quantity = $book->quantity;
                
                if($bookRemaining == $quantity){
                    $book->update([
                        "remaining_quantity" => $bookRemaining -1,
                    ]);

                    DB::table("borrows")->insert([
                        "book_id" => $book->id,
                        "reader_id" => $reader->id,
                        "borrow_date" => $faker->date(),
                        "return_date" => $faker->date(),
                        "status" => 1,
                        "created_at" => now(),
                        "updated_at" => now(),
                    ]);
                }
                else if($bookRemaining >= 1){
                    $result = DB::table("borrows")->where("reader_id", "=",  $reader->id)
                              ->where("book_id", "=",  $book->id)->first();
                    if($result == null){
                        // dump("bằng 0 {$book->id}--{$reader->id}");
                        DB::table("borrows")->insert([
                            "book_id" => $book->id,
                            "reader_id" => $reader->id,
                            "borrow_date" => $faker->date(),
                            "return_date" => $faker->date(),
                            "status" => 1,
                            "created_at" => now(),
                            "updated_at" => now(),
                        ]);
                        $book->update([
                            "remaining_quantity" => $bookRemaining -1,
                        ]);
                    }
                    else{
                        dump("ok {$book->id}--{$reader->id}");

                        DB::table("borrows")
                        ->where("reader_id", "=", $reader->id)
                        ->where("book_id","=", $book->id)
                        ->update([
                            "status" => 2,
                            "updated_at" => now(),
                        ]);
                        $book->update([
                            "remaining_quantity" => $bookRemaining +1,
                        ]);
                    }
                }

                
            }
        });
    }
}
