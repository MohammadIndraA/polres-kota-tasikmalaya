<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
     use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'settings';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'postal_code',
        'city',
        'province',
        'image',
        'instagram_link',
        'facebook_link',
        'twitter_link',
        'youtube_link',
        'googleplus_link',
        'tiktok_link',
        'linkedin_link',
    ];
    
}
