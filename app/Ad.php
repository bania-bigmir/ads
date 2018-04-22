<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    /**
     * Get the user that owns the ad.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
