<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class SubPelayananPublik extends Model
{
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'sub_pelayanan_publiks';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'content',
        'image',
        'urutan',
        'pelayanan_publik_id',
        'dokumen'
    ];

     protected $casts = [
    'dokumen' => 'array',
];

    protected $with = ['pelayanan_publik'];

     public function pelayanan_publik()
    {
        return $this->belongsTo(Categories::class);
    }
}
