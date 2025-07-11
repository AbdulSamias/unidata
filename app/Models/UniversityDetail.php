<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class UniversityDetail extends Model
{
    protected $fillable = [
        'user_id',
        'uni_name',
        'course',
        'semester',
        'books',
    ];
    public $timestamps = false;
    
}
