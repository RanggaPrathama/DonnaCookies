<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Http\Requests\StorecartRequest;
use App\Http\Requests\UpdatecartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = DB::table('carts as cart')
            ->select('cart.id_cart', 'dc.idDetail_cookies', 'dc.harga_cookies', 'cart.quantity', 'cookie.nama_cookies', 'cookie.gambar_cookies', 'cookie.stock', 'berat.berat_cookies', DB::raw('SUM(cart.quantity) as total_quantity'))
            ->join('detail_cookies as dc', function ($join) {
                $join->on('dc.idDEtail_cookies', '=', 'cart.idDEtail_cookies');
            })
            ->join('berats as berat', function ($join) {
                $join->on('berat.id_berat', '=', 'dc.id_berat');
            })
            ->join('cookies as cookie', function ($join) {
                $join->on('cookie.id_cookies', '=', 'dc.id_cookies');
            })
            ->where('cart.id_user', '=', auth()->user()->id_user)
            ->groupBy('cart.id_cart', 'dc.idDetail_cookies', 'dc.harga_cookies', 'cookie.nama_cookies', 'cookie.gambar_cookies', 'cookie.stock', 'berat.berat_cookies', 'cart.quantity')
            ->get();



        return view('user.cart', ['carts' => $carts]);
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
            $request->validate([
                'idDetail_cookies' => 'required',
                'quantity' => 'required',
                'id_user' => 'required'
            ]);

            $cart = DB::table('carts')
                ->where('id_user', $request->id_user)
                ->where('idDetail_cookies', $request->idDetail_cookies)
                ->first();

            if ($cart) {

                DB::table('carts')
                    ->where('id_user', $request->id_user)
                    ->where('idDetail_cookies', $request->idDetail_cookies)
                    ->update(['quantity' => $request->quantity]);

                return response()->json(['success' => true, 'message' => 'success', 'data' => $cart]);
            } else {

                $newCart = DB::table('carts')->insert([
                    'idDetail_cookies' => $request->idDetail_cookies,
                    'quantity' => $request->quantity,
                    'id_user' => $request->id_user
                ]);

                return response()->json(['success' => true, 'message' => 'success', 'data' => $newCart]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecartRequest $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $carts = DB::table('carts')->where('id_cart', '=' , $id)->where('id_user', '=', auth()->user()->id_user)->delete();

            if ($carts) {
                return redirect()->route('cart')->with('success', 'Successfully deleted');
            } else {
                return redirect()->route('cart')->with('error', 'Failed to delete');
            }
        } catch (\Exception $e) {
            return redirect()->route('cart')->with('error', $e->getMessage());
        }
    }
}
