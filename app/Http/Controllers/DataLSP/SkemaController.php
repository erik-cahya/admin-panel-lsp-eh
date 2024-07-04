<?php

namespace App\Http\Controllers\DataLSP;

use App\Http\Controllers\Controller;
use App\Models\SkemaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SkemaController extends Controller
{
    public function index()
    {
        $data['dataSkema'] = SkemaModel::get();


        return view('admin.skema.index', $data);
    }

    public function create()
    {
        return view('admin.skema.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_skema' => 'required|unique:skema',
        ], [
            'nama_skema.required' => 'Nama Skema Tidak Boleh Kosong.',
            'nama_skema.unique' => 'Data Skema Sudah Ada.',
        ]);

        SkemaModel::create([
            'nama_skema' => $request->nama_skema,
        ]);

        $dataPesan = [
            'judul' => 'Success',
            'pesan' => 'Data Skema Berhasil Ditambahkan',
            'swalFlashIcon' => 'success',
        ];
        return redirect('/skema')->with('flashData', $dataPesan);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        SkemaModel::destroy($id);

        $flashData = [
            'judul' => 'Delete Data Success',
            'pesan' => 'Data Skema Berhasil Di Hapus',
            'swalFlashIcon' => 'success',
        ];
        return redirect('/skema')->with('flashData', $flashData);
    }
}
