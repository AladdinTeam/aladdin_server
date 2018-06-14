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

    /*
     * Функция. которая возвращает заказы, с которыми он работает
     */

    public function orders() {
        return $this->belongsToMany(Order::class)->withPivot('commentary', 'price', 'date');
    }

    /*
     * Функция, которая возвращает заказы, которые были адресованы напрямую
     * */

    public function choose_orders() {
        return $this->hasMany(Order::class);
    }

    /*
     * Функция, которая возвращает заказы, с которыми он работал (история)
     * */
    public function work_orders(){
        return $this->hasMany(Order::class, 'work_master_id', 'id');
    }

    public function subways() {
        return $this->belongsToMany(Subway::class);
    }
}
