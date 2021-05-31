<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'author',
        'publisher',
        'year',
        'price',
        'validation',
    ];

    protected $perPage = 4;

    public function stock()
    {
        return $this->hasOne(Stock::class, 'book_id' , 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'book_id', 'id');
    }
}
