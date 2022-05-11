<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booking
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $user_id
 * @property string $uuid
 * @property string|null $status
 * @property string|null $order_id
 * @property string|null $flights_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chairs[] $chairs
 * @property-read int|null $chairs_count
 * @property-read \App\Models\Flights|null $flight
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $order
 * @property-read int|null $order_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereFlightsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUuid($value)
 * @mixin \Eloquent
 */
class Booking extends Model
{
    use HasFactory;

    public const BOOKED = 'booked';
    public const PAID = 'paid';
    public const AVAILABLE = 'available';

    protected $fillable = ['uuid', 'flights_id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function isOrderPaid()
    {
        return $this->order->first()->isPaid();
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function chairs()
    {
        return $this->hasMany('App\Models\Chairs');
    }
    public function flight()
    {
        return $this->belongsTo('App\Models\Flights', 'flights_id');
    }
}
