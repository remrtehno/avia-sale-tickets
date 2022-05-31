<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TopPayments
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $date
 * @property string $sum
 * @property int $flight_id
 * @property int $seller_id
 * @property int $customer_id
 * @property string $tariff
 * @property-read \App\Models\User|null $customer
 * @property-read \App\Models\Flights $flight
 * @property-read \App\Models\User|null $seller
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments query()
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments whereFlightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments whereTariff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopPayments whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TopPayments extends Model
{
    use HasFactory;


    public function getDate()
    {
        return (new Carbon($this->date))->format('Y-m-d\TH:i');
    }

    public function getSum()
    {
        return number_format($this->sum, 2, '.', ' ');
    }

    public function flight()
    {
        return $this->belongsTo(Flights::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
