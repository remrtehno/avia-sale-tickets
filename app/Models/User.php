<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $tel
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $role ind=Individual, org=Organization
 * @property int $is_admin
 * @property int $is_approved
 * @property string|null $birthday
 * @property string|null $surname
 * @property string|null $surname2
 * @property string|null $passport_file
 * @property string|null $dir_surname
 * @property string|null $dir_name
 * @property string|null $dir_surname2
 * @property string|null $tel_director
 * @property string|null $dir_passport_file
 * @property string|null $inn
 * @property string|null $inn_file
 * @property string|null $license
 * @property string|null $license_file
 * @property string|null $agreement_contract
 * @property string|null $agreement_contract_file
 * @property string|null $cadastre
 * @property string|null $cadastre_file
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $Tickets
 * @property-read int|null $tickets_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chairs[] $chairs
 * @property-read int|null $chairs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Flights[] $flights
 * @property-read int|null $flights_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAgreementContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAgreementContractFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCadastre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCadastreFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDirName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDirPassportFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDirSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDirSurname2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInnFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLicenseFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassportFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelDirector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $ratings
 * @property-read int|null $ratings_count
 */
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

    public const APPROVED_TEXT = [
        0 => 'На модерации',
        1 => "Подтвержден"
    ];

    public const ROLES = [
        self::ORG => 'Юридическое лицо',
        self::IND => "Физическое лицо"
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
        "not_hashed_password",

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

    public function canBeDeleted()
    {
        return !$this->flights?->count();
    }

    /**
     * Returns info text depends by Approved.
     *
     * @returns Boolean
     */
    public function isApprovedText()
    {
        return self::APPROVED_TEXT[$this->isApproved()];
    }


    /**
     * Returns true or false if user is Approved.
     *
     * @returns Boolean
     */
    public function isApproved()
    {
        return $this->is_approved;
    }

    /**
     * Returns text roles.
     *
     * @returns Boolean
     */
    public function roleText()
    {
        return self::ROLES[$this->role];
    }

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
    public function ratings()
    {
        return $this->hasMany('App\Models\User');
    }
}
