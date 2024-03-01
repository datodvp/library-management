<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');
        $authors = Author::all();

        $books = Book::where('title', 'like', '%' . $search . '%')
            ->orWhereHas('authors', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->with('authors')
            ->get();

        return view('books.index', compact('books', 'search', 'authors'));
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
        $book = new Book();
        $book->title = $request->title;
        $book->release_date = $request->release_date;
        $book->available = $request->available;
        $book->save();

        foreach ($request->authors as $authorName) {
            $author = Author::firstOrCreate(['name' => $authorName]);
            $book->authors()->attach($author->id);
        }

        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);

        return view('books.edit', compact('id', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->title = $request->title;
        $book->release_date = $request->release_date;
        $book->available = $request->available;
        $book->save();

        $book->authors()->detach();

        foreach ($request->authors as $authorName) {
            $author = Author::firstOrCreate(['name' => $authorName]);
            $book->authors()->attach($author->id);
        }

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->back();
    }
}
