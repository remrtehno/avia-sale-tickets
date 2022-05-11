<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ReturnAssignedChairs
 *
 * @property int $id
 * @property int $user_id
 * @property int $owner_id
 * @property int $flight_id
 * @property int $count_chairs
 * @property int $order_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $OwnerUser
 * @property-read \App\Models\Flights $flight
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs newQuery()
 * @method static \Illuminate\Database\Query\Builder|ReturnAssignedChairs onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs whereCountChairs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs whereFlightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnAssignedChairs whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|ReturnAssignedChairs withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ReturnAssignedChairs withoutTrashed()
 * @mixin \Eloquent
 */
class ReturnAssignedChairs extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'owner_id', 'count_chairs', 'flight_id', 'order_id'];

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
