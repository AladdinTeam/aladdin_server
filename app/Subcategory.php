<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $hidden = ['category_id', 'created_at', 'updated_at', 'pivot', 'master_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function masters() {
        return $this->belongsToMany(Master::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }
}
