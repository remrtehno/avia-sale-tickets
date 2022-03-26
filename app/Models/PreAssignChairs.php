<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreAssignChairs extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'owner_id', 'count_chairs', 'flight_id'];


    //METHODS
    public function getAllPreAssignChairs($flight_id)
    {
        return $this->where([
            'flight_id' => $flight_id
        ])->get();
    }

    //REATIONSHIPS

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
