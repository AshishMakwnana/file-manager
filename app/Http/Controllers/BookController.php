<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return Inertia::render('Books/Index', [
            'books' => $books
        ]);
    }

    public function create()
    {
        return Inertia::render('Books/Create');
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
            ->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return Inertia::render('Books/Show', [
            'book' => $book
        ]);
    }

    public function edit(Book $book)
    {
        return Inertia::render('Books/Edit', [
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
            ->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
