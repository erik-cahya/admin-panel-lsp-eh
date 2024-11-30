<?php

namespace App\Http\Controllers\DataLSP;

use App\Http\Controllers\Controller;
use App\Models\ManajemenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ManajemenController extends Controller
{
    protected $data;

    public function __construct()
    {
        // Inisialisasi titlePage
        $this->data['titlePage'] = 'Manajemen LSP';
    }

    // function get Foto Manajemen
    public function getFotoManajemen($id){
        return ManajemenModel::where('id', $id)->first()->foto_manajemen;
    }
    // function get Tanda Tangan Manajemen
    public function getTandaTangan($id){
        return ManajemenModel::where('id', $id)->first()->gambar_tanda_tangan;
    }

    public function compact(){

        $this->data['dataManajemen'] = ManajemenModel::get();
        return view('admin.manajemen.compact.index', $this->data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['dataManajemen'] = ManajemenModel::get();
        return view('admin.manajemen.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manajemen.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $validated = $request->validate([
            'nama_manajemen' => 'required|unique:manajemen',
            'no_telp' => 'required|unique:manajemen',
            'jabatan' => 'required',
            'alamat' => 'required',
        ], [
            'nama_manajemen.required' => 'Nama Manjemen Tidak Boleh Kosong.',
            'nama_manajemen.unique' => 'Nama ini sudah terdaftar.',

            'no_telp.required' => 'No Telepon Tidak Boleh Kosong.',
            'no_telp.unique' => 'Nomor ini sudah terdaftar.',

            'jabatan.required' => 'Jabatan Tidak Boleh Kosong.',
            'alamat.required' => 'Alamat Tidak Boleh Kosong.',
        ]);

        // Image Upload Handler
        if ($request->foto_manajemen === null) {
            $fotoManajemen = null;
        } else {
            $fotoManajemen = 'foto_' . $request->nama_manajemen . '.' . $request->foto_manajemen->extension();
            $request->foto_manajemen->move(public_path('img/foto_manajemen'), $fotoManajemen);
        }

        // Image Upload Handler
        if ($request->gambar_tanda_tangan === null) {
            $gambarTandaTangan = null;
        } else {

            $gambarTandaTangan = 'tanda_tangan_' . $request->nama_manajemen . '.' . $request->gambar_tanda_tangan->extension();
            $request->gambar_tanda_tangan->move(public_path('img/gambar_tanda_tangan'), $gambarTandaTangan);
        }
        ManajemenModel::create([
            'nama_manajemen' => $request->nama_manajemen,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
            'foto_manajemen' => $fotoManajemen,
            'gambar_tanda_tangan' => $gambarTandaTangan
        ]);
        $dataPesan = [
            'judul' => 'Success',
            'pesan' => 'Data Manajemen Berhasil Ditambahkan',
            'swalFlashIcon' => 'success',
        ];
        return redirect('/manajemen')->with('flashData', $dataPesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['dataManajemen'] = ManajemenModel::where('id', $id)->first();
        return view('admin.manajemen.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());


        // Image Upload Handler
        if ($request->foto_manajemen === null) {
            $fotoManajemen = $this->getfotoManajemen($id);
        } else {
            File::delete(public_path('img/foto_manajemen/' . $this->getfotoManajemen($id)));
            $fotoManajemen = 'foto_' . $request->nama_manajemen . '.' . $request->foto_manajemen->extension();
            $request->foto_manajemen->move(public_path('img/foto_manajemen'), $fotoManajemen);
        }

        // Image Upload Handler
        if ($request->gambar_tanda_tangan === null) {
            $gambarTandaTangan = $this->getTandaTangan($id);
        } else {
            File::delete(public_path('img/gambar_tanda_tangan/' . $this->getTandaTangan($id)));
            $gambarTandaTangan = 'tanda_tangan_' . $request->nama_manajemen . '.' . $request->gambar_tanda_tangan->extension();
            $request->gambar_tanda_tangan->move(public_path('img/gambar_tanda_tangan'), $gambarTandaTangan);
        }

        ManajemenModel::where('id', $id)->update([
            'nama_manajemen' => $request->nama_manajemen,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,

            'foto_manajemen' => $fotoManajemen,
            'gambar_tanda_tangan' => $gambarTandaTangan
        ]);

        $flashData = [
            'judul' => 'Edit Data Success',
            'pesan' => 'Data Asesor Berhasil Di Edit',
            'swalFlashIcon' => 'success',
        ];
        return redirect('/manajemen')->with('flashData', $flashData);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete Image Handler
        if ($this->getTandaTangan($id) != null || $this->getFotoManajemen($id) != null) {
            File::delete(public_path('img/foto_manajemen/' . $this->getFotoManajemen($id)));
            File::delete(public_path('img/gambar_tanda_tangan/' . $this->getTandaTangan($id)));
        }
        // Delete Data Handler
        ManajemenModel::destroy($id);
        return response()->json(['message' => 'Data Manajemen Berhasil Dihapus']);
    }
}
