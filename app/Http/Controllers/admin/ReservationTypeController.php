<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\ReservationType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ReservationTypeController extends Controller
{
    public function index(Request $request)
    {
        $reservationTypes = ReservationType::latest();
        if (!empty($request->get('keyword'))){
            $reservationTypes = $reservationTypes->where('name', 'like', '%'.$request->get('keyword').'%' );
        }
        $reservationTypes = $reservationTypes->paginate(10);
        return view('admin.reservation_type_manager.index', [
            'reservationTypes' => $reservationTypes
        ]);
    }

    public function create()
    {
        return view('admin.reservation_type_manager.create');
    }

    public function store(Request $request)
    {
        $reservationTypes = new ReservationType();
        $reservationTypes->reservation_type = $request->reservation_type;

        $reservationTypes->save();
        $request->session()->flash('success', 'Reservation Types added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Reservation Types added successfully'
            ]);
    }

    public function edit($reservationTypeId, Request $request)
    {
        $reservationType = ReservationType::find($reservationTypeId);
        if (empty($reservationType)){
            $request->session()->flash('error', 'Reservation Type not found');
            return redirect()->route('reservationTypes.index');
        }
        $data['reservationType'] = $reservationType;
        return view('admin.reservation_type_manager.edit', $data);
    }

    public function update($reservationTypeId, Request $request)
    {
        $reservationsType = ReservationType::find($reservationTypeId);
        if (empty($reservationsType)){
            $request->session()->flash('error', 'Reservation Type not found');

            return response()->json([
               'status' => false,
               'notFound' => true,
                'message' => 'Reservation Type not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'reservation_type' => 'required'
        ]);
        if ($validator->passes()){
            $reservationsType->reservation_type = $request->reservation_type;
            $reservationsType->save();

            $request->session()->flash('success', 'Reservation Type updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Reservation Type updated successfully'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($reservationsTypeId, Request $request)
    {
        $reservationsType = ReservationType::find($reservationsTypeId);
        if (empty($reservationsTypeId)){
            $request->session()->flash('error', 'Reservation Type not found');
            return response()->json([
                'status' => true,
                'message' => 'Reservation Type not found'
            ]);
        }

        $reservationsType->delete();
        $request->session()->flash('success', 'Reservation Type deleted successfully');
        return response()->json([
           'status' => true,
           'message' => 'Reservation Type deleted successfully'
        ]);
    }}
