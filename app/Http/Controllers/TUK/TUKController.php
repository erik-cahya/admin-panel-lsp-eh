<?php

namespace App\Http\Controllers\TUK;

use App\Http\Controllers\Controller;
use App\Models\TUKModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;


class TUKController extends Controller
{
    public function tuk()
    {
        $data['data'] = TUKModel::get();
        return view('admin.tuk.tuk', $data);
    }

    public function tukAdd()
    {
        return view('admin.tuk.tukAdd');
    }

    public function tukAdded(Request $req)
    {
        TUKModel::create([
            'tuk_nama' => $req->tuk_nama,
            'tuk_alamat' => $req->tuk_alamat,
            'tuk_namaCP' => $req->tuk_namaCP,
            'tuk_kontakCP' => $req->tuk_kontakCP,
        ]);

        return back();
    }
}
