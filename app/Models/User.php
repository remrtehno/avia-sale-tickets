<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    public const ORG = 'org';
    public const IND = 'ind';
    public const ADMIN = 'admin';
    public const FILE_ATTRIBUTES = [
        'dir_passport_file',
        'inn_file',
        'license_file',
        'agreement_contract_file',
        'cadastre_file',
        'passport_file'
    ];
    public const SEPARATOR = ',';

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

    public function storeFiles($clean = false)
    {
        foreach (User::FILE_ATTRIBUTES as $fileName) {
            if (request()->file($fileName)) {

                $nameCollection =  $this->getPathImages($fileName);

                if ($clean) {
                    $this->clearMedia($nameCollection);
                }

                foreach (request()->file($fileName) as $uploadedFile) {
                    $this->addMedia($uploadedFile)
                        ->toMediaCollection(
                            $nameCollection
                        );
                }
            }
        }
    }

    public function clearMedia($collectionName)
    {
        return $this->clearMediaCollection($collectionName);
    }


    public function getPathImages($fileName)
    {
        return $this->email . '-'  . $fileName;
    }


    public function getImages($fieldName)
    {
        return $this->getMedia($this->getPathImages($fieldName));
    }


    //RELATIONSHIPS
    public function flights()
    {
        return $this->hasMany(Flights::class);
    }

    public function chairs()
    {
        return $this->hasMany('App\Models\Chairs');
    }
    public function Tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
