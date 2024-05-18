
@extends('layouts.layoutAdmin')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Create Data Cookies</h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Cookies</li>
        </ol>
      </nav>
      <!-- /resources/views/post/create.blade.php -->

<h1>Create Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Create Post Form -->
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create Cookies</h5>
                    <form action="{{ route('cookies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                  <div class="col-lg-6">

                      <label for="">Nama Cookies</label>
                      <input type="text" name="nama_cookies" class="form-control" >
                      <br>
                      <label for="">Gambar Cookies</label>
                      <input type="file" name="gambar_cookies" class="form-control">
                      <br>
                      <label for="">Stock Cookies</label>
                      <input type="number" name="stock" class="form-control">

                  </div>
                  <div class="text-end py-4" >
                    <button type="submit" class="btn btn-primary"> Create</button>
                 </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </section>

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Create Detail Cookies</h5>
                <form action="{{ route('detail.store') }}" method="POST">
                    @csrf
                  <div class="col-lg-6">
                      <label for="">Nama Cookies</label>

                      <select class="form-select" name="id_cookies" id="">
                        @foreach ( $cookies as $cookie )
                        <option {{ isset($idCookies) && $idCookies == $cookie->id_cookies ? 'selected' : '' }} value="{{ $cookie->id_cookies }}">{{ $cookie->nama_cookies }}</option>
                          @endforeach
                      </select>
                      <br>
                      <label for="">Berat Cookies</label>
                     <select name="id_berat" id="" class="form-select">
                        @foreach ( $berats as $berat )
                        <option {{ isset($idBerat) && $idBerat == $berat->id_berat ?'selected' : '' }} value="{{ $berat->id_berat }}">{{ $berat->berat_cookies }}</option>
                          @endforeach
                     </select>

                      <br>
                      <label for="">Harga Cookies</label>
                      <input type="number" name="harga_cookies" class="form-control">
                  </div>
                  <div class="text-end py-4" >
                    <button class="btn btn-primary"> Create Detail</button>
                 </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </section>

  </main><!-- End #main -->
@endsection


