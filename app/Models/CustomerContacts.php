<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CustomerContacts
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $surname2
 * @property string|null $email
 * @property string|null $birthday
 * @property string|null $gender
 * @property string|null $passport_date
 * @property string|null $passport_number
 * @property string|null $citizenship
 * @property string|null $tel
 * @property string|null $visa
 * @property string|null $address
 * @property string|null $price
 * @property string|null $type
 * @property string|null $user_id
 * @method static \Database\Factories\CustomerContactsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereCitizenship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts wherePassportDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts wherePassportNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereSurname2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerContacts whereVisa($value)
 * @mixin \Eloquent
 */
class CustomerContacts extends Model
{
    use HasFactory;

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
        'user_id',
        'type',
        'bag'
    ];

    protected $dates = ['birthday'];
}
