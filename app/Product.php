<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    /**
     * The product is a part of many orders
     */
    public function order()
    {
        return $this->belongsToMany('App\Order', 'order_products')->withPivot('quantity');
    }
}
