<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder;

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
        'title',
        'slug',
        'subtitle',
        'authors',
        'teaser',
        'body',
        'links',
        'featured',
        'published',
        'language',
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
        return $query->where('published', 1);
    }
}
