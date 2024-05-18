@extends('layouts.layoutUser')

@section('content')
<div class="container-menu p-4">
    <center>
        <div class="galery">Menu Produk</div>
    </center>
    <div class="row p-5 justify-content-center">
        @foreach ($cookies as $cookie )


        <div class="col-4 ">
            <center>
                <div class="circle-stroke">
                    <div class="circle-image" style="background-image: url('{{ asset('cookies/'.$cookie->gambar_cookies) }}'); background-size: 140%;">
                        <img src="" alt="">
                    </div>
                </div>
               <a href="{{ route('productCookies',$cookie->id_cookies) }}"> <button class="btn button-katalog my-3">{{ $cookie->nama_cookies }}</button></a>
            </center>
        </div>

        @endforeach

    </div>
</div>
@endsection
