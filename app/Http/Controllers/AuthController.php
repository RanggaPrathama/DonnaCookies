<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function login_post(Request $request){
       $validated= $request->validate([
            'email' =>'required|email',
            'password' => 'required|min:8',
        ]);


        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            if(auth()->user()->role == 0){
                return redirect()->route('homeUser')->with('success','Login successful');
            }
            if(auth()->user()->role == 1){
                return redirect()->route('berat.index')->with('success','Login successful');
            }


        }
        else{
            return redirect()->route('login')->with('error','Login failed');
        }
    }
    public function register()
    {
        return view('user.register');
    }

    public function register_post(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',

        ]);

        $users = DB::table('users')->get();

        if (count($users) < 1) {
            $role = 1;
        } else {
            $role = 0;
        }
        $user = DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $role,
        ]);

        if ($user) {
            return redirect()->route('login')->with('success', 'Registrasi Berhasil');
        } else {
            return redirect()->route('register')->with('error', 'Registrasi Gagal');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
