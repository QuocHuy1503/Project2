<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatType extends Model
{
    protected $fillable = ['seat_type'];
    public $timestamp = false;
    public function seat(){
        return $this -> hasMany(Seat::class);
    }
    use HasFactory;
}
