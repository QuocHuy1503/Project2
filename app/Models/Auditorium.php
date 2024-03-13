<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditorium extends Model
{
    public $table = 'auditorium';
    protected $fillable = ['name', 'seat_no'];
    public $timestamps = false;
    use HasFactory;
}
