@extends('layouts.layoutUser')

@section('content')

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12 text-center my-5">
                <img width="100" height="100" src="https://s3-alpha-sig.figma.com/img/c75f/92bc/d2436b7682e64a70a922d2a37f4261dc?Expires=1716768000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=dMfKwjKDlU8TzCtCzoTQDo3iR97uIB65YLHprHgSA~2dR0NM6qJTrrLDEeyp31MGU-Fe1-nWpR0ZZpZXlD2eYfxoLfvbN4rWuBnBTXqdjMNjyKxx1Z3NeVXMQtpV63BCiZf0obD0-TSZJWGEIM7zTMarmmmZV76pyKn-s3cE2vyKKxdR~0Je44xTLwZPS6N7si50-p5IejK1i0ge8c7YTMMSv1WkDGJW8zFx1buroJL3dpGn~xjspQ1lp~jblKXatkpnWbzc9iOBL0uVzOeZxtUfu70kcA9UzeU82~s5W42cucAzLh~TW1UGdwHdZvgIOfHs0GgHLoYkJ8DyoVwvhQ__" alt="">

                <div class="col-lg-12" style="background-color:#97662C;">
                    <p class="text-white mt-3 pt-4">Untuk info selanjutnya / COD silahkan hubungi nomor dibawah ini! (Bukti harus dikirim lewat WA juga)</p>
                    <h3 class="text-white font-weight-bold mb-3 py-3">+6281 9331 94583</h3>
                   <a href="{{ route('homeUser') }}"> <button class="btn mb-3" style="background-color: #c0853d; color:white; padding:10px 50px">Klik </button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
