<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorBook;
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
        $search = $request->query("search");
    
        $booksList = AuthorBook::with("author", "book")->get();
    
        return view("books.index", compact("booksList", "search"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $book = new Book();
        $book->title = $request->title;
        $book->save();
    
        foreach ($request->authors as $authorName) {
            $author = Author::firstOrCreate(['name' => $authorName]);
            $book->authors()->attach($author->id);
        }
    
        return redirect()->route("home")->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view("books.show", compact("id"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
