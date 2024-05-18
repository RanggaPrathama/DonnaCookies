
@extends('layouts.layoutAdmin')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Create Data Payments</h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Payments</li>
        </ol>
      </nav>
      <!-- /resources/views/post/create.blade.php -->



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
                <h5 class="card-title">Create Payment</h5>
                    <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container">


                        <div class="row">
                            <div class="col-lg-6">

                                <label for="">No rekening</label>
                                <input type="number" name="no_rekening" class="form-control" >
                            </div>

                            <div class="col-lg-6 pb-3">
                                <label for="">Nama Bank</label>
                                <input type="Text" name="nama_bank" class="form-control" >
                            </div>

                            <div class="col-lg-6">
                                <label for="">Atas Nama</label>
                                <input type="text" name="atas_nama" class="form-control" >
                            </div>
                                <div class="col-lg-6 pb-3">
                                    <label for="">Gambar Payment</label>
                                    <input type="file" name="gambar_payment" class="form-control" >
                                </div>

                        </div>
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



  </main><!-- End #main -->
@endsection


