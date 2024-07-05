<?php

namespace App\Http\Controllers\DataLSP;

use App\Http\Controllers\Controller;
use App\Models\AsesorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AsesorController extends Controller
{
    public function index()
    {
        $data['dataAsesor'] = AsesorModel::get();
        // dd($dataAsesor);
        return view('admin.asesor.index', $data);
    }

    public function create()
    {
        return view('admin.asesor.create');
    }

    public function store(Request $request)
    {

        // image upload handler
        if ($request->foto_asesor === null) {
            $fotoAsesor = null;
        } else {

            $fotoAsesor = 'foto_' . $request->nama_asesor . '.' . $request->foto_asesor->extension();
            $request->foto_asesor->move(public_path('img/foto_asesor'), $fotoAsesor);
        }

        // image upload handler
        if ($request->gambar_tanda_tangan === null) {
            $gambarTandaTangan = null;
        } else {

            $gambarTandaTangan = 'tanda_tangan_' . $request->nama_asesor . '.' . $request->gambar_tanda_tangan->extension();
            $request->gambar_tanda_tangan->move(public_path('img/gambar_tanda_tangan'), $gambarTandaTangan);
        }
        AsesorModel::create([
            'nama_asesor' => $request->nama_asesor,
            'no_reg' => $request->no_reg,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'foto_asesor' => $fotoAsesor,
            'gambar_tanda_tangan' => $gambarTandaTangan
        ]);
        $dataPesan = [
            'judul' => 'Success',
            'pesan' => 'Data Asesor Berhasil Ditambahkan',
            'swalFlashIcon' => 'success',
        ];
        return redirect('/asesor')->with('flashData', $dataPesan);
    }

    public function edit($id)
    {
        $data['dataAsesor'] = AsesorModel::where('id', $id)->first();
        return view('admin.asesor.edit', $data);
    }

    public function update(Request $request, $id)
    {
        AsesorModel::where('id', $id)->update([
            'nama_asesor' => $request->nama_asesor,
            'no_reg' => $request->no_reg,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        $flashData = [
            'judul' => 'Edit Data Success',
            'pesan' => 'Data Asesor Berhasil Di Edit',
            'swalFlashIcon' => 'success',
        ];
        return redirect('/asesor')->with('flashData', $flashData);
    }

    public function destroy($id)
    {
        AsesorModel::destroy($id);

        return response()->json(['message' => 'QR Code Berhasil Dihapus']);

        // $flashData = [
        //     'judul' => 'Delete Data Success',
        //     'pesan' => 'Data Asesor Berhasil Di Hapus',
        //     'swalFlashIcon' => 'success',
        // ];
        // return redirect('/asesor')->with('flashData', $flashData);
    }
}
