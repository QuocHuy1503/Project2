<?php

namespace App\Http\Controllers\admin;

use App\Models\SeatType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SeatTypeController extends Controller
{
    public function index(Request $request)
    {
        $seatTypes = SeatType::latest();
        if (!empty($request->get('keyword'))){
            $seatTypes = $seatTypes->where('name', 'like', '%'.$request->get('keyword').'%' );
        }
        $seatTypes = SeatType::paginate(11);
        return view('admin.seat_type_manager.index', [
            'seatTypes' => $seatTypes,
        ]);
    }

    public function create()
    {
        return view('admin.seat_type_manager.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required'
        ]);
        if ($validator->passes()){
            $seatType = new SeatType();
            $seatType->name = $request->name;
            $seatType->price = $request->price;
            $seatType->save();

            $request->session()->flash('success', 'Seat Type added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Seat Type added successfully'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($seatTypeId, Request $request)
    {
        $seatType = SeatType::find($seatTypeId);
        if (empty($seatType)){
            $request->session()->flash('error', 'Seat Type not found');
            return redirect()->route('seatType.index');
        }
        $data['seatType'] = $seatType;
        return view('admin.seat_type_manager.edit', $data);
    }

    public function update($seatTypeId, Request $request)
    {
        $seatType = SeatType::find($seatTypeId);
        if (empty($seatType)){
            $request->session()->flash('error', 'seatType not found');

            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'seatType not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required'
        ]);
        if ($validator->passes()){
            $seatType->name = $request->name;
            $seatType->price = $request -> price;
            $seatType->save();

            $request->session()->flash('success', 'seatType updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'seatType updated successfully'
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
        if (empty($seatType)){
            $request->session()->flash('error', 'seatType not found');
            return response()->json([
                'status' => true,
                'message' => 'seatType not found'
            ]);
        }

        $seatType->delete();
        $request->session()->flash('success', 'seatType deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'seatType deleted successfully'
        ]);
    }
}
