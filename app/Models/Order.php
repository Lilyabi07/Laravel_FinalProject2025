<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
    'customer_email',
    'customer_address',
    'payment_type',
    'total_amount',
    'user_id',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}