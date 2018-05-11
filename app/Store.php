<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('\App\City', 'cityid', 'cityid');
    }
}
