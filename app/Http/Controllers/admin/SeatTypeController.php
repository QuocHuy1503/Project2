<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\SeatType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SeatTypeController extends Controller
{
    public function index(Request $request)
    {
        $SeatTypes = SeatType::latest();
        if (!empty($request->get('keyword'))){
            $SeatTypes = $SeatTypes->where('name', 'like', '%'.$request->get('keyword').'%' );
        }
        $SeatTypes = $SeatTypes->paginate(10);
        return view('admin.seat_type_manager.index', [
            'seatTypes' => $SeatTypes
        ]);
    }

    public function create()
    {
        return view('admin.seat_type_manager.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->passes()){
            $SeatTypes = new SeatType();
            $SeatTypes->name = $request->name;
            $SeatTypes->save();
             $request->session()->flash('success', 'Seat Types added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Seat Types added successfully'
            ]);
        }
    }

    public function edit($SeatTypeId, Request $request)
    {
        $SeatType = SeatType::find($SeatTypeId);
        if (empty($SeatType)){
            $request->session()->flash('error', 'Seat Type not found');
            return redirect()->route('SeatTypes.index');
        }
        $data['SeatType'] = $SeatType;
        return view('admin.seat_type_manager.edit', $data);
    }

    public function update($SeatTypeId, Request $request)
    {
        $seatType = SeatType::find($SeatTypeId);
        if (empty($seatType)){
            $request->session()->flash('error', 'Seat Type not found');

            return response()->json([
               'status' => false,
               'notFound' => true,
                'message' => 'Seat Type not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->passes()){
            $seatType->name = $request->name;
            $seatType->save();

            $request->session()->flash('success', 'Seat Type updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Seat Type updated successfully'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($seatTypeId, Request $request)
    {
        $seatType = SeatType::find($seatTypeId);
        if (empty($seatTypeId)){
            $request->session()->flash('error', 'Seat Type not found');
            return response()->json([
                'status' => true,
                'message' => 'Seat Type not found'
            ]);
        }

        $seatType->delete();
        $request->session()->flash('success', 'Seat Type deleted successfully');
        return response()->json([
           'status' => true,
           'message' => 'Seat Type deleted successfully'
        ]);
    }}
