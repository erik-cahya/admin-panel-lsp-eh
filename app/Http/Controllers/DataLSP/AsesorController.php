<?php

namespace App\Http\Controllers\DataLSP;

use App\Http\Controllers\Controller;
use App\Models\AsesorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AsesorController extends Controller
{
    protected $data;

    public function __construct()
    {
        // Inisialisasi titlePage
        $this->data['titlePage'] = 'Data Asesor';
    }

    // function get Foto Asesor
    public function getFotoAsesor($id){
        return AsesorModel::where('id', $id)->first()->foto_asesor;
    }
    // function get Tanda Tangan
    public function getTandaTangan($id){
        return AsesorModel::where('id', $id)->first()->gambar_tanda_tangan;
    }

    public function compact(){

        $this->data['dataAsesor'] = AsesorModel::get();
        return view('admin.asesor.compact.index', $this->data);
    }

    public function index()
    {
        $this->data['dataAsesor'] = AsesorModel::get();
        // dd($dataAsesor);
        return view('admin.asesor.index', $this->data);
    }

    public function create()
    {
        return view('admin.asesor.create', $this->data);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama_asesor' => 'required|unique:asesor',
            'no_telp' => 'required|unique:asesor',
            'no_reg' => 'required|unique:asesor',
            'no_npwp' => 'unique:asesor',
            'alamat' => 'required',
        ], [
            'nama_asesor.required' => 'Nama Asesor Tidak Boleh Kosong.',
            'nama_asesor.unique' => 'Nama ini sudah terdaftar.',

            'no_telp.required' => 'No Telepon Tidak Boleh Kosong.',
            'no_telp.unique' => 'Nomor ini sudah terdaftar.',

            'no_reg.required' => 'No REG Tidak Boleh Kosong.',
            'no_reg.unique' => 'Nomor REG ini sudah terdaftar.',

            'no_npwp.unique' => 'Nomor NPWP ini sudah terdaftar.',

            'alamat.required' => 'Alamat Tidak Boleh Kosong.',
        ]);

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
            'no_npwp' => $request->no_npwp,
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
        $this->data['dataAsesor'] = AsesorModel::where('id', $id)->first();
        return view('admin.asesor.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $validated = $request->validate([
            'nama_asesor' => 'required|unique:asesor',
            'no_telp' => 'required|unique:asesor',
            'no_reg' => 'required|unique:asesor',
            'no_npwp' => 'unique:asesor',
            'alamat' => 'required',
        ], [
            'nama_asesor.required' => 'Nama Asesor Tidak Boleh Kosong.',
            'nama_asesor.unique' => 'Nama ini sudah terdaftar.',

            'no_telp.required' => 'No Telepon Tidak Boleh Kosong.',
            'no_telp.unique' => 'Nomor ini sudah terdaftar.',

            'no_reg.required' => 'No REG Tidak Boleh Kosong.',
            'no_reg.unique' => 'Nomor REG ini sudah terdaftar.',

            'no_npwp.unique' => 'Nomor NPWP ini sudah terdaftar.',

            'alamat.required' => 'Alamat Tidak Boleh Kosong.',
        ]);

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
            'no_npwp' => $request->no_npwp,
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
        $flashData = [
            'judul' => 'Delete Success',
            'pesan' => 'Data TUK Telah Dihapus',
            'swalFlashIcon' => 'success',
        ];
        // return redirect()->route('tuk')->with('flashData', $flashData);

        return response()->json(['message' => 'Data Surat Berhasil Dihapus']);
    }
}
