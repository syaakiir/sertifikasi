<?php

use App\Http\Controllers\EksporController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPendaftarController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing-page');
})->middleware('guest');

Route::get('/login', [LoginController::class, 'main'])->name('register.login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'main'])->name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/get-kota/{provinsiId}', [FormController::class, 'getKota']);
    Route::get('/ekspor', [EksporController::class, 'main'])->name('ekspor.index');
    Route::get('/eksporpdf', [EksporController::class, 'ekspor'])->name('ekspor.pdf');
});

Route::middleware(['user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'main'])->name('dashboard.user');

    Route::get('/form', [FormController::class, 'main'])->name('form.index');
    Route::post('/form', [FormController::class, 'pendaftaran'])->name('pendaftaran');
});

Route::middleware(['admin'])->group(function () {

    Route::get('/dashboardAdmin', [DashboardController::class, 'mainAdmin'])->name('dashboard.admin');

    Route::get('/dataUser', [DataUserController::class, 'main'])->name('dataUser.index');
    Route::get('/dataUser/proses-delete', [DataUserController::class, 'ProsesDelete'])->name('dataUser.delete');
    Route::get('/dataUser/tambah', [DataUserController::class, 'tambah'])->name('dataUser.tambah');
    Route::post('/dataUser/tambah', [DataUserController::class, 'store'])->name('dataUser.tambahProses');
    Route::get('/dataUser/edit', [DataUserController::class, 'edit'])->name('dataUser.edit');
    Route::post('/dataUser/edit', [DataUserController::class, 'editStore'])->name('dataUser.editProses');

    Route::get('/dataPendaftar', [DataPendaftarController::class, 'main'])->name('dataPendaftar.index');
    Route::get('/dataPendaftar/lolos', [DataPendaftarController::class, 'lolos'])->name('dataPendaftar.lolos');
    Route::get('/dataPendaftar/proses-delete', [DataPendaftarController::class, 'ProsesDelete'])->name('dataPendaftar.delete');
});