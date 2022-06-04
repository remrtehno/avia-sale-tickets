<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $type
 * @property int $user_id
 * @property string $uuid
 * @property string $name
 * @property string $surname
 * @property string|null $surname2
 * @property string $email
 * @property string $birthday
 * @property string $gender
 * @property string $passport_date
 * @property string $passport_number
 * @property string $citizenship
 * @property string $tel
 * @property string|null $visa
 * @property string|null $address
 * @property string|null $price
 * @property string|null $status
 * @property int $booking_id
 * @property-read \App\Models\Booking $booking
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TicketFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCitizenship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket wherePassportDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket wherePassportNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereSurname2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereVisa($value)
 * @mixin \Eloquent
 */
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
    public const TYPES_PASSENGERS = [self::ADULTS, self::CHILDREN, self::INFANTS];

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

    public function getPrice()
    {
        return $this->price;
    }

    public function getPriceFormatted()
    {
        return number_format($this->getPrice(), 2, '.', ' ');
    }

    public function getGender($gender = false)
    {
        if ($gender) {
            return $this->genderMap[$gender];
        }
        return $this->genderMap[$this->gender];
    }

    public function getDataCopy()
    {
        return "{$this->passport_number}/{$this->citizenship}/{$this->birthday}/{$this->gender}/{$this->passport_date}/{$this->surname}/{$this->name}";
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
