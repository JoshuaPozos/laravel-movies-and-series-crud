<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collection_Genre = Genre::all();

        return view('genre/index', [
            'genres' => $collection_Genre,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection_Genre = Genre::all();

        return view('genre/create', [
            'genres' => $collection_Genre
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'genre_Name'        => 'required',
        ]);

        $genre = new Genre();

        $store = [];

        foreach ($validated as $column => $value) {
            $store[$column] = $value;
        }

        $genre->fill($store)->save();

        return redirect()->action('GenreController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection_Genre = Genre::find($id);

        return view('genre/edit', [
            'genre' => $collection_Genre,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        $validated = $request->validate([
            'genre_Name'        => 'required',
        ]);

        $store = [];

        foreach ($validated as $column => $value) {
            $store[$column] = $value;
        }

        $genre->fill($store)->update();

        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);

        $genre->delete();

        return redirect()->action('GenreController@index')->with('message', 'Genre deleted!');
    }
}
