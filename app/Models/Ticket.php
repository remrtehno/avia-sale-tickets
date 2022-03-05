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
    public const RETURNED = 'returned';

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
        'type',
        'price',
        'status'
    ];

    public $genderMap = [
        'f' => 'Жен.',
        'm' => 'Муж.'
    ];

    public function getGender($gender = false)
    {
        if ($gender) {
            return $this->genderMap[$gender];
        }
        return $this->genderMap[$this->gender];
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
