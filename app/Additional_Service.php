<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additional_Service extends Model
{
    protected $guarded = ['id'];
    public function order() {
        return $this->belongsTo(Order::class);
    }
}
