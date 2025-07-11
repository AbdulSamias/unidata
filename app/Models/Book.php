<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'course_id',
        'book_name',
        'book_price',
        'book_stock',
        'book_sale',
        'available_book'
    ];
     public function courses()
{
    return $this->belongsTo(Course::class,'university_id');
}
}
