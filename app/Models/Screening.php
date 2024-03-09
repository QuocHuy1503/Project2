<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    protected $fillable = ['movie_id', 'screening_start'];
    public function movie(){
        return $this -> belongsTo(Movie::class);
    }
    public function seat_reservation(){
        return $this -> hasMany(SeatReserved::class);
    }
    public function reservation(){
        return $this -> hasMany(Reservation::class);
    }
    use HasFactory;
}
