@extends('head')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if (Session::has('alert-' . $msg))
        <div
            class="alert alert-{{ $msg }} border-0 bg-{{ $msg }} alert-dismissible fade show m-5 my-2 text-white">
            {{ Session::get('alert-' . $msg) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endforeach

@if ($errors->any())
    <div class="alert alert-danger border-0 alert-dismissible fade show m-5 my-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container border rounded-3 p-4 my-4 bg-light shadow-sm">
    <div class="container text-center my-3">
        <h1 class="h3 text-primary" style="font-family: 'Poppins', sans-serif; font-weight: 600;">Form Tambah User Baru
        </h1>
    </div>

    <form action="{{ route('dataUser.tambahProses') }}" method="post">
        @csrf
        <input type="hidden" name="oldid" id="oldid" value="">
        <input type="hidden" name="id_role" id="id_role" value="1">

        <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input name="name" id="name" class="form-control" type="text" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" id="email" class="form-control" type="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" id="password" class="form-control" type="password" required>
        </div>

        <div class="row my-4">
            <div class="col text-center">
                <a class="btn btn-outline-danger me-2" href="{{ route('dataUser.index') }}"
                    style="width: 80px;">Back</a>
                <input class="btn btn-outline-primary" type="submit" value="Save" style="width: 80px;">
            </div>
        </div>
    </form>
</div>

@extends('footer')
