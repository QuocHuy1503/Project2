<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';
    protected $fillable = ['title', 'director', 
        'cast_id', 'description', 'status', 'image', 'duration_min', 'release_date',
        'language', 'age_id', 'cast_id', 'genre_id','price', 'created_at', 'updated_at'];
    use HasFactory;
}
