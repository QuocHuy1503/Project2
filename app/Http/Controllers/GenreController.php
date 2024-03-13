<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    public function index(){
        $genres = Genre::all();
        return view('genres.index',['genre' => $genres]);
    }
    public function create(){
        return view('genres.create');
    }
    public function store(Request $request){
        $request -> validate([
            'name' => 'required'
        ]);
        Genre::create([
            'name' => $request -> name
        ]);
        return redirect(route('genres.index'));
    }
    public function show(){}
    public function update(Request $request, Genre $genre){
        $request -> validate([
            'name' => 'required'
        ]);
        $genre -> update([
            'name' => $request -> name
        ]);
        return redirect(route('genres.index'));
    }
    public function edit(Genre $genre){
        return view('genres.edit', ['genre' => $genre]);
    }
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect(route('genres.index'));
    }
}
