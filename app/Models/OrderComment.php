<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'comment',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
