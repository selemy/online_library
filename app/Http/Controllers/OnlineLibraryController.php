<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Books_genre;
use App\Models\User;
use Illuminate\Http\Request;

class OnlineLibraryController extends Controller
{
    public function index()
    {
        $genres = Books_genre::all();
        $books = Book::with('author')->orderByDesc('id')->paginate(4);
        return view('online_library.index', compact('genres', 'books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        $genres = Books_genre::all();
        return view('online_library.show', compact('book', 'genres'));
    }

    public function getBooksWithGenre($id)
    {
        $genres = Books_genre::all();
        $genre = Books_genre::findOrFail($id);
        $books = Book::where('genre_id', $genre['id'])->orderByDesc('id')->paginate(4);
        return view('online_library.index', compact('books', 'genres', 'genre'));
    }
}
