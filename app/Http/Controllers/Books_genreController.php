<?php

namespace App\Http\Controllers;

use App\Models\Books_genre;
use Illuminate\Http\Request;

class Books_genreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Books_genre::all();
        return view('online_library.layouts.blocks.genre.index', compact('genres'));
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
     * @param  \App\Models\Booksgenre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Books_genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booksgenre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Books_genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booksgenre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books_genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booksgenre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books_genre $genre)
    {
        //
    }
}
