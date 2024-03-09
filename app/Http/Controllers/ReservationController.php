<?php

namespace App\Http\Controllers;

use App\Models\Auditorium;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    //
    public function index(){
        $seats = Seat::select('number_of_row as hang', DB::raw('MAX(number) as so_ghe'))
        ->groupBy('number_of_row')
        ->get();
        $auditoriums = Auditorium::all();
        return view('booking/index',compact('seats','auditoriums')); 
    }
    
    public function store(Request $request){
        $data = $request -> validate([
            'id' => 'required',
            'name' => 'required',
        ]);
        Auditorium::create(['id' => $request -> id, 'name' => $request-> name ]);
        redirect(route('/booking'));
    }
}
