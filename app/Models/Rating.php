<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rating
 *
 * @property int $id
 * @property int $user_id
 * @property int $rating
 * @property string $comment
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUserId($value)
 * @mixin \Eloquent
 * @property int $author_id
 * @property-read \App\Models\User|null $author
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereAuthorId($value)
 */
class Rating extends Model
{
    use HasFactory;

    /**
     * Attributes to guard against mass-assignment.
     *
     * @var array
     */
    protected $guarded = [];

    protected $fillable = [
        'comment'
    ];


    public static function ratingByUser($id)
    {
        return self::where('user_id', $id)->where('status', 1)->avg('rating') ?: 0;
    }

    //relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }
}
