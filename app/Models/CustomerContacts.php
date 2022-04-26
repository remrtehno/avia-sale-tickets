<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'user_id'
    ];
}
