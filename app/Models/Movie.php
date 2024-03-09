<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movie';
    protected $fillable = ['title', 'director', 'cast', 'description', 'duration_min', 'release_date', 'language', 'production_studio'];
    public $timestamps = false;
    use HasFactory;
}
