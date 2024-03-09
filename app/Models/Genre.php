<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];
    public function movieGenre(){
        return $this -> hasMany(MovieGenre::class);
    }
    use HasFactory;
}
