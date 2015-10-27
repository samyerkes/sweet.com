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
}
