<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReaderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource("books", BookController::class);
Route::resource("readers", ReaderController::class);

Route::controller(BorrowController::class)->group(function () {
    Route::get("/borrows", "index")->name("borrows.index");
    Route::get("/borrows/create", "create")->name("borrows.create");
    Route::get("/borrows/{id}", "show")->name("borrows.show");
    Route::get("/borrows/{id}/edit", "edit")->name("borrows.edit");
    Route::delete("/borrows/{id}", "destroy")->name("borrows.destroy");
    Route::post("/borrows", "store")->name("borrows.store");
    Route::put("/borrows/{id}", "update")->name("borrows.update");
});
