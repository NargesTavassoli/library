<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'author',
        'publisher',
        'year',
        'price',
    ];

    public function stock()
    {
        return $this->hasOne(Stock::class, 'book_id' , 'id');
    }
}
