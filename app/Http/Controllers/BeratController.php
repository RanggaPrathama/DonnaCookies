<?php

namespace App\Http\Controllers;

use App\Models\Berat;
use App\Http\Requests\StoreBeratRequest;
use App\Http\Requests\UpdateBeratRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berats = DB::table('berats')->get();
        return view('admin.berat.index',['berats' => $berats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valaidatedData = $request->validate([
            'berat_cookies'=>'required'
            ]);

        $tesBerat = DB::table('berats')->insert($valaidatedData);

        if($tesBerat){
            return redirect()->route('berat.index')->with('success','Berat berhasil ditambahkan');
        }else{
            return redirect()->back()->with('error','Berat gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Berat $berat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berats = DB::table('berats')->where('id_berat',$id)->first();
        return view('admin.berat.update',['berats'=>$berats]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $valaidatedData = $request->validate([
            'berat_cookies'=>'required'
            ]);

        $tesBerat = DB::table('berats')->where('id_berat',$id)->update($valaidatedData);

        if($tesBerat){
            return redirect()->route('berat.index')->with('success','Berat berhasil diubah');
        }else{
            return redirect()->back()->with('error','Berat gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tesBerat = DB::table('berats')->where('id_berat',$id)->delete();

        if($tesBerat){
            return redirect()->route('berat.index')->with('success','Berat berhasil dihapus');
        }else{
            return redirect()->back()->with('error','Berat gagal dihapus');
        }
    }
}
