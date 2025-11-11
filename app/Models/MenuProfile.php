<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class MenuProfile extends Model
{
       use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'menu_profiles';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'content',
        'image',
    ];

}
