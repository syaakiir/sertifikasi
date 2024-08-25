@extends('head')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if (Session::has('alert-' . $msg))
        <div
            class="alert alert-{{ $msg }} border-0 bg-{{ $msg }} alert-dismissible fade show m-5 my-2">
            <div class="text-white">{{ Session::get('alert-' . $msg) }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endforeach

<div class="container-fluid">
    <div class="container text-center my-4">
        <h1 class="h2 text-primary" style="font-family: 'Poppins', sans-serif; font-weight: 600;">Data Pendaftar Mahasiswa
            Baru</h1>
    </div>

    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-3 mb-2">
                <a href="{{ route('dataUser.index') }}"
                    class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center rounded-pill shadow-sm">
                    <i class="bi bi-book-fill me-2"></i> Data User
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
                    <th>Id User</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Jenis Kelamin</th>
                    <th>Kewarganegaraan</th>
                    <th>Nilai Rata Rata</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPendaftar as $no => $value)
                    <tr style="vertical-align: middle;">
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $value->id_users }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->email }}</td>
                        <td><img src="/foto/{{ $value->foto }}"
                                style="width: 100px; height: auto; border-radius: 8px;"></td>
                        <td>{{ $value->jenis_kelamin }}</td>
                        <td>{{ $value->kewarganegaraan }}</td>
                        <td>{{ $value->nilai_rata }}</td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm me-2"
                                href="{{ route('ekspor.index', ['id' => $value->id_users]) }}">
                                <i class="bi bi-eye-fill"></i> Lihat Data
                            </a>
                            <a class="btn btn-outline-danger btn-sm"
                                href="{{ route('dataPendaftar.delete', ['oldid' => $value->id]) }}"
                                onclick="return confirm('Hapus Data Pendaftar {{ $value->nama }}')">
                                <i class="bi bi-trash3-fill"></i> Hapus
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@extends('footer')
