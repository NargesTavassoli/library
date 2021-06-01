<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = [
        'user_id',
        'title',
        'author',
        'publisher',
        'year',
        'price',
        'validation',
    ];

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
    

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
//            ->logOnly([ 'title', 'author', 'publisher', 'year', 'price']);
    }
}
