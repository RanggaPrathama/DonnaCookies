@extends('layouts.layoutUser')

@section('content')
    <div class="container align-content-center " >
        <div class="row">
            <div class="col-lg-12 my-5" style="background-color:#97662C; padding:20px; 0px;  border-radius:30px  ">
                <h3 class="text-white">Konfirmasi Pembayaran</h3>
            </div>
        </div>
    </div>

    @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


    <div class="container">
        <form action="{{ route('pemesanan.update', $totalPesan[0]->id_pemesanan ) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="row">

            <div class="col-lg-6">
                <input type="text" value="{{ auth()->user()->name }}" disabled placeholder="Name" class="form-control my-3 py-3" style="background-color: #97662C; color:white; font-weight:700">

                <input type="text" placeholder="Alamat" name="alamat" class="form-control py-3" style="background-color: #97662C; color:white; font-weight:700">

                <input type="text" value="" placeholder="Telepone" name="no_telp" class="form-control my-3 py-3" style="background-color: #97662C; color:white; font-weight:700">

                <textarea type="text" name="catatan" placeholder="Catatan" class="form-control py-3 mb-5" style="background-color: #97662C; color:white; font-weight:700"> </textarea>
            </div>

            <div class="col-lg-6 mb-5">
                <div class="container" style="background-color: #97662C">
                    <div class="row">
                        <h3 class="text-white py-3">Pesanan Anda</h3>

                        @foreach ($pemesanans as $pemesanan )


                        <div class="col-lg-12 d-flex align-content-center">
                            <img src="{{ asset('cookies/'.$pemesanan->gambar_cookies) }}" style="width:120px; height:120px; background-size: cover; background-repeat:no-repeat" alt="">
                            <div class="align-content-center">
                                <p class="m-0 text-white">{{ $pemesanan->nama_cookies }}</p>
                                <p class="text-white">{{ $pemesanan->jumlah }} x {{ $pemesanan->berat_cookies }} {{ $pemesanan->berat_cookies < 1000 ? "gram" : "kg" }} {{ $pemesanan->harga_cookies }}</p>
                            </div>

                        </div>

                        @endforeach

                        <div class="col-lg-12 d-flex justify-content-between py-3">
                            <h4 class="text-white mx-3">Sub Total</h4>
                            <h4 class="text-white mx-3">{{ $totalPesan[0]->total_pesan }}</h4>
                        </div>

                        <div class="col-lg-12 text-end">
                            <button class="btn mx-3 text-end" type="submit" style="background-color:#e49535; color:white; padding:10px 30px">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
