<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'age',
        'dob',
        'gender',
        'mobile',
        'password',
        'role', 
    ];
    function UniversityDetail()
    {
        return $this->hasMany(UniversityDetail::class);
    }
}
