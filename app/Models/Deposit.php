<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Deposit
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $date
 * @property string $sum
 * @property int $customer_id
 * @property string $comment
 * @property int $seller_id
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Deposit extends Model
{
    use HasFactory;

    public function getDate()
    {
        return (new Carbon($this->date))->format('Y-m-d\TH:i');
    }

    public function getSum($sum = null)
    {
        return number_format($sum ?: $this->sum, 2, '.', ' ');
    }


    //relationships
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
