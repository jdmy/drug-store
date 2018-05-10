<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('\App\Category', 'cid', 'id');
    }

    public function product_images()
    {
        return $this->hasMany('\App\ProductImage', 'pid', 'id');
    }
}
