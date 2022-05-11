<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\MetaInfo
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $meta_name
 * @property string $meta_content
 * @method static \Database\Factories\MetaInfoFactory factory(...$parameters)
 * @method static Builder|MetaInfo newModelQuery()
 * @method static Builder|MetaInfo newQuery()
 * @method static Builder|MetaInfo query()
 * @method static Builder|MetaInfo whereCreatedAt($value)
 * @method static Builder|MetaInfo whereId($value)
 * @method static Builder|MetaInfo whereMetaContent($value)
 * @method static Builder|MetaInfo whereMetaName($value)
 * @method static Builder|MetaInfo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MetaInfo extends Model
{
    use HasFactory;

    protected $fillable = ['meta_name', 'meta_content'];
}
