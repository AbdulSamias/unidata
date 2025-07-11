<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'user_id',
        'university_name'
    ];
    public function courses()
    {
        return $this->hasMany(Course::class, 'university_id');
    }
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
