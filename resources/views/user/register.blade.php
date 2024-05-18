<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DonnaCookies</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
     .btn-auth{
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
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('login') }}"> <button class="btn btn-auth">Sign In</button></a>
                         <a href="{{ route('register') }}"><button class="btn btn-auth">Sign Up</button></a>
                     </div>
                </div>
            </div>

        </div>

        <div class="container">
            <form action="{{ route('registerPost') }}" method="POST">
                @csrf
            <div class="row d-flex justify-content-center align-content-center">

                <div class="col-lg-8 py-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name">
                    @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-lg-8 py-3">
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email">
                    @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="col-lg-8 py-3">
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="col-lg-8 py-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
                </div>



                <div class="col-lg-9 py-3 text-end">
                    <button type="submit" class="btn btn-auth">Register</button>
                </div>
            </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
