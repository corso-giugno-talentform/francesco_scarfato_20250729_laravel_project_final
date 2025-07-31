<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
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
        return view('books.create');
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
            'year' => $request->year
        ];

        Book::create($data);

        return Redirect::route('books.index')
            ->with('success', 'Libro inserito');
    }

}
