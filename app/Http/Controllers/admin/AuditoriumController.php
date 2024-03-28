<?php

namespace App\Http\Controllers\admin;

use App\Models\Auditorium;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuditoriumController extends Controller
{
    public function index(){
        $auditoriums = Auditorium::all();
        return view('admin.auditorium_manager.index',['auditoriums' => $auditoriums]);
    }
    public function create(){
        return view('admin.auditorium_manager.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'seat_no' => 'required'

        ]);
         if ($validator->passes()){
             $auditoriums = new Auditorium();
             $auditoriums -> name = $request -> name;
             $auditoriums -> seat_no = $request -> seat_no;
             $auditoriums->save();
             $request->session()->flash('success', 'Auditorium added successfully');
             return response()->json([
                 'status' => true,
                 'message' => 'Auditorium added successfully'
             ]);
 
         }else{
             return response()->json([
                'status' => false,
                 'errors' => $validator->errors()
             ]);
         }
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
    public function destroy($genreId, Request $request)
    {
        $auditoriums = Auditorium::find($genreId);
        if (empty($auditoriums)){
            $request->session()->flash('error', 'Auditorium not found');
            return response()->json([
                'status' => true,
                'message' => 'Genre not found'
            ]);
        }

        $auditoriums->delete();
        $request->session()->flash('success', 'Auditorium deleted successfully');
        return response()->json([
           'status' => true,
           'message' => 'Auditorium deleted successfully'
        ]);
    }
}
