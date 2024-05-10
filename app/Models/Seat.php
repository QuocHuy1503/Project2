<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'number_of_row',
        'number_of_col',
        'status',
        'auditorium_id',
        'type_id',
    ];    public $timestamps = false;
    public function auditorium(){
        return $this -> belongsTo(auditorium::class);
    }
    public function seatType()
    {
        return $this->belongsTo(SeatType::class);
    }
    use HasFactory;
}
