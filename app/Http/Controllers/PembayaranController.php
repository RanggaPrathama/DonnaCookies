<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use App\Http\Requests\StorepembayaranRequest;
use App\Http\Requests\UpdatepembayaranRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $pemesanans = DB::table('pemesanans')->where('pemesanans.id_pemesanan','=',$id)->first();
        $payments = DB::table('payments')->get();
        return view('user.pembayaran',['pemesanans' => $pemesanans,'payments'=>$payments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function konfirmasi(){
        return view('user.konfirmasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                'id_pemesanan'=> 'required',
                'buktiBayar'=> 'required',
                'id_payment'=> 'required',
            ]);

        if($request->hasFile('buktiBayar')){
            $file = $request->file('buktiBayar');
            $nama_file = time()."_".$file->getClientOriginalName();
           $file->move(public_path('buktiBayar',$nama_file));
           $validatedData['buktiBayar'] = $nama_file;
        }

        $pembayarans = DB::table('pembayarans')->insert([
                'id_pemesanan' => $validatedData['id_pemesanan'],
                'id_payment' => $validatedData['id_payment'],
                'buktiBayar' => $validatedData['buktiBayar'],
                'created_at'=> now(),
                'status' => 1
                ]);

        if($pembayarans){
            return redirect()->route('pembayaran.konfirmasi')->with('success','Pembayaran Berhasil');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepembayaranRequest $request, pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembayaran $pembayaran)
    {
        //
    }
}
