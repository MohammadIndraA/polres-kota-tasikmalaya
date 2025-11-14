<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use RalphJSmit\Laravel\SEO\Support\Schemas\ArticleSchema;

class Post extends Model
{
     use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'category_id',
        'user_id',
        'status',
        'views',
        'image',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Relasi dengan User (Author)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Category (UUID)
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }

    public function scopeByCategoryAndSearch($query, $slug = null, $search = null)
    {
        return $query->with('category')
            ->when($slug, function ($q) use ($slug) {
                $q->whereHas('category', function ($sub) use ($slug) {
                    $sub->where('slug', $slug);
                });
            })
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('title', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%');
                });
            });
    }

    // Metode wajib untuk Laravel SEO
    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            description: \Illuminate\Support\Str::limit(
                strip_tags($this->excerpt ?? $this->content ?? ''),
                155,
                '...'
            ),
            image: $this->image ? asset('storage/' . $this->image) : null,
            schema: ArticleSchema::make()
                ->title($this->title)
                ->description($this->excerpt ?? '')
                ->author('Polres Tasikmalaya Kota')
                ->datePublished($this->created_at)
                ->dateModified($this->updated_at)
        );
    }

}
