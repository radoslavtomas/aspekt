<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'page_id',
        'navigation_id',
        'is_dynamic',
        'name_sk',
        'name_en',
        'url',
        'position',
    ];

    public function navigation()
    {
        return $this->belongsTo(Navigation::class, 'navigation_id', 'id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class)
            ->where('published', 1)
            ->orderBy('created_at', 'desc');
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class)
            ->where('published', 1)
            ->orderBy('created_at', 'desc');
    }

    public function isDynamic()
    {
        return $this->getAttribute('is_dynamic');
    }

    public function isStatic()
    {
        return !$this->getAttribute('is_dynamic');
    }
}
