<?php
/**
 * Created by PhpStorm.
 * User: Valentin
 * Date: 14.02.2018
 * Time: 12:03
 */

namespace App\Http\Controllers\Master;


use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        //TODO: Вернуть на место проверку регистрации
        //$this->middleware('master_auth');
    }

    public function index(){
        return view('profile');
    }
}