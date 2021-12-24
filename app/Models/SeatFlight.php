<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatFlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'title',
        'intro_title',
        'intro',
        'description',
        'content',
        'price',
        'flight_id',
        'rating',
        'from',
        'to',
        'date',
        'dateArrival',
        'timeArrival',
    ];

    public function image()
    {
        return $this->hasOne('App\Image');
    }
}
