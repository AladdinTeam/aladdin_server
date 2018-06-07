<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id', 'master_id'];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function masters() {
        return $this->belongsToMany(Master::class);
    }

    public function subway() {
        return $this->belongsTo(Subway::class);
    }

//    public function subways() {
//        return $this->belongsToMany(Subway::class);
//    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function subcategories() {
        return $this->belongsToMany(Subcategory::class);
    }

    public function additional_service(){
        return $this->hasMany(Additional_Service::class);
    }
}
