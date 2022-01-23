<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ORG = 'org';
    public const IND = 'ind';
    public const ADMIN = 'admin';
    public const FILES_ATTRIBUTES = [
        'dir_passport_file',
        'inn_file',
        'license_file',
        'agreement_contract_file',
        'cadastre_file',
        'passport_file'
    ];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['is_admin'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "role",
        "address",
        "tel",

        //org
        'dir_surname',
        'dir_name',
        'dir_surname2',
        'tel_director',
        // 'dir_passport_file',
        'inn',
        // 'inn_file',
        'license',
        // 'license_file',
        'agreement_contract',
        // 'agreement_contract_file',
        'cadastre',
        // 'cadastre_file',

        //ind
        'birthday',
        'surname',
        'surname2',
        // 'passport_file',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Returns true or false if user is Organizator.
     *
     * @returns Boolean
     */
    public function isOrg()
    {
        return $this->role == $this::ORG;
    }

    /**
     * Returns true or false if user is Individual.
     *
     * @returns Boolean
     */
    public function isInd()
    {
        return $this->role == $this::IND;
    }

    /**
     * Returns true or false if user is Individual.
     *
     * @returns Boolean
     */
    public function isAdmin()
    {
        return $this->is_admin === 1;
    }
}
