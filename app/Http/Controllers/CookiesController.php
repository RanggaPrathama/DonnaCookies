<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CookiesController extends Controller
{
    public function index()
    {
        $cookies = DB::table('cookies')->get();
        $detail_cookies = DB::table('detail_cookies as dc')
                        ->select('dc.idDetail_cookies','c.nama_cookies','b.berat_cookies', 'c.nama_cookies','c.gambar_cookies','c.stock','dc.harga_cookies')
                        ->join('berats as b','b.id_berat','=','dc.id_berat')
                        ->join('cookies as c','c.id_cookies','=','dc.id_cookies')
                        ->get();
        return view('admin.cookies.index',['cookies' => $cookies, 'detail_cookies' => $detail_cookies]);
    }

    public function create()
    {
        $cookies = DB::table('cookies')->get();
        $berats = DB::table('berats')->get();
        return view('admin.cookies.create',['cookies'=> $cookies, 'berats' => $berats]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_cookies' => 'required',
            'gambar_cookies' => 'required',
            'stock' => 'required',
        ]);

        if ($request->hasFile('gambar_cookies')) {
            $gambar = $request->file('gambar_cookies')->getClientOriginalName();
            $request->file('gambar_cookies')->move(public_path('cookies'), $gambar);
            $validatedData['gambar_cookies'] = $gambar;
        }

        // Menggunakan insertGetId() untuk mendapatkan ID yang baru saja dibuat
        $idCookies = DB::table('cookies')->insertGetId([
            'nama_cookies' => $validatedData['nama_cookies'],
            'gambar_cookies' => $validatedData['gambar_cookies'],
            'stock' => $validatedData['stock'],
        ]);

        if ($idCookies) {
            return redirect()->route('cookies.create')->with('success','succefully created')->with('idCookies', $idCookies);
        }
    }

    public function edit($id)
    {
        $cookies = DB::table('cookies')->where('id_cookies','=',$id)->first();
        return view('admin.cookies.update',['cookies'=>$cookies]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_cookies' => 'required',
            'gambar_cookies' => 'required',
            'stock' => 'required',
        ]);

        if($request->hasFile('gambar_cookies')){
            $cekGambar = DB::table('cookies')->where('id_cookies','=',$id)->first();
            if($cekGambar->gambar_cookies != null){
                File::delete(public_path('cookies/'.$cekGambar->gambar_cookies));
            }
            $gambar = $request->file('gambar_cookies')->getClientOriginalName();
            $request->file('gambar_cookies')->move(public_path('cookies'),$gambar);
            $validatedData['gambar_cookies']=$gambar;
        }

        $cookies = DB::table('cookies')->where('id_cookies','=',$id)->update([
            'nama_cookies' => $validatedData['nama_cookies'],
            'gambar_cookies' => $validatedData['gambar_cookies'],
           'stock' => $validatedData['stock'],
        ]);

        if($cookies){
            return redirect()->route('cookies.index')->with('success','succefully updated');
        }else{
            return redirect()->back()->with('error','error');
        }
    }

    public function delete($id)
    {
        $cookies = DB::table('cookies')->where('id_cookies','=',$id)->delete();
        if($cookies){
            return redirect()->route('cookies.index')->with('success','succefully deleted');
        }else{
            return redirect()->back()->with('error','error');
        }
    }

    public function productCookies($id){
        $cookies = DB::table('cookies')->where('id_cookies','=',$id)->first();
        $detailCookies = DB::table('detail_cookies')->join('berats','berats.id_berat','=','detail_cookies.id_berat')->where('id_cookies','=',$id)->get();
        return view('user.cookies',['cookies'=>$cookies, 'detail_cookies' => $detailCookies]);
    }
}
