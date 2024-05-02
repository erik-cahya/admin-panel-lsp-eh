<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Models\AsesorModel;
use App\Models\TUKModel;
use App\Models\SuratTugasModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;


class SuratTugasAsesorController extends Controller
{
    public function index()
    {
        $data['data_surat'] = SuratTugasModel::get();

        $data['nomor_surat_terakhir'] = SuratTugasModel::latest()->first();
        if ($data['nomor_surat_terakhir'] == null) {
            $data['nomor_surat_terakhir'] =  ['nomor_surat' => '001/ST-LSP-EHI/2021'];
        }

        return view('admin.surat.surat-tugas-asesor.index', $data);
    }

    public function createSurat()
    {
        // Ambil data nomor surat terakhir
        $data['dataAsesor'] = AsesorModel::get();

        $nomorSuratTerakhir = SuratTugasModel::latest()->first();

        if ($nomorSuratTerakhir == null) {
            $nomorSuratTerakhir =  ['nomor_surat' => '000/ST-LSP-EHI/2021'];
        }
        // Ambil angkanya doang
        preg_match("/^\d+/", $nomorSuratTerakhir['nomor_surat'], $matches);
        $check = $matches[0];

        $data['tuk'] = TUKModel::get();
        $count = $check + 1;
        $year = date('Y');

        if ($count < 10) {
            $data['nomor_surat'] = "00" . $count . "/ST-LSP-EHI/" . $year;
        } elseif ($count >= 10 and $count < 100) {
            $data['nomor_surat'] = "0" . $count . "/ST-LSP-EHI/" . $year;
        } elseif ($count >= 100) {
            $data['nomor_surat'] = $count . "/ST-LSP-EHI/" . $year;
        }

        return view('admin.surat.surat-tugas-asesor.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|unique:surat_tugas',
            'nama_asesor' => 'required',
            'no_reg' => 'required',
            'nama_tuk' => 'required',
            'alamat_tuk' => 'required',
            'tanggal_uji' => 'required',
            'tanggal_surat' => 'required',
            'skema' => 'required',
        ], [
            'nomor_surat.required' => 'Nomor surat harus diisi.',
            'nomor_surat.unique' => 'Nomor surat sudah digunakan.',
        ]);

        $fileName =  'Surat Tugas_' . $request->nama_asesor . '_' . str_replace('/', '-', Carbon::createFromFormat('Y-m-d', $request->tanggal_uji)->locale('id')->isoFormat('DD-MM-YYYY'));

        SuratTugasModel::create([
            'nama_surat' => $fileName,
            'nomor_surat' => $request->nomor_surat,
            'nama_asesor' => $request->nama_asesor,
            'no_reg' => $request->no_reg,
            'nama_tuk' => $request->nama_tuk,
            'alamat_tuk' => $request->alamat_tuk,
            'tanggal_uji' => $request->tanggal_uji,
            'tanggal_surat' => $request->tanggal_surat,
            'skema' => $request->skema,
        ]);

        $flashData = [
            'judul' => 'Create Surat Success',
            'pesan' => 'Surat Tugas Berhasil Dibuat',
            'swalFlashIcon' => 'success',
        ];
        return back()->with('flashData', $flashData);
    }

    // ############ Page Edit Surat
    public function editSurat($id)
    {
        $data['dataSurat'] = SuratTugasModel::where('id', $id)->first();
        $tuk['tuk'] = TUKModel::get();
        return view('admin.surat.surat-tugas-asesor.edit', $data, $tuk);
    }

    public function updateSurat(Request $request, $id)
    {
        $fileName =  'Surat Tugas_' . $request->nama_asesor . '_' . str_replace('/', '-', Carbon::createFromFormat('Y-m-d', $request->tanggal_uji)->locale('id')->isoFormat('DD-MM-YYYY'));

        SuratTugasModel::where('id', $id)->update([
            'nama_surat' => $fileName,
            'nomor_surat' => $request->nomor_surat,
            'nama_asesor' => $request->nama_asesor,
            'no_reg' => $request->no_reg,
            'nama_tuk' => $request->nama_tuk,
            'alamat_tuk' => $request->alamat_tuk,
            'tanggal_uji' => $request->tanggal_uji,
            'tanggal_surat' => $request->tanggal_surat,
            'skema' => $request->skema,
        ]);

        $flashData = [
            'judul' => 'Edit Surat Success',
            'pesan' => 'Surat Tugas Berhasil Di Edit',
            'swalFlashIcon' => 'success',
        ];
        return redirect('surat-tugas-asesor/')->with('flashData', $flashData);
    }

    public function destroy(Request $request)
    {
        SuratTugasModel::destroy($request->id);

        $flashData = [
            'judul' => 'Hapus Surat Success',
            'pesan' => 'Surat Tugas Berhasil Di Hapus',
            'swalFlashIcon' => 'success',
        ];
        return redirect('surat-tugas-asesor/')->with('flashData', $flashData);
    }


    public function downloadSurat($id)
    {
        // Setiap Tombol download word ditekan, hapus semua file yang ada dan ganti dengan yang baru (biar server ga penuh)
        Storage::deleteDirectory('public/surat');

        $dataSurat = SuratTugasModel::where('id', $id)->first();

        $doc = file_get_contents(public_path('template_surat/Surat-Tugas-Asesor.rtf'));

        $doc = str_replace('#NOMORSURAT', $dataSurat->nomor_surat, $doc);
        $doc = str_replace('#NAMAASESOR', $dataSurat->nama_asesor, $doc);
        $doc = str_replace('#NOMORASESOR', $dataSurat->no_reg, $doc);
        $doc = str_replace('#TANGGALSURAT', Carbon::createFromFormat('Y-m-d', $dataSurat->tanggal_surat)->locale('id')->isoFormat('DD MMMM YYYY'), $doc);
        $doc = str_replace('#NAMATUK', $dataSurat->nama_tuk, $doc);
        $doc = str_replace('#LOKASITUK', $dataSurat->alamat_tuk, $doc);
        $doc = str_replace('#TANGGALUJI', Carbon::createFromFormat('Y-m-d', $dataSurat->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY'), $doc);
        $doc = str_replace('#SKEMA', $dataSurat->skema, $doc);

        $fileName =  $dataSurat->nama_surat;
        $filePath = 'app/public/surat/' . $fileName . '.doc';

        Storage::put('public/surat/' . $fileName . '.doc', $doc);
        $response = response()->download(storage_path($filePath), $fileName . '.doc');

        return $response;
    }

    public function generatePdf($id)
    {
        $dataSurat = SuratTugasModel::where('id', $id)->first();
        $pdf = PDF::loadView('admin.surat.surat-tugas-asesor.pdf', ['dataSurat' => $dataSurat]);

        return $pdf->download($dataSurat->nama_surat . '.pdf');
    }

    public function get_data_tuk($id)
    {
        $empData['data'] = DB::table('tuk')
            ->select("tuk_alamat")
            ->where('tuk_nama', $id)
            ->get();

        return response()->json($empData);
    }

    public function get_data_asesor($id)
    {
        $empData['data'] = DB::table('asesor')
            ->select("no_reg")
            ->where('nama_asesor', $id)
            ->get();

        return response()->json($empData);
    }
}
