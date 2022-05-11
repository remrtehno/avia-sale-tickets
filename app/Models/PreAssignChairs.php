<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\PreAssignChairs
 *
 * @property int $id
 * @property int $user_id
 * @property int $owner_id
 * @property int $flight_id
 * @property int $count_chairs
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $OwnerUser
 * @property-read \App\Models\Flights $flight
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssignChairs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssignChairs newQuery()
 * @method static \Illuminate\Database\Query\Builder|PreAssignChairs onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssignChairs query()
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssignChairs whereCountChairs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssignChairs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssignChairs whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssignChairs whereFlightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssignChairs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssignChairs whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssignChairs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreAssignChairs whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|PreAssignChairs withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PreAssignChairs withoutTrashed()
 * @mixin \Eloquent
 */
class PreAssignChairs extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'owner_id', 'count_chairs', 'flight_id'];


    //METHODS
    public function getAllPreAssignChairs($flight_id)
    {
        return $this->where([
            'flight_id' => $flight_id
        ])->get();
    }

    //REATIONSHIPS

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function OwnerUser()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    public function flight()
    {
        return $this->belongsTo(Flights::class);
    }
}
