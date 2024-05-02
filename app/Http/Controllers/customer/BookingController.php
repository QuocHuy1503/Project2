<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function checkout()
    {
        if (Auth::check() === false){
            if (!session()->has('url.intended')){
                session(['url.intended' => url()->current()]);
            }
            return redirect()->route('customer.login');
        }
        return view('customer.book_ticket.checkout');
    }
}
