<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    //

    public function cetak(){

        // $data['dataSurat'] = SuratTugasModel::where('id', $id)->first();
        // // dd($data['dataSurat']);
        // $pdf = Pdf::loadView('admin.surat.surat-tugas-asesor.pdf', $data);

        $pdf = PDF::loadView('cetakpdf');
        return $pdf->stream('Laporan-Data-Santri.pdf');
    }
}
