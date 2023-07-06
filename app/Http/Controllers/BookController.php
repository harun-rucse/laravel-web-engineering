<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Barryvdh\DomPDF\Facade\Pdf;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::get();
        return view('books.index', ['books' => $books, 'search' => '']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'stock' => 'required|numeric',
            'isbn' => 'required|min:8|max:255|unique:books',
            'price' => 'required|numeric|min:0'
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'stock' => $request->stock,
            'isbn' => $request->isbn,
            'price' => $request->price
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::where('id', $id)->first();
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'stock' => 'required|numeric',
            'isbn' => 'required|min:8|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        Book::where('id', $id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'stock' => $request->stock,
            'isbn' => $request->isbn,
            'price' => $request->price
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::where('id', $id)->delete();

        return redirect()->route('books.index');
    }

    /**
     * Search the specified resource from storage.
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $books = Book::where('title', 'like', '%' . $search . '%')->get();

        return view('books.index', ['books' => $books, 'search' => $search]);
    }

    /**
     * Download all books as pdf.
     */
    public function download()
    {
        $books = Book::get();
        $pdf = Pdf::loadView('books.download', ['books' => $books]);

        return $pdf->download('books.pdf');
    }
}
