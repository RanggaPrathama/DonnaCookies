<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<style>
    .btn-cookies.active {
        border: 2px solid white;
    }
</style>

<body>
    <div class="container-cookies p-4">
        <center>
            <div class="galery">DONNA COOKIES</div>
        </center>
        <div class="row justify-content-center m-5">
            <div class="col-4 d-flex justify-content-center">
                <div class="image"
                    style="background-image: url('{{ asset('cookies/' . $cookies->gambar_cookies) }}');">
                </div>
            </div>
            <div class="col-8 d-flex justify-content-center">
                <div class="form-container d-flex flex-column align-items-center formCart">
                    <label for=""><b>Nastar</b></label>
                    <div class="row">
                        <div class="col-8 choose-item">
                            <div class="row d-flex justify-content-center align-items-center mt-4">
                                @foreach ($detail_cookies as $detail)
                                    <button class="btn-cookies m-2"
                                        data-detail-id="{{ $detail->idDetail_cookies }}">{{ $detail->berat_cookies }}
                                        {{ $detail->berat_cookies < 100 ? 'gram' : 'kg' }}
                                        ({{ $detail->harga_cookies }})
                                    </button>
                                @endforeach


                            </div>
                        </div>
                        <div class="col d-flex flex-column justify-content-between align-items-center me-5 mt-5">
                            <form id="formCart" action="{{ route('cart.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input class="form-control quantity" placeholder="jumlah" min="1" type="number"
                                    name="quantity" id="">

                                <input type="hidden" name="idDetail_cookies" class="idDetail_cookies">
                                <input type="hidden" name="id_user" class="id_user"
                                    value="{{ auth()->user()->id_user }}">
                                <button class="btn btn-submit buttonCart" type="button"
                                    style="float: right;">Pesan</button>
                            </form>
                        </div>
                    </div>

                    <!-- <input type="radio" name="" id=""> -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.btn-cookies').click(function(e) {
                e.preventDefault();
                //console.log('aku di klik')
                $('.btn-cookies').removeClass('active');
                $(this).addClass('active');
                var detailId = $(this).data('detail-id');
                $('.idDetail_cookies').val(detailId)
                console.log(detailId)
            });

            $('.quantity').on('input', function() {
                var quantity = $(this).val();
                $('.quantity').val(quantity);
            })


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.buttonCart', function() {

                let form = $('#formCart');
                //console.log(form);
                console.log(form.attr('method'));
                console.log(form.attr('action'));
                let idDetail = $('.idDetail_cookies').val();
                let quantity = $('.quantity').val();
                let id_user = $('.id_user').val();
                console.log(idDetail);
                console.log(quantity);
                console.log(id_user);
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: {
                        "idDetail_cookies": idDetail,
                        "quantity": parseInt($('.quantity').val()),
                        "id_user": parseInt($('.id_user').val())
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            Swal.fire({
                                title: "Success",
                                text: "Data Tersimpan!",
                                icon: "success"
                            }).then(function() {
                                window.location.href = '/cart';
                            });


                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + error);
                        console.log("error ey")
                        //console.log(error.message)
                        console.log(error);
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                           
                        });
                        //console.log(xhr.responseText);
                    }
                });
            });

        });

        // $(document).ready(function() {


        // });
    </script>

</body>

</html>
