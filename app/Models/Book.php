<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'is_ebook',
        'eshop_links',
        'common_price',
        'aspekt_price',
        'pages',
        'isbn',
        'featured',
        'published',
        'language',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'eshop_links' => 'array',
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

    public function scopeLanguage($query, $lang)
    {
        return $query->where('language', $lang);
    }

    public function resourceType(): Attribute
    {
        return Attribute::make(
            get: fn() => 'book',
        );
    }
}
