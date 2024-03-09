<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //
    public function index(){
        $movies = Movie::all();
        return view('Movie.index' , compact('movies'));
    }
    public function create(){
        return view('movie.create');
    }
    public function store(Request $request){
       $request -> validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'cast' => 'required|string',
            'description' => 'required|string',
            'duration_min' => 'required|integer|min:1',
            'release_date' => 'required|date',
            'language' => 'required|string|max:50',
            'production_studio' => 'required|string|max:255',
        ]);
        Movie::create([
            'title' => $request -> title,
            'director' => $request -> director,
            'cast' => $request -> cast,
            'description' => $request -> description,
            'duration_min' => $request -> duration_min,
            'release_date' => $request -> release_date,
            'language' => $request -> language,
            'production_studio' => $request -> production_studio,
        ]);
        return redirect(route('movie.index'));
    }
    public function show(){}
    public function update(Movie $movie, Request $request){
        $request -> validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'cast' => 'required|string',
            'description' => 'required|string',
            'duration_min' => 'required|integer|min:1',
            'release_date' => 'required|date',
            'language' => 'required|string|max:50',
            'production_studio' => 'required|string|max:255',
        ]);
        $movie -> update([
            'title' => $request -> title,
            'director' => $request -> director,
            'cast' => $request -> cast,
            'description' => $request -> description,
            'duration_min' => $request -> duration_min,
            'release_date' => $request -> release_date,
            'language' => $request -> language,
            'production_studio' => $request -> production_studio,
        ]);
        return redirect(route('movie.index'));
    }
    public function edit(Movie $movie){
        return view('movie.edit', ['movie' => $movie]);
    }
    public function destroy(Movie $movies, Request $request)
    {
        $movies->delete();
        return redirect(route('movie.index'));
    }
}
