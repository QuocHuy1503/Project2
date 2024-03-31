<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'screening_id',
        'reservation_type_id',
        'reservation_contact',
        'date',
        'status',
        'customer_id'
    ];
    public $timestamps = false;
    public function screening(){
        return $this -> belongsTo(Screening::class);
    }
    public function customer(){
        return $this -> belongsTo(Customer::class);
    }
    // public function employee(){
    //     return $this -> belongsTo(Employee::class);
    // }
    public function seat_reservation(){
        return $this -> hasMany(SeatReserved::class);
    }
    public function reservation_type(){
        return $this -> belongsTo(ReservationType::class);
    }
    use HasFactory;
}
