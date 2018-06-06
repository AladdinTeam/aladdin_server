<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additional_Service extends Model
{
    public function order() {
        return $this->belongsTo(Order::class);
    }
}
