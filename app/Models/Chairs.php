<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chairs extends Model
{
    use HasFactory;

    public const FIELDS = [
        'flight_id' => 'string',
        'order_id' => 'integer',
        'booking_id' => 'integer',
        'price' => 'string',
        'uuid' => 'string',
    ];
}
