<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_id',
        'user_id',
        'title',
        'slug',
        'teaser',
        'body',
        'links',
        'avatar',
        'published',
        'language',
    ];

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
