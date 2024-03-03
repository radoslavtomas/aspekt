<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'feature_img',
        'title',
        'slug',
        'subtitle',
        'date',
        'place',
        'teaser',
        'body',
        'links',
        'featured',
        'published',
        'language',
    ];

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    public function scopeLanguage($query, $lang)
    {
        return $query->where('language', $lang);
    }
}
