<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'blog_type_id',
        'user_id',
        'feature_img',
        'title',
        'slug',
        'subtitle',
        'authors',
        'authors_cite',
        'teaser',
        'body',
        'links',
        'featured',
        'home_page',
        'published',
        'language',
        'publish_at',
    ];

    public function blog_type()
    {
        return $this->belongsTo(Navigation::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class);
    }

    public function downloads()
    {
        return $this->belongsToMany(Download::class);
    }

    public function scopePublished($query)
    {
        return $query->where([
            ['published', 1],
            ['publish_at', '<', now()]
        ]);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    public function scopeLanguage($query, $lang)
    {
        return $query->where('language', $lang);
    }

    public function resourceType(): Attribute
    {
        return Attribute::make(
            get: fn() => 'blog',
        );
    }
}
