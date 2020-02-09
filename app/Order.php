<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;

class Order extends Model
{
    //
    protected $fillable = ['restaurant_id', 'total_price','user_id'];
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

