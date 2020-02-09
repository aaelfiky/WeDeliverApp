<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class OrderItem extends Model
{
    //
    protected $fillable = ['name', 'order_id', 'price'];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
