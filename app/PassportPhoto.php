<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassportPhoto extends Model
{
    protected $guarded = ['id'];

    protected $hidden = ['id'];

    protected $table = 'passport_photos';

    public function master() {
        return $this->belongsTo(Master::class);
    }
}
