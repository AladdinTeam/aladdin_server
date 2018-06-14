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
        return $this->belongsToMany(Master::class)->withPivot('commentary', 'price', 'date');
    }

    public function master() {
        return $this->belongsTo(Master::class);
    }

    public function choosen_master(){
        return $this->belongsTo(Master::class, 'work_master_id', 'id');
    }

    public function subway() {
        return $this->belongsTo(Subway::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function subcategories() {
        return $this->belongsToMany(Subcategory::class);
    }

    public function additional_services(){
        return $this->hasMany(Additional_Service::class);
    }
}
