<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;

class LandingController extends Controller
{
    public function index() {
        return view("landing");
    }
}
