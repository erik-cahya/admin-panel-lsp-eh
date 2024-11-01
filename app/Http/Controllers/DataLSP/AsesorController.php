<?php

namespace App\Http\Controllers\DataLSP;

use App\Http\Controllers\Controller;
use App\Models\AsesorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AsesorController extends Controller
{
    // function get Foto Asesor
    public function getFotoAsesor($id){
        return AsesorModel::where('id', $id)->first()->foto_asesor;
    }
    // function get Tanda Tangan
    public function getTandaTangan($id){
        return AsesorModel::where('id', $id)->first()->gambar_tanda_tangan;
    }

    public function compact(){

        $data['dataAsesor'] = AsesorModel::get();
        return view('admin.asesor.compact.index', $data);
    }

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
        // Image Upload Handler
        if ($request->foto_asesor === null) {
            $fotoAsesor = null;
        } else {
            $fotoAsesor = 'foto_' . $request->nama_asesor . '.' . $request->foto_asesor->extension();
            $request->foto_asesor->move(public_path('img/foto_asesor'), $fotoAsesor);
        }

        // Image Upload Handler
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
        // dd($request->all());

        // Image Upload Handler
        if ($request->foto_asesor === null) {
            $fotoAsesor = $this->getFotoAsesor($id);
        } else {
            File::delete(public_path('img/foto_asesor/' . $this->getFotoAsesor($id)));
            $fotoAsesor = 'foto_' . $request->nama_asesor . '.' . $request->foto_asesor->extension();
            $request->foto_asesor->move(public_path('img/foto_asesor'), $fotoAsesor);
        }

        // Image Upload Handler
        if ($request->gambar_tanda_tangan === null) {
            $gambarTandaTangan = $this->getTandaTangan($id);
        } else {
            File::delete(public_path('img/gambar_tanda_tangan/' . $this->getTandaTangan($id)));
            $gambarTandaTangan = 'tanda_tangan_' . $request->nama_asesor . '.' . $request->gambar_tanda_tangan->extension();
            $request->gambar_tanda_tangan->move(public_path('img/gambar_tanda_tangan'), $gambarTandaTangan);
        }

        AsesorModel::where('id', $id)->update([
            'nama_asesor' => $request->nama_asesor,
            'no_reg' => $request->no_reg,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'foto_asesor' => $fotoAsesor,
            'gambar_tanda_tangan' => $gambarTandaTangan
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
        // Delete Image Handler
        if ($this->getTandaTangan($id) != null || $this->getFotoAsesor($id) != null) {
            File::delete(public_path('img/foto_asesor/' . $this->getFotoAsesor($id)));
            File::delete(public_path('img/gambar_tanda_tangan/' . $this->getTandaTangan($id)));
        }
        // Delete Data Handler
        AsesorModel::destroy($id);
        return response()->json(['message' => 'QR Code Berhasil Dihapus']);
    }
}
