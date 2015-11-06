<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Get the user who made the order
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the status of the order
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    /**
     * The products of the orders
     */
    public function product()
    {
        return $this->belongsToMany('App\Product', 'order_products')->withPivot('id', 'quantity');
    }
}
