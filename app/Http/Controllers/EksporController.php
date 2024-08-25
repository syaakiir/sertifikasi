<?php

namespace App\Http\Controllers;

use App\Models\kota;
use App\Models\Formulir;
use App\Models\provinsi;
use Illuminate\Http\Request;
use Dompdf\Dompdf;


class EksporController extends Controller
{
    public function main(Request $request)
    {
        $id = $request->query('id');
        $dataUser = Formulir::where('id_users', $id)->get();

        return view('ekspor.index', ['dataUser' => $dataUser]);
    }

    public function ekspor(Request $request)
    {
        $id = $request->query('id');
        $dataUser = Formulir::where('id', $id)->get();

        $view = view('ekspor.index', ['dataUser' => $dataUser]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($view->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfContent = $dompdf->output();

        // Set the appropriate headers for PDF download
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="pendaftaran.pdf"',
        ];

        return response($pdfContent, 200, $headers);
    }
}