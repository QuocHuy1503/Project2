<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'screening_id',
        'seat_id',
        'reservation_contact',
        'payment_date',
        'payment_amount',
        'status',
        'customer_id',
        'user_id',
        'pay_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
    public function screening(){
        return $this -> belongsTo(Screening::class);
    }
    public function customer(){
        return $this -> belongsTo(Customer::class);
    }
    public function seat(){
        return $this -> hasMany(Seat::class, 'seat_reserved');
    }
    public function seat_reservation(){
        return $this -> hasMany(SeatReserved::class);
    }


    use HasFactory;
}
