<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = ["id"];

    protected $hidden = ['id'];

    public function master() {
        return $this->belongsTo(Master::class);
    }
}
