<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_sk',
        'name_en',
        'body_sk',
        'body_en',
    ];

    public function resourceType(): Attribute
    {
        return Attribute::make(
            get: fn() => 'page',
        );
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
