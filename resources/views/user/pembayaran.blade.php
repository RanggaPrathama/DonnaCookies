@extends('layouts.layoutUser')

@section('content')

    <section>


    <div class="container" style="padding: 120px 0px">
        <div class="row">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            <div class="col-lg-12">
                <h3>Metode Pembayaran</h3>
            </div>
            <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            @foreach ($payments as $payment )
            <div class="col-lg-12 d-flex ">
                <img src="{{ asset('payments/'.$payment->gambar_payment) }}" style="width:100px; height:100px; background-size: cover; background-repeat:no-repeat" alt="">
                <h6 class="align-content-center px-4 ">No Rekening : {{ $payment->no_rekening}}</h6>
            </div>
            @endforeach
            <div class="col-lg-12  ">
                <h4 class="font-weight-bold mb-3">Bukti Bayar</h4>
                <input type="hidden" name="id_pemesanan" value="{{ $pemesanans->id_pemesanan }}">
                <input type="hidden" name="id_payment" value="{{ $payment->id_payment }}">
              <input type="file" name="buktiBayar" class="form-control" style="background-color:#97662C; max-width:500px">
            </div>

            <div class="col-lg-12 text-center  ">
                <button class="btn btn-primary  mt-5" style="background-color:#97662C; color:white; padding: 15px 60px;">Upload </button>
            </div>
        </div>
    </form>
    </section>
@endsection
