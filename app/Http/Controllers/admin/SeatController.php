<?php

namespace App\Http\Controllers\admin;

use App\Models\Seat;
use App\Models\Auditorium;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SeatController extends Controller
{
    public function index(Request $request){
        $seats = Seat::latest();
        if (!empty($seats->get('number_of_row'))){
            $seats = $seats->where('number_of_row', 'like', '%'.$request->get('number_of_row').'%' );
        }
        $seats = $seats -> paginate(10);
        return view('admin.seat_manager.index', ['seats' => $seats]);
    }
    public function create()
    {
        $seats = Seat::latest();
        $auditoriums = Auditorium::all();
        return view('admin.seat_manager.create',['seats' => $seats , 'auditoriums' => $auditoriums]);
    }

    public function store(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
           'number_of_row' => 'required',
           'auditorium_id' => 'required',
           'number' => 'required'
        ]);
        if ($validator->passes()){
            $seat = new Seat();
            $seat-> auditorium_id = $request->auditorium_id;
            $seat-> number_of_row = $request->number_of_row;
            $seat-> number = $request->number;
            $seat->save();
            $request->session()->flash('success', 'Seat added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Seat added successfully'
            ]);

        }else{
            return response()->json([
               'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function edit(Seat $seat){
        $auditorium = Auditorium::all();
        return view('admin.seat_manager.edit',['seat' => $seat , 'auditorium' => $auditorium]);
    }
    public function update($seatId, Request $request)
    {
        $seat = Seat::find($seatId);
        if (empty($seat)){
            $request->session()->flash('error', 'Seat not found');
            return response()->json([
               'status' => false,
               'notFound' => true,
               'message' => 'Seat not found'
            ]);
        }

       $validator = Validator::make($request->all(), [
           'number_of_row' => 'required',
           'auditorium_id' => 'required',
           'number' => 'required'
        ]);
        if ($validator->passes()){
            $seat-> auditorium_id = $request->auditorium_id;
            $seat-> number_of_row = $request->number_of_row;
            $seat-> number = $request->number;
            $seat->save();

            $request->session()->flash('success', 'Seat updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Seat updated successfully'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function destroy($seatId, Request $request)
    {
        $seat = Seat::find($seatId);
        if (empty($seat)) {
            $request->session()->flash('error', 'Seat not found');
            return response()->json([
                'status' => false,
                'message' => 'Seat not found'
            ]);
        }

        $seat->delete();
        $request->session()->flash('success', 'Seat deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Seat deleted successfully'
        ]);
    }
}
