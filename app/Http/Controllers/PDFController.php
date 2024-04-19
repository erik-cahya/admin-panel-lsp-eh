<?php

namespace App\Http\Controllers;

use App\Models\SuratTugasModel;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    //

    public function cetak(){



        $data['dataSurat'] = SuratTugasModel::where('id', 1)->first();
        // dd($data['dataSurat']);
        $pdf = PDF::loadView('admin.surat.surat-tugas-asesor.pdf', $data);
        return $pdf->stream('Laporan-Data-Santri.pdf');
    }
}
