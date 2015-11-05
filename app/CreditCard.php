<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    /**
     * Get the owner of the credit card
     */
    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }
}
