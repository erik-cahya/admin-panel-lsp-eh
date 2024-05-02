<?php

namespace App\Http\Controllers\DataLSP;

use App\Http\Controllers\Controller;
use App\Models\AsesorModel;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        $data['dataAsesor'] = AsesorModel::get();
        // dd($dataAsesor);
        return view('admin.Asesor.index', $data);
    }

    public function create()
    {
        return view('admin.Asesor.create');
    }

    public function store(Request $request)
    {
        AsesorModel::create([
            'nama_asesor' => $request->nama_asesor,
            'no_reg' => $request->no_reg,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
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
        return view('admin.Asesor.edit', $data);
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

        $flashData = [
            'judul' => 'Delete Data Success',
            'pesan' => 'Data Asesor Berhasil Di Hapus',
            'swalFlashIcon' => 'success',
        ];
        return redirect('/asesor')->with('flashData', $flashData);
    }
}
