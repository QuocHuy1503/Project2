<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    use HasFactory;
    public $timestamps = false;
    public $table = 'customers';
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'phone_number', 'address', 'status', 'created_at', 'updated_at'];


}
