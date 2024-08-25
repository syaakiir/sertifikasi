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

<div class="container border rounded-3 p-4 my-5 shadow-lg" style="background-color: #ffffff;">
    <div class="container text-center my-4">
        <h1 class="h2 text-primary" style="font-family: 'Poppins', sans-serif;">Formulir Pendaftaran Mahasiswa Baru
        </h1>
    </div>
    <div class="container">
        <form action="{{ route('pendaftaran') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldid" id="oldid" value="">
            <input type="hidden" name="id_users" id="id_users" value="{{ auth()->user()->id }}">

            <div class="form-group mb-4">
                <label for="nama" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Nama Lengkap</label>
                <input name="nama" id="nama" class="form-control" type="text" required
                    style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;">
            </div>

            <div class="form-group mb-4">
                <label for="alamat_ktp" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Alamat KTP</label>
                <textarea name="alamat_ktp" id="alamat_ktp" rows="5" class="form-control" required
                    style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;"></textarea>
            </div>

            <div class="row">
                <div class="col">
                    <label for="alamat_sekarang" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Alamat
                        Lengkap Saat Ini</label><br>
                    <textarea name="alamat_sekarang" id="alamat_sekarang" rows="5" class="form-control" required
                        style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;"></textarea><br>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="provinsi"
                        style="font-family: 'Poppins', sans-serif; font-weight: 500;">Provinsi</label><br>
                    <select name="provinsi" id="provinsi" class="form-control"
                        style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;">
                        <option value="" disabled selected>Pilih Provinsi Anda</option>
                        @foreach ($dataProvinsi as $nomor => $value)
                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                        @endforeach
                    </select><br>
                </div>
                <div class="col">
                    <label for="kota"
                        style="font-family: 'Poppins', sans-serif; font-weight: 500;">Kabupaten/Kota</label><br>
                    <select name="kabupaten" id="kota" class="form-control"
                        style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;">
                        <option value="">Pilih Kota</option>
                    </select><br>
                </div>
            </div>

            <label for="kecamatan" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Kecamatan</label><br>
            <input name="kecamatan" id="kecamatan" class="form-control" type="text" required
                style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;"><br>

            <div class="row">
                <div class="col">
                    <label for="no_hp" style="font-family: 'Poppins', sans-serif; font-weight: 500;">No
                        HP</label><br>
                    <input name="no_hp" id="no_hp" class="form-control" type="number" required
                        style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;"><br>
                </div>
                <div class="col">
                    <label for="email"
                        style="font-family: 'Poppins', sans-serif; font-weight: 500;">Email</label><br>
                    <input name="email" id="email" class="form-control" type="email" required
                        style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;"><br>
                </div>
            </div>

            <div class="col">
                <label for="kewarganegaraan"
                    style="font-family: 'Poppins', sans-serif; font-weight: 500;">Kewarganegaraan</label><br>
                <select name="kewarganegaraan" id="kewarganegaraan" class="form-control"
                    style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;">
                    <option value="" disabled selected>Pilih Kewarganegaraan Anda</option>
                    <option value="WNI Asli">WNI Asli</option>
                    <option value="WNI Keturunan">WNI Keturunan</option>
                    <option value="Warga Negara Asing">Warga Negara Asing</option>
                </select><br>
            </div>

            <div class="row">
                <div class="col">
                    <label for="tanggal_lahir" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Tanggal
                        Lahir</label><br>
                    <input name="tanggal_lahir" id="tanggal_lahir" class="form-control" type="date" required
                        style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;"><br>
                </div>
                <div class="col">
                    <label for="provinsi_lahir" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Provinsi
                        Tempat Lahir</label><br>
                    <select name="provinsi_lahir" id="provinsi_lahir" class="form-control"
                        style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;">
                        <option value="" disabled selected>Pilih Provinsi Lahir Anda</option>
                        @foreach ($dataProvinsi as $nomor => $value)
                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                        @endforeach
                    </select><br>
                </div>
                <div class="col">
                    <label for="kota_lahir"
                        style="font-family: 'Poppins', sans-serif; font-weight: 500;">Kabupaten/Kota Tempat
                        Lahir</label><br>
                    <select name="kota_lahir" id="kota_lahir" class="form-control"
                        style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;">
                        <option value="">Pilih Kota</option>
                    </select><br>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label for="jenis_kelamin" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Jenis
                        Kelamin</label><br>
                    <div
                        style="padding: 10px 20px; border-radius: 30px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;">
                        <div style="margin-bottom: 10px;">
                            <input type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-Laki" required>
                            <label for="laki_laki" style="font-family: 'Poppins', sans-serif;">Laki-Laki</label>
                        </div>
                        <div>
                            <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
                            <label for="perempuan" style="font-family: 'Poppins', sans-serif;">Perempuan</label>
                        </div>
                    </div><br>
                </div>

                <div class="col">
                    <label for="status_menikah" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Status
                        Menikah</label><br>
                    <select name="status_menikah" id="status_menikah" class="form-control"
                        style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;">
                        <option value="" disabled selected>Pilih Status Pernikahan Anda</option>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Lain-lain(Janda/Duda)">Lain-lain(Janda/Duda)</option>
                    </select><br>
                </div>
                <div class="col">
                    <label for="agama"
                        style="font-family: 'Poppins', sans-serif; font-weight: 500;">Agama</label><br>
                    <select name="agama" id="agama" class="form-control"
                        style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;">
                        <option value="" disabled selected>Pilih Agama Anda</option>
                        @foreach ($dataAgama as $nomor => $value)
                            <option value="{{ $value->nama }}">{{ $value->nama }}</option>
                        @endforeach
                    </select><br>
                </div>
            </div>

            <label for="foto" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Pas Foto</label><br>
            <input name="foto" id="foto" type="file" class="form-control" required
                style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;"><br>
            <div class="row">
                <div class="col">
                    <label for="nilai_rata" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Nilai
                        Rata Rata</label><br>
                    <input name="nilai_rata" id="nilai_rata" class="form-control" type="number" required
                        style="border-radius: 30px; padding: 10px 20px; border: 1px solid #ced4da; transition: all 0.3s ease-in-out;"><br>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col text-center">
                    <a class="btn btn-outline-danger me-2" href="{{ route('dashboard.user') }}"
                        style="border-radius: 30px; padding: 10px 20px; transition: all 0.3s ease-in-out; width: 80px;">Back</a>
                    <input class="btn btn-outline-primary ms-2" type="submit" value="Save"
                        style="border-radius: 30px; padding: 10px 20px; transition: all 0.3s ease-in-out; width: 80px;">
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#provinsi').change(function() {
        var provinsiId = $(this).val();

        if (provinsiId) {
            $.ajax({
                url: '/get-kota/' + provinsiId,
                type: 'GET',
                success: function(data) {
                    $('#kota').empty();
                    $('#kota').append('<option value="">Pilih Kota</option>');
                    $.each(data, function(key, value) {
                        $('#kota').append('<option value="' + value.id + '">' + value.nama +
                            '</option>');
                    });
                }
            });
        } else {
            $('#kota').empty();
            $('#kota').append('<option value="">Pilih Kota Kosong</option>');
        }
    });

    $('#provinsi_lahir').change(function() {
        var provinsiId = $(this).val();

        if (provinsiId) {
            $.ajax({
                url: '/get-kota/' + provinsiId,
                type: 'GET',
                success: function(data) {
                    $('#kota_lahir').empty();
                    $('#kota_lahir').append('<option value="">Pilih Kota</option>');
                    $.each(data, function(key, value) {
                        $('#kota_lahir').append('<option value="' + value.id + '">' + value
                            .nama +
                            '</option>');
                    });
                }
            });
        } else {
            $('#kota_lahir').empty();
            $('#kota_lahir').append('<option value="">Pilih Kota Kosong</option>');
        }
    });
</script>

@extends('footer')
