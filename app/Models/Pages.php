<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pages
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PagesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pages query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pages extends Model
{
    use HasFactory;

    protected $fillable = ['content'];
}
