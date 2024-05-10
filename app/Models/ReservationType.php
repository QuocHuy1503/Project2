<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationType extends Model
{
    protected $fillable = ['reservation_type'];
    public $timestamp = false;
    public function reservation(){
        return $this -> hasMany(Reservation::class);
    }
    use HasFactory;
}
