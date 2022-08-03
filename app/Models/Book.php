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
}
