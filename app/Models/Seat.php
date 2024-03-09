<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = ['number_of_row', 'number'];
    public function auditorium(){
        return $this -> belongsTo(auditorium::class);
    }
 
    use HasFactory;
}
