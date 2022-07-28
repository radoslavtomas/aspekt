<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'filename',
        'filepath',
        'filemime',
        'filesize',
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
