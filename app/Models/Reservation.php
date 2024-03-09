<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['screening_id', 'employee_reserved_id', 'reservation_type_id', 'reservation_contact', 'reserved', 'employee_paid_id', 'customer_id', 'paid', 'active'];
    public function screening(){
        return $this -> belongsTo(Screening::class);
    }
    public function customer(){
        return $this -> belongsTo(Customer::class);
    }
    public function employee(){
        return $this -> belongsTo(Employee::class);
    }
    public function seat_reservation(){
        return $this -> hasMany(SeatReserved::class);
    }
    use HasFactory;
}
