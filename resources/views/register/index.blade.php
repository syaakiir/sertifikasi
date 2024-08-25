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

<section class="vh-100 bg-light my-5 rounded-3">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="bg-white rounded-3 shadow">
                    <div class="card-body p-md-5">
                        <p class="text-center h1 fw-bold mb-5">Register</p>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_role" id="id_role" value="1">

                            <div class="form-outline mb-4">
                                <input type="text" id="name" name="name" class="form-control form-control-lg"
                                    placeholder="Enter your username" required>
                                <label class="form-label" for="name">Username</label>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control form-control-lg"
                                    placeholder="Enter your email" required>
                                <label class="form-label" for="email">Email</label>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" placeholder="Enter your password" required>
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <a href="{{ route('login') }}" class="text-body">Already have an account? Log In</a>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@extends('footer')
