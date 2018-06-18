<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subway extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    public function masters() {
        return $this->belongsToMany(Master::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
