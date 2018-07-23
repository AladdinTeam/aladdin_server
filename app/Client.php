<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ["id"];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function reports() {
        return $this->hasMany(Report::class);
    }

    public function channels() {
        return $this->hasMany(Channel::class);
    }
}
