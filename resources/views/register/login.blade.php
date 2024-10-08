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

<div class="container">
    <section class="vh-100 bg-light my-5 rounded-3">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="bg-white rounded-3 shadow">
                        <div class="card-body p-md-5">
                            <p class="text-center h1 fw-bold mb-5">Login</p>

                            <form action="{{ route('login') }}" method="post">
                                @csrf

                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name="email"
                                        class="form-control form-control-lg" placeholder="Enter a valid email address"
                                        autofocus required />
                                    <label class="form-label" for="email">Email address</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" placeholder="Enter password" required />
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <a href="{{ route('register') }}" class="text-body">Register?</a>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-lg"
                                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@extends('footer')
