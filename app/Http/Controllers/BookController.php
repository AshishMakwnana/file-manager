<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return Inertia::render('Book/Index', [
            'books' => $books
        ]);
    }

    public function create()
    {
        return Inertia::render('Book/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with([
                'message' => [
                    'type' => 'success',
                    'message' => 'New Book Added successfully'
                ]
            ]);
    }

    public function show(Book $book)
    {
        return Inertia::render('Book/Show', [
            'book' => $book
        ]);
    }

    public function edit(Book $book)
    {
        return Inertia::render('Book/Edit', [
            'book' => $book
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with([
                'message' => [
                    'type' => 'success',
                    'message' => "Book Details \" $book->title \"  updated successfully."
                ]
            ]);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
            ->with([
                'message' => [
                    'type' => 'success',
                    'message' => 'Book deleted successfully.'
                ]
            ]);
    }
}
