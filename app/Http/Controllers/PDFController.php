<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    //
    
    public function cetak(){
        
        
        $pdf = PDF::loadView('cetakpdf');
        return $pdf->stream('Laporan-Data-Santri.pdf');
    }
}
