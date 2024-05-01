<?php

namespace App\Http\Controllers\DataLsp;

use App\Http\Controllers\Controller;
use App\Models\TUKModel;
use Illuminate\Http\Request;

class TUKController extends Controller
{
    public function tuk()
    {
        $data['dataTuk'] = TUKModel::get();
        return view('admin.TUK.index', $data);
    }

    public function tukAdd()
    {
        return view('admin.TUK.tukAdd');
    }

    public function tukAdded(Request $req)
    {
        TUKModel::create([
            'tuk_nama' => $req->tuk_nama,
            'tuk_alamat' => $req->tuk_alamat,
            'tuk_namaCP' => $req->tuk_namaCP,
            'tuk_kontakCP' => $req->tuk_kontakCP,
        ]);
        $dataPesan = [
            'judul' => 'Data TUK Berhasil Ditambahkan',
            'pesan' => 'Ini adalah pesan tambahan atau deskripsi yang ingin Anda tampilkan.'
        ];
        return redirect('/tuk')->with('flashData', $dataPesan);
    }

    public function tukDeleted($id)
    {
        TUKModel::destroy($id);
        return redirect()->route('tuk')->with('delete', 'Data TUK Berhasil Di Hapus');
    }
}
