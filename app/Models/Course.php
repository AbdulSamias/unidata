<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'university_id',
        'course_name',
        'course_seats',
        'in_roll_student',
        'balance_seats'
    ];
    public function university()
{
    return $this->belongsTo(University::class);
}
 public function books()
{
    return $this->hasmany(Book::class,'course_id');
}

}
