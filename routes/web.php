<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome', ['books' => Book::all()]);
// });

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/create', [BookController::class, 'create'])->name('books.create');
Route::post('/salva-libro', [BookController::class, 'store'])->name('books.store');

