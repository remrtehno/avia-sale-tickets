<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnAssignedChairs extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'owner_id', 'count_chairs', 'flight_id', 'order_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function OwnerUser()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    public function flight()
    {
        return $this->belongsTo(Flights::class);
    }
}
