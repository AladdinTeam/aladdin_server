<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ["id"];

    public function info_client() {
        return $this->hasOne(Info_Client::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function clients(){
        return $this->hasMany(Report::class);
    }
}
