<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  /**
   * Get the user of the activity
   */
  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
