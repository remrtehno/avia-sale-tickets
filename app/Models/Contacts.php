<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contacts
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $facebook
 * @property string $twitter
 * @property string $google_plus
 * @property string $instagram
 * @property string $email_header
 * @property string $phone_header
 * @property string $phone_footer
 * @property string $email_footer
 * @method static \Database\Factories\ContactsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereEmailFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereEmailHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereGooglePlus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts wherePhoneFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts wherePhoneHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $address
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereAddress($value)
 */
class Contacts extends Model
{
    use HasFactory;


    protected $fillable = [
        'email_header',
        'email_footer',
        'phone_header',
        'phone_footer',
        'address'
    ];
}
