
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
                <h5 class="card-title">Update Cookies</h5>
                    <form action="{{ route('cookies.update',$cookies->id_cookies) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                  <div class="col-lg-6">

                      <label for="">Nama Cookies</label>
                      <input type="text" value="{{ old('nama_cookies', $cookies->nama_cookies) }}" name="nama_cookies" class="form-control" >
                      <br>
                      <label for="">Gambar Cookies</label>
                      <input type="file" name="gambar_cookies" class="form-control">
                      <br>
                      <label for="">Stock Cookies</label>
                      <input type="number" value="{{ old('stock',$cookies->stock) }}" name="stock" class="form-control">

                  </div>
                  <div class="text-end py-4" >
                    <button type="submit" class="btn btn-primary"> update</button>
                 </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </section>



  </main><!-- End #main -->
@endsection


