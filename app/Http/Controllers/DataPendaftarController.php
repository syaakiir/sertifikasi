<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\kota;
use App\Models\Formulir;
use App\Models\provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataPendaftarController extends Controller
{
    public function main()
    {
        $dataPendaftar = Formulir::all();
        return view('dataPendaftar.index', ['dataPendaftar' => $dataPendaftar]);
    }
    public function lolos()
    {
        $dataPendaftar = Formulir::all();
        return view('dataPendaftar.lolos', ['dataPendaftar' => $dataPendaftar]);
    }

    public function ProsesDelete(Request $request)
    {
        $oldid = $request->query('oldid');
        $delItem = Formulir::findOrFail($oldid);
        $delItem->delete();
        Session::flash('alert-success', 'Success Delete Data'); // kasih pesan success
        return redirect()->route('dataPendaftar.index');
    }
}