<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'subtitle',
        'authors',
        'editors',
        'translation',
        'cover',
        'teaser',
        'body',
        'links',
        'is_product',
        'common_price',
        'aspekt_price',
        'pages',
        'isbn',
        'featured',
        'published',
        'language',
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function files(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(File::class);
    }

    public function downloads(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Download::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
