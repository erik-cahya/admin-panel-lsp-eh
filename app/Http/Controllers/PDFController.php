<?php

namespace App\Http\Controllers;
use App\Models\SuratTugasModel;


use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    //

    public function cetak(){

        $dataSurat = SuratTugasModel::where('id', 1)->first();
        // $dataSurat = SuratTugasModel::get();
        
        // dd($dataSurat);
        //$pdf = Pdf::loadView('admin.surat.surat-tugas-asesor.pdf', $data);

         $pdf = PDF::loadView('cetakpdf', ['data' => $dataSurat]);
        return $pdf->stream('Laporan-Data-Santri.pdf');
    }
}
