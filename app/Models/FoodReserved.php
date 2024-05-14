<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodReserved extends Model
{
    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_reserved');
    }
    use HasFactory;
}
