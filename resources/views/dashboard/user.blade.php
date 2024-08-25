@extends('head')
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if (Session::has('alert-' . $msg))
        <div
            class="alert alert-{{ $msg }} border-0 bg-{{ $msg }} alert-dismissible fade show m-5 my-2 text-white">
            <div class="">{{ Session::get('alert-' . $msg) }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endforeach
@if ($errors->any())
    <div class="alert alert-danger border-0 alert-dismissible fade show m-5 my-2">
        <div class="">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Navbar -->
<nav class="navbar navbar-light bg-primary py-3">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">
            <img src="https://th.bing.com/th/id/OIP.cBn4jPWclmK_doErPOqNoQHaHh?pid=ImgDet&rs=1" alt=""
                width="60" height="60" class="rounded-circle me-3">
            Politeknik Negeri Jakarta
        </a>
        <form action="{{ route('logout') }}" method="post" class="d-flex align-items-center">
            @csrf
            <button type="submit" class="btn btn-light text-primary fw-bold">Logout</button>
        </form>
    </div>
</nav>
<div class="container text-primary mt-5">
    <div class="container-fluid border rounded-3 my-5 py-5 border-secondary shadow-lg">

        <div class="row justify-content-center">
            <div class="col-md-4 m-3 p-5 border rounded-3 shadow-sm text-center" style="background-color: #f0f8ff;">
                <a href="{{ route('form.index') }}" class="btn btn-outline-primary btn-lg w-100 mb-3"
                    style="border-radius: 30px;">Daftar</a>
                <h3 class="h5 text-primary">Formulir Pendaftaran Mahasiswa Baru</h3>
            </div>
            <div class="col-md-4 m-3 p-5 border rounded-3 shadow-sm text-center" style="background-color: #f5f5f5;">
                <a href="{{ route('ekspor.index', ['id' => auth()->user()->id]) }}"
                    class="btn btn-outline-success btn-lg w-100 mb-3" style="border-radius: 30px;">Ekspor Bukti
                    Pendaftaran</a>
                <h3 class="h5 text-success">Ekspor Bukti Pendaftaran Anda</h3>
            </div>
        </div>

    </div>
</div>

@extends('footer')
