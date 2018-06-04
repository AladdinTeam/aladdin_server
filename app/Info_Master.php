<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info_Master extends Model
{
    protected $table = "info_masters";

    public function master() {
        return $this->belongsTo(Master::class);
    }
}
