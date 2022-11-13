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
        'order_status_id',
        'order_total',
        'product_count',
        'primary_email',
        'delivery_first_name',
        'delivery_last_name',
        'delivery_phone',
        'delivery_company',
        'delivery_street1',
        'delivery_street2',
        'delivery_city',
        'delivery_postal_code',
        'delivery_country',
        'billing_first_name',
        'billing_last_name',
        'billing_phone',
        'billing_company',
        'billing_street1',
        'billing_street2',
        'billing_city',
        'billing_postal_code',
        'billing_country',
        'payment_method',
        'currency',
        'host'
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
