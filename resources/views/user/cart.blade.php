@extends('layouts.layoutUser')

@section('content')
    <div class="container-keranjang p-4">
        <center>
            <div class="nav-keranjang p-3">
                <p style="padding: 0; margin: 0;">DONNA COOKIES</p>
                <a class="close" href="">X</a>
            </div>
        </center>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @foreach ($carts as $cart)
            <div class="row m-5" data-iddetail_cookies="{{ $cart->idDetail_cookies }}" data-quantity="{{ $cart->quantity }}"
                data-harga="{{ $cart->harga_cookies }}">

                <div class="col-2 container-image">
                    <div class="image" style="background-image: url('{{ asset('cookies/' . $cart->gambar_cookies) }}');">
                    </div>
                </div>
                <div class="col-8 container-desk">
                    <p class="title">{{ $cart->nama_cookies }}</p>
                    <p class="desk">{{ $cart->quantity }} x
                        {{ $cart->berat_cookies }}{{ $cart->berat_cookies < 1000 ? 'gram' : 'kg' }}
                        Rp{{ $cart->harga_cookies }} </p>
                </div>
                <div class="col-2 container-input">
                    <input class="form-control quantity" type="number" name="quantity" value="{{ $cart->quantity }}"
                        id="" data-id="{{ $cart->idDetail_cookies }}">
                    <form action="{{ route('cart.destroy', $cart->id_cart) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure ?')" class="btn px-4 text-white mx-2"
                            style=" background-color: #97662C; "><i class="bi bi-trash3-fill"></i></button>

                    </form>
                </div>

            </div>
        @endforeach

        <div class="subtotal">
            <p class="title">Subtotal:</p>
            <p class="desk subtotalDisplay">Rp125.000</p>
        </div>
        <center>
            <form id="formPembayaran" method="POST" action="{{ route('pemesanan.store') }}">
                @csrf
                <input type="hidden" class="dataCart">
                <input type="hidden" class="totalPesan">

                <button class="btn mt-5 buttonPembayaran" type="button">Pembayaran</button>
            </form>
        </center>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            let data = [];
            console.log($('[data-iddetail_cookies]'))
            $('[data-iddetail_cookies]').each(function() {
                //console.log($(this).data('idDetail_cookies'));
                console.log($(this).data('iddetail_cookies'))
                data.push({
                    idDetail_cookies: parseInt($(this).data('iddetail_cookies')),
                    quantity: parseInt($(this).data('quantity')),
                    harga_cookies: parseInt($(this).data('harga'))
                });
            });

            console.log(data);


            let updateSubtotal = function() {
                let subtotal = 0;
                data.forEach(item => {
                    subtotal += item.quantity * item.harga_cookies;
                });

                $('.totalPesan').val(subtotal)
                $('.subtotalDisplay').text(subtotal.toLocaleString(
                    'id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }
                ));
            };

            updateSubtotal();

            $('.quantity').on('input', function() {
                let id = $(this).data('id');
                let newQuantity = parseInt($(this).val());
                let index = data.findIndex(item => item.idDetail_cookies === id);
                if (index !== -1) {
                    data[index].quantity = newQuantity;
                    updateSubtotal();
                    console.log(data)

                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.buttonPembayaran', function() {

                console.log("akudisini")
                let form = $('#formPembayaran');


                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: {
                        dataCart: JSON.stringify(data),
                        totalPesan: $('.totalPesan').val()
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.success == true) {
                            console.log(response)
                            Swal.fire({
                                title: "Data Tersimpan!",
                                text: "Silahkan Klik Melanjutkan Pemesanan !",
                                icon: "success"
                            }).then( function(){
                                window.location.href = `/pemesanan/detail/${response.data}`
                            });

                        };

                    },
                    error: function(xhr, status, error) {
                        console.log(error)
                        console.log(xhr.responseText)
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                    }
                });
            })

        });
    </script>
@endsection
