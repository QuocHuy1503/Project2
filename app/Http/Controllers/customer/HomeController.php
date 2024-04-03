<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $data['genres'] = $genres;
        $movieGenres = MovieGenre::all();
        $data['movieGenres'] = $movieGenres;
        $movies = Movie::where('is_featured', 'Yes')->where('status', 1)->get();
        $data['isFeatures'] = $movies;
        $latestMovies = Movie::orderBy('id', 'DESC')->where('status', 1)->take(1)->get();
        $data['latestMovies'] = $latestMovies;
        return view('customer.home', $data);
    }
}
