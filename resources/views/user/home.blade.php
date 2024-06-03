@extends('layouts.layoutUser')

@section('content')

<header>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="row1">
        <div class="text-box">
            <p>Donna cookies mempunyai kue kering yang rasanya enak dan tekstur nya yang renyah
                dengan cita rasa yang berbeda dan menggunakan bahan yang premium,
                dijamin bisa jadi cemilan di berbagai acara atau hidangan ringan buat dirumah lho!
                </p>
        </div>
        <div class="box-image">
            <img class="image" src="images/headerImage.svg" alt="">
        </div>
    </div>
    <div class="row2">
        <a class="btn btn-header" href="{{ route('katalog') }}">Katalog Produk</a>
    </div>
</header>
<section class="best-seller d-flex align-items-center flex-column">
    <b>Best Seller!</b>
        <div class="box-content d-flex">
           <div class="content d-flex flex-column align-items-center">
            <div class="content-image" style="background-image: url('images/thumprint.svg');"></div>
            <a class="btn btn-best-seller" href="">Thumbprint</a>
           </div>
           <div class="content d-flex flex-column align-items-center">
            <div class="content-image"  style="background-image: url('images/nastar.svg');"></div>
            <a class="btn btn-best-seller" href="">Nastar</a>
           </div>
           <div class="content d-flex flex-column align-items-center">
            <div class="content-image" style="background-image: url('images/sagu.svg');"></div>
            <a class="btn btn-best-seller" href="">Kue Sagu</a>
           </div>
        </div>
</section>
<center>
    <div class="galery">Galery</div>
</center>
<section class="galery-content d-flex justify-content-center m-3">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="carousel-image" style="background-image: url('images/carousel1.svg');"></div>
            <!-- <img src="..." class="d-block w-100" alt="..."> -->
          </div>
          <div class="carousel-item">
            <div class="carousel-image" style="background-image: url('images/carousel2.svg');"></div>
            <!-- <img src="..." class="d-block w-100" alt="..."> -->
          </div>
          <div class="carousel-item">
            <div class="carousel-image" style="background-image: url('images/carousel3.svg');"></div>
            <!-- <img src="..." class="d-block w-100" alt="..."> -->
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</section>
<section class="review">
    <b>Reviews</b>

    <div class="text-box">
        <form method="POST" action="{{route('reviewcreate',auth()->user()->id_user)}}">
            @csrf
        <textarea class="form-control" name="review" id="exampleFormControlTextarea1" rows="6" placeholder="Tinggalkan pesan disini!"></textarea>
        <button type="submit" class="btn btn-submit">Kirim</button>
    </form>
      </div>
</section>

<section class="review" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 py-3">
                <b>Reviews User</b>
            </div>
            <div class="row">


            @foreach ($reviews as $review)
            <div class="col-lg-4 my-3 d-flex mx-3" style="background-color:rgb(160, 125, 78); border-radius:20px">
                    <img src="{{asset('images/icon-user-15.jpg')}}" class="img-fluid py-3" style=" height:100px" alt="">
                    <p class="px-3 my-auto text-white">{{$review->review}}</p>

            </div>
            @endforeach
        </div>
        </div>
    </div>
</section>
@endsection
