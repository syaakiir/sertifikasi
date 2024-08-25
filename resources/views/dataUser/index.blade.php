@extends('head')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if (Session::has('alert-' . $msg))
        <div
            class="alert alert-{{ $msg }} border-0 bg-{{ $msg }} alert-dismissible fade show m-5 my-2 text-white">
            <div>{{ Session::get('alert-' . $msg) }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endforeach

@if ($errors->any())
    <div class="alert alert-danger border-0 alert-dismissible fade show m-5 my-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container-fluid">
    <div class="container text-center my-4">
        <h1 class="h2 text-primary" style="font-family: 'Poppins', sans-serif; font-weight: 600;">Data User</h1>
    </div>

    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-3 mb-2">
                <a href="{{ route('dataUser.tambah') }}"
                    class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center rounded-pill shadow-sm">
                    <i class="bi bi-plus-square-fill me-2"></i> Tambah
                </a>
            </div>
            <div class="col-md-4 col-lg-3 mb-2">
                <a href="{{ route('dataPendaftar.index') }}"
                    class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center rounded-pill shadow-sm">
                    <i class="bi bi-book-fill me-2"></i> Data Pendaftar
                </a>
            </div>
            <div class="col-md-4 col-lg-3 mb-2">
                <a href="{{ route('dashboard.admin') }}"
                    class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center rounded-pill shadow-sm">
                    <i class="bi bi-backspace-fill me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid my-4">
        <table class="table table-striped table-bordered text-center rounded-3 shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataUser as $no => $value)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                            <button class="btn btn-outline-success btn-sm me-2" data-bs-toggle="modal"
                                data-bs-target="#editModal-{{ $value->id }}">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </button>
                            <a class="btn btn-outline-danger btn-sm"
                                href="{{ route('dataUser.delete', ['oldid' => $value->id]) }}"
                                onclick="return confirm('Hapus Data User {{ $value->name }}')">
                                <i class="bi bi-trash3-fill"></i> Hapus
                            </a>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal-{{ $value->id }}" tabindex="-1"
                        aria-labelledby="editModalLabel-{{ $value->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel-{{ $value->id }}">Edit User:
                                        {{ $value->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('dataUser.editProses') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="oldid" value="{{ $value->id }}">
                                        <input type="hidden" name="id_role" value="{{ $value->id_role }}">
                                        <input type="hidden" name="password" value="{{ $value->password }}">

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Username</label>
                                            <input name="name" class="form-control" type="text"
                                                value="{{ $value->name }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" class="form-control" type="email"
                                                value="{{ $value->email }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="" class="form-control" type="password"
                                                value="{{ $value->password }}" disabled>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input class="btn btn-outline-primary" type="submit" value="Save">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Edit Modal -->
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@extends('footer')
