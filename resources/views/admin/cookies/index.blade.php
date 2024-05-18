@extends('layouts.layoutAdmin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Cookies</h1>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Shoes</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Cookies</h5>

                            <a href="{{ route('cookies.create') }}"> <button class="btn btn-primary"> Create Data</button></a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id Cookies</th>
                                        <th scope="col">Nama Cookies</th>
                                        <th scope="col">Gambar Cookies</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $noId = 1; ?>
                                    @foreach ($cookies as $cookie)
                                        <tr>
                                            <th scope="row">{{ $noId++ }}</th>
                                            <td>{{ $cookie->nama_cookies }}</td>
                                            <td><img width="80" height="80"
                                                    src="{{ asset('cookies/' . $cookie->gambar_cookies) }}" alt="">
                                            </td>
                                            <td>{{ $cookie->stock }}</td>
                                            <td>
                                                <a href="{{ route('cookies.edit', $cookie->id_cookies) }}"><button
                                                        type='submit'class="btn btn-success"><i
                                                            class="bi bi-pencil-square"></i></button></a>
                                                <form action="{{ route('cookies.delete', $cookie->id_cookies) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure ?')"
                                                        class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>

                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

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
                            <h5 class="card-title">Detail Cookies</h5>

                            <a href="{{ route('cookies.create') }}"> <button class="btn btn-primary"> Create Data</button></a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id Cookies</th>
                                        <th scope="col">Nama Cookies</th>
                                        <th scope="col">Gambar Cookies</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Berat</th>
                                        <th scope="col">Harga</th>
                                      {{--  <th scope="col">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $noId = 1; ?>
                                    @foreach ($detail_cookies as $detail)
                                        <tr>
                                            <th scope="row">{{ $noId++ }}</th>
                                            <td>{{ $detail->nama_cookies }}</td>
                                            <td><img width="80" height="80"
                                                    src="{{ asset('cookies/' . $detail->gambar_cookies) }}" alt="">
                                            </td>
                                            <td>{{ $detail->stock }}</td>
                                            <td>{{ $detail->berat_cookies }}</td>
                                            <td>{{ $detail->harga_cookies }}</td>
                                            {{-- <td>
                                                <a href="{{ route('cookies.edit', $detail->idDetail_cookies) }}"><button
                                                        type='submit'class="btn btn-success"><i
                                                            class="bi bi-pencil-square"></i></button></a>
                                                <form action="{{ route('cookies.delete', $detail->idDetail_cookies) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure ?')"
                                                        class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>

                                                </form>

                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
