<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public function masters() {
        return $this->belongsToMany(Master::class);
    }
}
