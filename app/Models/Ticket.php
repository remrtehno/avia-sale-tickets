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
    public const RETURNED = 'RFND';

    public const ADULTS = 'ADT';
    public const CHILDREN = 'CHD';
    public const INFANTS = 'INF';

    protected $fillable = [
        'user_id',
        'uuid',
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

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getGender($gender = false)
    {
        if ($gender) {
            return $this->genderMap[$gender];
        }
        return $this->genderMap[$this->gender];
    }

    //RELATIONSHIPS
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
