<?php

namespace App\Http\Controllers;

use App\Models\payment;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = DB::table('payments')->get();
        return view('admin.payment.index',['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("admin.payment.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                'no_rekening' => 'required',
                'atas_nama' => 'required',
                'nama_bank' => 'required',
                'gambar_payment' => 'required',
                'created_at'=> now()
            ]);

            if($request->hasFile('gambar_payment')){
                $gambar = $request->file('gambar_payment')->getClientOriginalName();
                $namaFile = time().'_'.$gambar;
                $request->file('gambar_payment')->move(public_path('payments'),$namaFile);
                $validatedData['gambar_payment'] = $namaFile;
            }

            $dataPaymant = DB::table('payments')->insert($validatedData);

            if($dataPaymant){
                return redirect()->route('payment.index')->with('success','Data Berhasil Disimpan');
            }else{
                return redirect()->back()->with('error','Data Gagal Disimpan');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payments = DB::table('payments')->where('id_payment', '=', $id)->first();
        return view('admin.payment.update',['payments' => $payments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'no_rekening' => 'required',
                'atas_nama' => 'required',
                'nama_bank' => 'required',
                'gambar_payment' => 'required',
                'updated_at'=> now()
            ]
        );


        if($request->hasFile('gambar_payment')){
            $payment = DB::table('payments')->where('id_payment',$id)->first();
            if($payment->gambar_payment!= null){
                File::delete(public_path('payments').'/'.$payment->gambar_payment);
            }
            $gambar = $request->file('gambar_payment')->getClientOriginalName();
            $namaFile = time().'_'.$gambar;
            $request->file('gambar_payment')->move(public_path('payments'),$namaFile);
            $validatedData['gambar_payment'] = $namaFile;
        }

        $dataPayment = DB::table('payments')->where('id_payment',$id)->update($validatedData);

        if($dataPayment){
            return redirect()->route('payment.index')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect()->back()->with('error','Data Gagal Disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $payment = DB::table('payments')->where('id_payment',$id)->first();
        if($payment->gambar_payment!= null){
            File::delete(public_path('payments').'/'.$payment->gambar_payment);
        }

        $dataPayment = DB::table('payments')->where('id_payment',$id)->delete();

        if($dataPayment){
            return redirect()->route('payment.index')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect()->back()->with('error','Data Gagal Dihapus');
        }

    }
}
