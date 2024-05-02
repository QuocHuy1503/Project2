<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        Auth::guard('admin')->user();

        $amount = DB::table('reservations')
            ->select(DB::raw('DATE(date) AS reservation_date'), DB::raw('COUNT(*) AS reservations_count'))
            ->groupBy('reservation_date')
            ->orderBy('reservation_date')
            ->get();

        $firstChartData = [];
        foreach ($amount as $income) {
            $firstChartData[] = [
                'label' => $income->reservation_date,
                'y' => $income->reservations_count,
            ];
        }

        $secondChartData = [];
        $seatTypeData = DB::table('reservations')
            ->select('seat_types.name', DB::raw('count(reservations.seat_id) as howMuch'), 'seat_types.price')
            ->join('seats', 'reservations.seat_id', '=', 'seats.id')
            ->join('seat_types', 'seats.type_id', '=', 'seat_types.id')
            ->groupBy('seat_types.name')
            ->get();

        foreach ($seatTypeData as $seatType) {
            $secondChartData[] = [
                'label' => $seatType->name . ' (Price: $' . $seatType->price . ')',
                'y' => $seatType->howMuch 
            ];
        }

        return view('admin.dashboard', [
            'firstChartData' => $firstChartData,
            'secondChartData' => $secondChartData // Pass the processed data for charts
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
