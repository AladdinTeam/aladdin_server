<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_Info extends Model
{
    protected $guarded = ["id"];

    protected $hidden = ['created_at', 'updated_at', "id", "master_id", ];

    protected $table = 'master_info';

    public function master() {
        return $this->belongsTo(Master::class);
    }
}
