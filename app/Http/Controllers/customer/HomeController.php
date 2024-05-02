<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $data['genres'] = $genres;
        $movieGenres = MovieGenre::all();
        $data['movieGenres'] = $movieGenres;
        $movies = Movie::where('is_featured', 'Yes')->where('status', 1)->get();
        $data['isFeatures'] = $movies;
        $latestMovies = Movie::orderBy('id', 'DESC')->where('status', 1)->get();
        $data['latestMovies'] = $latestMovies;
        return view('customer.home', $data);
    }

    public function addToWishlist (Request $request)
    {
        if ((Auth::guard('customer')->check()) == false){

            session(['url.intended' => url()->previous()]);
            return response()->json([
                'status' => false
            ]);
        }
        $movie = Movie::where('id', $request->id)->first();
        if ($movie == null){
            return response()->json([
                'status' => true,
                'message' => '<div class="alert alert-danger">Movie not found.</div>'
            ]);
        }

        WishList::updateOrCreate([
                'customer_id' => Auth::guard('customer')->user()->id,
                'movie_id' => $request->id,
            ],
            [
                'customer_id' => Auth::guard('customer')->user()->id,
                'movie_id' => $request->id,
            ]
        );
//        $wishlist = new WishList;
//        $wishlist->customer_id = Auth::guard('customer')->user()->id;
//        $wishlist->movie_id = $request->id;
//        $wishlist->save();

        return response()->json([
            'status' => true,
            'message' => '<div class="alert alert-success"><strong>"'.$movie->title.'"</strong> added in your wish list</div>'
        ]);
    }

    public function sendContactEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:10',
        ]);

        if ($validator->passes()){
            //send email here
            $mailData = [
              'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'mail_subject' => 'You have received a contact email'
            ];

            $admin = User::where('id', 1)->first();
            Mail::to($admin->email)->send(new ContactEmail($mailData));
            session()->flash('success', 'Thanks for contacting us, we will get back to you soon.');
            return response()->json([
                'status' => true,
            ]);

        }else{
            return response()->json([
               'status' => false,
               'errors' => $validator->errors()
            ]);
        }
    }
}













