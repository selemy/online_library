<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\UpdateRequest;
use App\Http\Requests\Book\UploadRequest;
use App\Models\Book;
use App\Models\Books_author;
use App\Models\Books_genre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $genres = Books_genre::all();
        return view('online_library.layouts.blocks.my_library.files.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    public function getMyLibrary($id)
    {
        $genres = Books_genre::all();
        $user_id = auth()->user()['id'];
        $books = Book::where('user_id', $user_id)->orderByDesc('id')->paginate(4);
        return view('online_library.layouts.blocks.my_library.index', compact('books', 'genres', 'user_id', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $author = DB::table('books_authors')->select('name')->where('id', '=', $book['author_id'])->first()->name;
        $genres = Books_genre::all();
        return view('online_library.layouts.blocks.my_library.files.edit.index', compact('book', 'genres', 'author'))->with('message','Книга успешно обновлена');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param \App\Models\Book $book
     * @return UpdateRequest $request
     */
 function update(UpdateRequest $request, Book $book)
    {
        $request->validated();
        if ($request->hasFile('file_path')) {
            $input = $request->all();
            $value['name'] = $request->input('author_id');
            $book_author = Books_author::create($value);
            $genres = Books_genre::all();
            $file_book = $request->file('file_path');
            $file_image = $request->file('cover_path');
            $data = [];
            $date = Carbon::now()->format('Y-m-d');
            $data['title'] = $request->input('title');
            $data['year'] = $request->input('year');
            $data['author_id'] = $book_author->id;
            $data['genre_id'] = $request->input('genre_id');
            $data['description'] = $request->input('description');
            $data['file_path'] = $file_book->store("books/{$date}", 'public');
            $data['cover_path'] = $file_image->store("images/{$date}", 'public');
            $data['user_id'] = auth()->user()['id'];
            $book->update($data);
        }
        $user_id = auth()->user()['id'];
        $books = Book::where('user_id', $user_id)->orderByDesc('id')->paginate(4);
        return view('online_library.layouts.blocks.my_library.index', compact('books', 'genres', 'user_id'))->with('message','Книга успешно обновлена');
    }

    public function upload(UploadRequest $request)
    {
        $genres = Books_genre::all();
        if ($request->hasFile('file_path')) {
            $value['name'] = $request->input('author_name');
            $author = Books_author::create($value);
            $file_book = $request->file('file_path');
            $file_image = $request->file('cover_path');
            $data = [];
            $date = Carbon::now()->format('Y-m-d');
            $data['title'] = $request->input('title');
            $data['year'] = $request->input('year');
            $data['author_id'] = $author->id;
            $data['genre_id'] = $request->input('genre_id');
            $data['description'] = $request->input('description');
            $data['file_path'] = $file_book->store("books/{$date}", 'public');
            $data['cover_path'] = $file_image->store("images/{$date}", 'public');
            $data['user_id'] = auth()->user()['id'];
            Book::create($data);
        }
        $user_id = auth()->user()['id'];
        $books = Book::where('user_id', $user_id)->orderByDesc('id')->paginate(4);
        return view('online_library.layouts.blocks.my_library.index', compact('books', 'genres', 'user_id'))->with('message','Книга успешно добавлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        $genres = Books_genre::all();
        $user_id = auth()->user()['id'];
        $books = Book::where('user_id', $user_id)->orderByDesc('id')->paginate(4);
        return view('online_library.layouts.blocks.my_library.index', compact('books', 'genres', 'user_id'))->with('message','Книга успешно удалена');
    }
}
