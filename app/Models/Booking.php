<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['uuid'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
