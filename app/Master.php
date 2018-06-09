<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Master extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $guarded = ["id"];

    protected $hidden = ["id", "password", "remember_token", "token", "token_until", "confirm_code", "email_code", "call_time", "created_at", "updated_at"];

    public function services() {
        return $this->hasMany(Service::class);
    }

    /*public function info_master() {
        return $this->hasOne(Info_Master::class);
    }*/

    public function master_info() {
        return $this->hasOne(Master_Info::class);
    }

    public function subcategories() {
        return $this->belongsToMany(Subcategory::class);
    }

    public function photos() {
        return $this->hasMany(Photo::class);
    }

    public function passportphotos() {
        return $this->hasMany(PassportPhoto::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class)->withPivot('price');
    }

    public function subways() {
        return $this->belongsToMany(Subway::class);
    }
}
