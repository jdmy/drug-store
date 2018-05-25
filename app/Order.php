<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $fillable = [
        'status',
    ];

    public function order_items()
    {
    	return $this->hasMany('\App\OrderItem', 'oid', 'id');
    }
}
