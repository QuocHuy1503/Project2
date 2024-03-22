<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Cast;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //ADMIN
    public function index()
    {
        return view('admin.movie_manager.index');
    }

    public function create()
    {
        $data = [];
        $genres = Genre::orderBy('name', 'ASC')->get();
        $ages = Age::orderBy('name', 'ASC')->get();
        $casts = Cast::orderBy('name', 'ASC')->get();
        $data['genres'] = $genres;
        $data['ages'] = $ages;
        $data['casts'] = $casts;
        return view('admin.movie_manager.create', $data);
    }

    public function store(Request $request)
    {

    }

    // CUSTOMER
    public function show()
    {
        return view('customer.movie.index');
    }
}
