<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info_Order extends Model
{
    protected $table = "info_orders";

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
