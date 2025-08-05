<?php

// use App\Http\Controllers\BookController;
// use App\Http\Controllers\PageController;

use App\Http\Controllers\{AuthorController, BookController, CategoryController, PageController};
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('homepage');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/books/{book}/show', [BookController::class, 'show'])->name('books.show');

Route::get('/books/catalog', [BookController::class, 'catalog'])->name('books.catalog');
Route::middleware(['auth'])->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}/update', [BookController::class, 'update'])->name('books.update');
    Route::get('/books/{book}/details', [BookController::class, 'create'])->name('books.details');
    Route::post('/books/add-book', [BookController::class, 'store'])->name('books.store');
});

Route::resource('authors', AuthorController::class);
Route::resource('categories', CategoryController::class);
