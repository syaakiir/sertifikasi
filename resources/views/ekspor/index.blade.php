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

<div class="container my-4">
    <h2 class="h2 text-center mb-5 text-primary" style="font-family: 'Poppins', sans-serif; font-weight: 600;">Data
        Pendaftar</h2>

    @foreach ($dataUser as $no => $value)
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('foto/' . $value->foto) }}" alt="Foto Pendaftar"
                            class="img-fluid rounded-circle mb-3" style="max-width: 200px;">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th>Nama</th>
                                <td>{{ $value->nama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Sekarang</th>
                                <td>{{ $value->alamat_sekarang }}</td>
                            </tr>
                            <tr>
                                <th>Alamat KTP</th>
                                <td>{{ $value->alamat_ktp }}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>{{ $value->provinsi }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>{{ $value->kabupaten }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Handphone</th>
                                <td>{{ $value->no_hp }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $value->email }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $value->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $value->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Status Pernikahan</th>
                                <td>{{ $value->status_menikah }}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>{{ $value->agama }}</td>
                            </tr>
                            <tr>
                                <th>Kewarganegaraan</th>
                                <td>{{ $value->kewarganegaraan }}</td>
                            </tr>
                            <tr>
                                <th>Nilai Rata Rata</th>
                                <td>{{ $value->nilai_rata }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    @if (auth()->user()->id_role == 1)
                        <a href="{{ route('dashboard.user') }}" class="btn btn-outline-secondary me-2"
                            style="border-radius: 30px;">Kembali</a>
                    @endif
                    @if (auth()->user()->id_role == 2)
                        <a href="{{ route('dashboard.admin') }}" class="btn btn-outline-secondary me-2"
                            style="border-radius: 30px;">Kembali</a>
                    @endif
                    <a href="{{ route('ekspor.pdf', ['id' => $value->id]) }}" class="btn btn-success"
                        style="border-radius: 30px;">Ekspor</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@extends('footer')
