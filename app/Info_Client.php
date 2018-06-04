<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info_Client extends Model
{
    protected $table = "info_clients";

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
