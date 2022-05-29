<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
