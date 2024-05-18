<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DonnaCookies</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .btn-auth {
        border-radius: 5px;
        padding: 15px 50px;
        margin: 10px 30px;
        background-color: #97672cc3;
        color: white;
        font-size: 14px;

        font-weight: bold;
        cursor: pointer;
        transition: 0.5s;
    }
</style>

<body>

    <div class="container py-5 head-login">
        <div class="row">
            <div class="col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="d-flex justify-content-center align-items-center">
                   <a href="{{ route('login') }}"> <button class="btn btn-auth">Sign In</button></a>
                    <a href="{{ route('register') }}"><button class="btn btn-auth">Sign Up</button></a>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <form action="{{ route('loginPost') }}" method="POST">
            @csrf
        <div class="row d-flex justify-content-center align-content-center">
            <div class="col-lg-8 py-3">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>

            <div class="col-lg-8 py-3">
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>

            <div class="col-lg-8 py-3 text-end">
                <a style="text-decoration: none; color:#97672cc3" href="">
                    <h5>Lupa Password ? </h5>
                </a>
            </div>

            <div class="col-lg-9 py-3 text-end">
               <button type="submit" class="btn btn-auth">Login</button>
            </div>
        </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
