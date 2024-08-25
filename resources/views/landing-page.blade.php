<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<nav class="navbar navbar-light bg-primary py-3">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">
            <img src="https://th.bing.com/th/id/OIP.cBn4jPWclmK_doErPOqNoQHaHh?pid=ImgDet&rs=1" alt=""
                width="60" height="60" class="rounded-circle me-3">
            Politeknik Negeri Jakarta
        </a>
    </div>
</nav>


<body class="bg-gradient-primary text-white font-sans">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <section class="bg-dark text-center p-5 rounded shadow">
                    <h2 class="fw-bold mb-4">Selamat Datang Peserta Didik Baru</h2>
                    <p class="mb-4">Silahkan registrasi untuk pendaftaran</p>
                    <a href="{{ route('register.index') }}"
                        class="btn btn-outline-light btn-lg rounded-pill">Register</a>
                </section>
            </div>
            <div class="col-md-4 mb-4">
                <section class="bg-dark text-center p-5 rounded shadow">
                    <h2 class="fw-bold mb-4">Sudah Memiliki Akun?</h2>
                    <p class="mb-4">Silahkan menuju ke halaman login</p>
                    <a href="{{ route('register.login') }}" class="btn btn-outline-light btn-lg rounded-pill">Login</a>
                </section>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
