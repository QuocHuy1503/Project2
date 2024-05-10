<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Screening;
use App\Models\Seat;
use App\Models\SeatReserved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{

    public function choosingScreening($id, Request $request){
        $movie_id = Movie::find($id)->id;
        if (empty($movie_id)){
            $request->session()->flash('error', 'Movie not found');
            return redirect()->route('movie');
        }
        $screening = Screening::all()->where('movie_id','=',$request->movie_id);
        return view('customer.book_ticket.bookingProcess',[
            'screening' => $screening,
            'movie_id' => $movie_id
        ]);
    }

    public function postScreening(Request $request){
        $movie = $request -> movie_id;
        $screening = $request -> screening_id;
        return redirect()->route('choosingSeat', [
                'movie_id' => $movie,
                'screening_id' => $screening
            ]
        );
    }

    public function choosingSeat($id, Request $request){
        $movie_id = Movie::find($id);
        if (empty($movie_id)){
            $request->session()->flash('error', 'Movie not found');
            return redirect()->route('movie');
        }
        $screeningId = $request->screening_id;
        $reservedSeats = SeatReserved::where('screening_id', $screeningId)->get();
        $seats  = Seat::where('auditorium_id','=', 1 )->orderBy('number_of_col','asc')->orderBy('id','asc')->get();
        return view('customer.book_ticket.step-two',[
            'movie_id' => $movie_id,
            'seats' => $seats,
            'screening_id' => $request -> screening_id,
            'reservedSeats'=> $reservedSeats,
        ]);
    }

    public function bookingStore(Request $request){
        $id = Auth::guard('customer')->user()->id;
        $customer = Customer::find($id);
        //
        $movie = Movie::find($id);
        $validator = Validator::make($request->all(), [
            'movie' => 'required',
            'screening_id' => 'required',
            'customer_id' => 'required',
            'seat_id' => 'required'
        ]);
        // if($validator->passes()){
        $contact = $customer -> phone_number;
        foreach($request->seat_id as $seat){
            $reservation = Reservation::create([
                'movie' => $movie,
                'screening_id' => $request->screening_id,
                'customer_id' => $id,
                'status' => 1,
                'date' => now(),
                'seat_id' => $seat,
                'reservation_contact' => $contact,
            ]);
//            // Có khi không cần cái này nữa?

            SeatReserved::create([
                'seat_id' => $seat,
                'reservation_id' => $reservation->id,
                'screening_id' => $request->screening_id,
            ]);
        }
        return redirect(route('choosingMovie'));
        // }
        // else{
        //     return back();
        // }
    }

    public function checkout()
    {
        if (Auth::guard('customer')->check() === false){
            if (!session()->has('url.intended')){
                session(['url.intended' => url()->current()]);
            }
            return redirect()->route('customer.login');
        }
        session()->forget('url.intended');
        return view('customer.book_ticket.checkout');
    }
}
