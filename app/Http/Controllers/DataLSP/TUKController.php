<?php

namespace App\Http\Controllers\DataLsp;

use App\Http\Controllers\Controller;
use App\Models\TUKModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TUKController extends Controller
{

    protected $data;

    public function __construct()
    {
        // Inisialisasi titlePage
        $this->data['titlePage'] = 'Data TUK LSP';
    }

    public function tuk()
    {
        $this->data['dataTuk'] = TUKModel::get();
        // $this->data['dataTuk'] = DB::table('tuk')->get();
        return view('admin.TUK.index', $this->data);
    }

    public function tukAdd()
    {
        return view('admin.TUK.tukAdd', $this->data);
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
            'judul' => 'Success',
            'pesan' => 'Data TUK Berhasil Ditambahkan',
            'swalFlashIcon' => 'success',
        ];
        return redirect()->route('tuk')->with('flashData', $dataPesan);
    }

    public function tukDeleted($id)
    {
        TUKModel::destroy($id);

        $flashData = [
            'judul' => 'Delete Success',
            'pesan' => 'Data TUK Telah Dihapus',
            'swalFlashIcon' => 'success',
        ];
        // return redirect()->route('tuk')->with('flashData', $flashData);

        return response()->json(['message' => 'Data Surat Berhasil Dihapus']);
    }
}
