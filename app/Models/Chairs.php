<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chairs extends Model
{
    use HasFactory;

    public const ADULT = 'adult';
    public const CHILD = 'child';
    public const INFANT = 'infant';

    public const FIELDS = [
        'flight_id' => 'string',
        'order_id' => 'integer',
        'booking_id' => 'integer',
        'type' => 'string',
        'price' => 'string',
        'uuid' => 'string',
    ];

    protected $fillable = ['flight_id', 'price', 'type', 'uuid'];


    /**
     * Get the parent commentable model (post or video).
     */
    public function chairsable()
    {
        return $this->morphTo();
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
