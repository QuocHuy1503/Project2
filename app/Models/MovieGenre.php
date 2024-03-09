<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
    protected $fillable = ['movie_id', 'genre_id'];
    public function genre(){
        return $this -> belongsTo(Genre::class);
    }
    public $timestamps = false;
    use HasFactory;
}
