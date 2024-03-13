<?php

namespace App\Http\Controllers;

use App\Models\Auditorium;
use Illuminate\Http\Request;

class AuditoriumController extends Controller
{
    //
    public function index(){
        $auditoriums = Auditorium::all();
        return view('auditoriums.index',['auditorium' => $auditoriums]);
    }
    public function create(){
        return view('auditoriums.create');
    }
    public function store(Request $request){
        $request -> validate([
            'name' => 'required',
            'seat_no' => 'required'

        ]);
        Auditorium::create([
            'name' => $request -> name,
            'seat_no' => $request -> seat_no
        ]);
        return redirect(route('auditoriums.index'));
    }
    public function show(){}
    
    public function update(Request $request, Auditorium $auditoriums){
        $request -> validate([
            'name' => 'required',
            'seat_no' => 'required'
        ]);
        $auditoriums -> update([
            'name' => $request -> name,
            'seat_no' => $request -> seat_no
        ]);
        return redirect(route('auditoriums.index'));
    }
    public function edit(Auditorium $auditorium){
        return view('auditoriums.edit', ['auditorium' => $auditorium]);
    }
    public function destroy(Auditorium $auditoriums)
    {
        $auditoriums->delete();
        return redirect(route('auditoriums.index'));
    }
}
