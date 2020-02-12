<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    
    protected $fillable = ['name', 'restaurant_id', 'price','description', 'category'];
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
