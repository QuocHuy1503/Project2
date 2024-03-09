<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeRole extends Model
{
    protected $fillable = ['employee_id', 'role_id'];
    public $timestamps = false;
    public function employee(){
        return $this -> hasMany(Employee::class);
    }
    use HasFactory;
}
