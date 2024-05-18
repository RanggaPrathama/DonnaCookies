<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homeAdmin(){
        return view('admin.homeAdmin');
    }

    public function homeUser(){
        return view('user.home');
    }

    public function katalog(){
        $cookies = DB::table('cookies')->get();
        return view('user.katalog',['cookies' => $cookies]);
    }
}

