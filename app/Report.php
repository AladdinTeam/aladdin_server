<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function master(){
        return $this->belongsTo(Master::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }
}
