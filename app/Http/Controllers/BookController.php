<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function catalog()
    {
        $books = Book::orderBy('name', 'asc')->paginate(5);
        return view('books.catalog', compact('books'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $books = Book::orderBy('name', 'asc')->get();

        // $books = Book::orderBy('name', 'asc')->paginate(5);
        return view('books.index', compact('books'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();

        return view('books.create', compact('authors', 'categories'));
    }
   
    /**
     *
     * @param StoreBookRequest $request
     * @return void
     */
    public function store(StoreBookRequest $request)
    {
        $coverName = $request->file('image')->getClientOriginalName();
        $coverPath = $request->file('image')->storeAs('cover', $coverName, 'public');

        $data = [
            'name' => $request->name,
            'author' => $request->author,
            'image' => $coverPath,
            'page' => $request->page,
            'year' => $request->year,
            'author_id' => $request->author_id
        ];

        $book = Book::create($data);
        $book->categories()->attach($request->categories);

        return Redirect::route('books.index')
            ->with('success', 'Libro inserito');
    }

    /**
     * Book -> modello
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $coverPath = $book->image;
        if ($request->hasFile('image')) {
            $coverName = $request->file('image')->getClientOriginalName();
            $coverPath = $request->file('image')->storeAs('cover', $coverName, 'public');
        }
        
        $data = [
            'name' => $request->name,
            'author' => $request->author,
            'image' => $coverPath,
            'page' => $request->page,
            'year' => $request->year,
            'author_id' => $request->author_id
        ];

        $book->categories()->detach();
        $book->update($data);
        $book->categories()->attach($request->categories);

        return Redirect::route('books.index')
            ->with('success', 'Autore inserito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->categories()->detach();
        $book->delete();
        return Redirect::route('books.index')
            ->with('success', 'Libro Eliminato');
    }
}
