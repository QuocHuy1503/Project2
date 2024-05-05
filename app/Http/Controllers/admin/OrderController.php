<?php

namespace App\Http\Controllers\admin;

use App\Models\Seat;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Customer;
use App\Models\Screening;
use App\Models\MovieGenre;
use App\Models\Reservation;
use App\Models\SeatReserved;
use Illuminate\Http\Request;
use App\Models\ReservationType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Reservation::latest();
        if (!empty($request->get('keyword'))){
            $orders = $orders->where('screening_id', 'like', '%'.$request->get('keyword').'%' );
        }
        $orders = Reservation::paginate(10);
        return view('admin.order_manager.index', [
            'orders' => $orders,
        ]);
    }

    public function create()
    {
        return view('admin.order_manager.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'screening_id' => 'require',
            'reservation_type_id' => 'require',
            'reservation_contact' => 'require',
            'date' => 'require',
            'status' => 'require',
            'customer_id' => 'require'
        ]);
        if ($validator->passes()){
            $orders = new Reservation();
            $orders-> screening_id = $request->screening_id;
            $orders-> reservation_type_id = $request->reservation_type_id;
            $orders-> date = $request->date;
            $orders-> reservation_contact = $request->reservation_contact;
            $orders->status = $request->status;
            $orders->save();
            $request->session()->flash('success', 'Orders added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Orders added successfully'
            ]);

        }else{
            return response()->json([
               'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($orderId, Request $request)
    {
        $order = Reservation::find($orderId);
        if (empty($order)){
            $request->session()->flash('error', 'Order not found');
            return redirect()->route('order.index');
        }
        $data['order'] = $order;
        return view('admin.order_manager.edit', $data);
    }

    public function update($orderId, Request $request)
    {
        $order = Reservation::find($orderId);
        if (empty($order)){
            $request->session()->flash('error', 'Order not found');

            return response()->json([
               'status' => false,
               'notFound' => true,
                'message' => 'Order not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            // 'status' => 'required',
            'screening_id' => 'require',
            'reservation_type_id' => 'require',
            'reservation_contact' => 'require',
            'date' => 'require',
            'customer_id' => 'require'
        ]);
        if ($validator->passes()){
            $order->status = $request->status;
            $order->save();
            $request->session()->flash('success', 'Order updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Order updated successfully'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($orderId, Request $request)
    {
        $order = Reservation::find($orderId);
        if (empty($order)){
            $request->session()->flash('error', 'Order not found');
            return response()->json([
                'status' => true,
                'message' => 'Order not found'
            ]);
        }

        $order->delete();
        $request->session()->flash('success', 'Order deleted successfully');
        return response()->json([
           'status' => true,
           'message' => 'Order deleted successfully'
        ]);
    }


    public function choosingMovie(){
        $genres = Genre::all();
        $data['genres'] = $genres;
        $movieGenres = MovieGenre::all();
        $data['movieGenres'] = $movieGenres;
        $movies = Movie::where('is_featured', 'Yes')->where('status', 1)->get();
        $data['isFeatures'] = $movies;
        $latestMovies = Movie::orderBy('id', 'DESC')->where('status', 1)->get();
        $data['latestMovies'] = $latestMovies;
        return view('Booking.choosingMovie', ['movies' => $movies , 
        'movieGenres' => $movieGenres , 'genres' => $genres,
        ]);
    }

    public function postMovie(Request $request){
        $movie = $request -> id;
        return redirect(route('choosingScreening',['movie_id' => $movie]));
    }
    
    public function choosingScreening(Request $request){
        $screening = Screening::all()->where('movie_id','=',$request->movie_id);
        return view('Booking.choosingScreening',[
            'screening' => $screening,
        ]);
    }

    public function postScreening(Request $request){
        $movie = $request -> movie_id;
        $screening = $request -> screening_id;
            return redirect(route('choosingSeat',
                [
                    'movie_id' => $movie,
                    'screening_id' => $screening
                ]
            )
        );
    }

    public function choosingSeat(Request $request){
        $screeningId = $request->screening_id; 
        $reservedSeats = SeatReserved::where('screening_id', $screeningId)->get();
        $seats  = Seat::where('auditorium_id','=', 1 )->orderBy('number_of_col','asc')->orderBy('id','asc')->get();
        return view('Booking.choosingSeat',[
            'seats' => $seats,
            'screening_id' => $request -> screening_id,
            'reservedSeats'=> $reservedSeats,
        ]);
    }



    public function bookingStore(Request $request){
        $id = Auth::guard('customer')->user()->id;
        $customer = Customer::find($id);
        // 

        $validator = Validator::make($request->all(), [
            'screening_id' => 'required',
            'customer_id' => 'required',
            'seat_id' => 'required' 
        ]);
        // if($validator->passes()){
        $contact = $customer -> phone_number;
            foreach($request->seat_id as $seat){
                $reservation = Reservation::create([
                    'screening_id' => $request->screening_id,
                    'customer_id' => $id,
                    'status' => 1,
                    'date' => now(),
                    'seat_id' => $seat,
                    'reservation_contact' => $contact,
                ]);
                // Có khi không cần cái này nữa?
                $updateBookedSeat = Seat::find($seat);
                $updateBookedSeat -> status = 2;
                $updateBookedSeat -> save();   
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
}
