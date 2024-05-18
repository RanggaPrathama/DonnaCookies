<?php

namespace App\Http\Controllers;

use App\Models\detail_cookies;
use App\Http\Requests\Storedetail_cookiesRequest;
use App\Http\Requests\Updatedetail_cookiesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailCookiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
                'id_cookies'=>'required',
                'id_berat'=>'required',
                'harga_cookies'=>'required',
                'created_at'=> now(),
            ]);

        $DataDetail = DB::table('detail_cookies')->insert($validatedData);

        if($DataDetail){
            return redirect()->route('cookies.create')->with('success','Detail Created');
        }
        else{
            return redirect()->back()->with('error','ERROR: Unable to create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(detail_cookies $detail_cookies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detail_cookies $detail_cookies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatedetail_cookiesRequest $request, detail_cookies $detail_cookies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detail_cookies $detail_cookies)
    {
        //
    }
}
