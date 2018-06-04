<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index() {
        return view("profile");
    }

    public function orders(){
        return view("soon");
    }
}
