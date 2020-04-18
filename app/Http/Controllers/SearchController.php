<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Books_genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $genres = Books_genre::all();
        $search = $request->get('search');
        $books_authors = DB::table('books_authors')->select('id')->where('name', 'like', '%'.$search.'%')->first('id');
        $books = Book::where('title', 'like', '%'.$search.'%')->orWhere(function($query) use ($books_authors) {
            if($books_authors){
                $query->where('author_id', '=', $books_authors->id);
            }
        })->paginate(50);
        return view('online_library.index', ['books' => $books], compact('genres', 'books', 'books_authors'));
    }
}
