<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * Get the orders with this status
     */
    public function order()
    {
        return $this->hasMany('App\Order');
    }

    /**
     * Get the orders with this status
     */
    public function supplyorder()
    {
        return $this->hasMany('App\Supplyorder');
    }
}
