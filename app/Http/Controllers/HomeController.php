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
        $reviews = DB::table('users')->where('role','=','0')->where('review','!=',null)->get();
        return view('user.home',['reviews'=>$reviews]);
    }

    public function katalog(){
        $cookies = DB::table('cookies')->get();
        return view('user.katalog',['cookies' => $cookies]);
    }

    public function review(Request $request , $id){
        $user = DB::table('users')->where('id_user','=',$id)->update([
            'review' => $request->review
        ]);
        if($user){
            return redirect()->route('homeUser')->with('success','Success Review Added');
        }

    }
}

