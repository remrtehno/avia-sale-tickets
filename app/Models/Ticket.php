<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public const BOOKED = 'booked';
    public const PAID = 'paid';
    public const AVAILABLE = 'available';

    public const ADULTS = 'adults';
    public const CHILDREN = 'children';
    public const INFANTS = 'infants';

    protected $fillable = [
        'name',
        'surname',
        'surname2',
        'email',
        'birthday',
        'gender',
        'passport_date',
        'passport_number',
        'citizenship',
        'tel',
        'visa',
        'address',
        'type'
    ];


    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
