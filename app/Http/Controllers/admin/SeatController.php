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
        $seats = $seats-> orderBy('id','desc') -> paginate(10);
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
        $seat = new Seat();
        $validator = Validator::make($request->all(), [
           'number_of_row' => 'required',
           'number_of_col' => 'required',
           'auditorium_id' => 'required'
        ]);
        if ($validator->passes()){
            for ($i = 1; $i <= $request->number_of_row; $i++) {
                for ($j = 1; $j <= $request->number_of_col; $j++) {
                    $seat = new Seat;
                    $seat->number_of_row = $i;
                    $seat->number_of_col = $j;
                    $seat->auditorium_id = $request->auditorium_id;
                    $seat->status = 1;
                    $seat->save(); 
                }
            }
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
        $auditoriums = Auditorium::all();
        return view('admin.seat_manager.edit',['seat' => $seat , 'auditoriums' => $auditoriums]);
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
        //    'number_of_row' => 'required',
        //    'number_of_col' => 'required',
        //    'auditorium_id' => 'required'
              'status' => 'required'
        ]);
        if ($validator->passes()){
            // $seat-> number_of_row = $request->number_of_row;
            // $seat-> number_of_col = $request->number_of_col;
            // $seat-> auditorium_id = $request->auditorium_id;
            $seat-> status = $request ->status;
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
