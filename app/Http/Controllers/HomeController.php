<?php
/**
 * Created by PhpStorm.
 * User: Valentin
 * Date: 09.02.2018
 * Time: 16:53
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
}