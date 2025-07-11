<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    protected $fillable = [
        'book_id',
        'title',
        'author',
        'description',
        'cover_image'
    ];
}
