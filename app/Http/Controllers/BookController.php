<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $books = Book::orderBy('name', 'asc')->get();

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
        return view('books.create', compact('authors'));
    }
   
    /**
     *
     * @param StoreBookRequest $request
     * @return void
     */
    public function store(StoreBookRequest $request)
    {
        // dd($request);
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

        Book::create($data);

        return Redirect::route('books.index')
            ->with('success', 'Libro inserito');
    }

    /**
     * Book -> modello
     */
    public function show(Book $book)
    {
        $authors = Author::all();
        return view('books.show', compact('book', 'authors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
dd($book);


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

        $book->update($data);

        return Redirect::route('books.index')
            ->with('success', 'Autore inserito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return Redirect::route('books.index')
            ->with('success', 'Libro Eliminato');
    }
}
