<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'descripton',
    ];

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'status');
    }

    public function country()
    {
        return $this->belongsTo(OrderCountry::class);
    }

    public function items()
    {
        return $this->belongsTo(OrderItem::class, 'id', 'order_id');
    }
}
