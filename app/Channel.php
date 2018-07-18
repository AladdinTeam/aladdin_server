<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $guarded = ['id'];

    public function master() {
        return $this->belongsTo(Master::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
