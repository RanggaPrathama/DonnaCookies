<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Http\Requests\StorepemesananRequest;
use App\Http\Requests\UpdatepemesananRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $pemesanans = DB::table('pemesanans')
                    ->select('pemesanans.total_pesan','cookies.gambar_cookies','detail_pemesanans.jumlah','detail_cookies.harga_cookies','berats.berat_cookies','cookies.nama_cookies')
                    ->where('pemesanans.id_pemesanan','=',$id)
                    ->join('detail_pemesanans','pemesanans.id_pemesanan','=','detail_pemesanans.id_pemesanan')
                    ->join('detail_cookies','detail_cookies.idDetail_cookies','=','detail_pemesanans.idDetail_cookies')
                    ->join("cookies",'cookies.id_cookies','=','detail_cookies.id_cookies')
                    ->join("berats",'berats.id_berat','=','detail_cookies.id_berat')
                    ->get();
        $totalPesan = DB::table('pemesanans')->where('pemesanans.id_pemesanan','=',$id)->get();
        return view('user.pemesanan',['pemesanans' => $pemesanans,'totalPesan' => $totalPesan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        DB::beginTransaction();

        $dataPemesanan = json_decode($request->dataCart);
        $total_pesan = $request->totalPesan;

        $pemesanan = DB::table('pemesanans')->insertGetId([
            'id_user' => auth()->user()->id_user,
            'total_pesan' => $total_pesan,
            'created_at' => now(),
            'status' => 0
        ]);

        foreach ($dataPemesanan as $detail) {
            DB::table('detail_pemesanans')->insert([
                'id_pemesanan' => $pemesanan,
                'idDetail_cookies' => $detail->idDetail_cookies,
                'jumlah' => $detail->quantity,
                'harga_cookies' => $detail->harga_cookies,
                'created_at' => now()
            ]);
        }

        DB::commit();

        return response()->json(['success' => true, 'message' => 'Order berhasil disimpan', 'data' => $pemesanan], 200);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['success' => false, 'message' => 'Gagal menyimpan order: ' . $e->getMessage()], 500);
    }
}



    /**
     * Display the specified resource.
     */
    public function show(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        try{
            DB::beginTransaction();

            $validatedData = $request->validate([
            'no_telp' =>  'required',
            'alamat'=> 'required',
            'catatan'=> 'required',
            ]);

        $pemesanan = DB::table('pemesanans')->where('id_pemesanan','=',$id)->update([
                'status'=>1,
                'updated_at'=>now(),
                'catatan'=> $validatedData['catatan'],
            ]);
        $user = DB::table('users')->where('id_user','=',auth()->user()->id_user)->update([
                'alamat'=>$validatedData['alamat'],
                'no_telp'=>$validatedData['no_telp'],

            ]);

        if($pemesanan){
            DB::commit();
            return redirect()->route('pembayaran.index',$id)->with('success','succesfull');
        }
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false,'message' => 'Gagal menyimpan order: '. $e->getMessage()], 500);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pemesanan $pemesanan)
    {
        //
    }
}
