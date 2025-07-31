<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    public function index()
    {
        if (Gate::allows('admin.access')) {
            $books = Book::orderBy('user_id', 'desc')->paginate(12);
            return view("admin.book", ['books' => $books]);
        }
    }

    public function create()
    {
        return view('admin.book_create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:40'],
            'description' => ['required', 'string', 'max:250'],
            'author' => ['required', 'string', 'max:40'],
        ]);
        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
        ]);
        return redirect('book')->with('success', ' A Book Created successfully.');

    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.book_show', ['book' => $book]);
    }
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('admin.book_edit', ['book' => $book]);
    }
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $request->validate([
            'title' => ['required', 'string', 'max:40'],
            'description' => ['required', 'string', 'max:250'],
            'author' => ['required', 'string', 'max:40'],
        ]);
        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
        ]);
        return redirect('book')->with('success', 'Book Updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete(); // Use delete() to remove the book
        return redirect()->route('book.index')->with('error', 'Book deleted successfully.');
    }

}
