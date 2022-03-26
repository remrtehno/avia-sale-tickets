<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MetaInfo extends Model
{
    use HasFactory;

    protected $fillable = ['meta_name', 'meta_content'];
}
