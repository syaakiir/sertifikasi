@extends('head')

<div class="container-fluid">
    <div class="container text-center my-4">
        <h1 class="h2 text-primary" style="font-family: 'Poppins', sans-serif; font-weight: 600;">Data Mahasiswa
            LOLOS (3 teratas)</h1>
    </div>

    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-3 mb-2">
                <a href="{{ route('dashboard.admin') }}"
                    class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center rounded-pill shadow-sm">
                    <i class="bi bi-backspace-fill me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid my-4">
        <table id="data-table" class="table table-striped table-bordered text-center rounded-3 shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Kewarganegaraan</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPendaftar as $no => $value)
                    <tr data-nilai="{{ $value->nilai_rata }}" style="vertical-align: middle;">
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->jenis_kelamin }}</td>
                        <td>{{ $value->kewarganegaraan }}</td>
                        <td>{{ $value->nilai_rata }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var table = document.getElementById('data-table');
            var rows = Array.from(table.querySelectorAll('tbody tr'));

            rows.sort(function(a, b) {
                return b.dataset.nilai - a.dataset.nilai;
            });

            table.querySelector('tbody').innerHTML = '';
            rows.slice(0, 3).forEach(function(row, index) {
                row.cells[0].textContent = index + 1;
                table.querySelector('tbody').appendChild(row);
            });
        });
    </script>
