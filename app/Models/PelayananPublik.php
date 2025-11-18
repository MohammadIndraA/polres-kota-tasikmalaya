<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PelayananPublik extends Model
{
     use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'pelayanan_publiks';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'content',
        'image',
        'urutan',
    ];

    public function sub_pelayanan_publiks()
    {
        return $this->hasMany(SubPelayananPublik::class);
    }
}
