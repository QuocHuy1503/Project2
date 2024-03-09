<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReversationType extends Model
{
    protected $fillable = ['Reservation_type'];
    public function reservation(){
        return $this -> hasMany(Reservation::class);
    }
    use HasFactory;
}
