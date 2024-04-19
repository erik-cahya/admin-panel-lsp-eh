<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
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

        // dd($data['data_surat']);
        return view('admin.surat.surat-tugas-asesor.index', $data);
    }

    public function createSurat()
    {
        $tuk['tuk'] = TUKModel::get();
        $check = DB::table('surat_tugas')->count();
        $count = $check + 1;
        $year = date('Y');

        if ($count < 10) {
            $nomor_surat['nomor_surat'] = "00" . $count . "/ST-LSP-EHI/" . $year;
        } elseif ($count >= 10 and $count < 100) {
            $nomor_surat['nomor_surat'] = "0" . $count . "/ST-LSP-EHI/" . $year;
        } elseif ($count >= 100) {
            $nomor_surat['nomor_surat'] = $count . "/ST-LSP-EHI/" . $year;
        }

        return view('admin.surat.surat-tugas-asesor.create', $tuk, $nomor_surat);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|unique:surat_tugas',
        ], [
            'nomor_surat.required' => 'Nomor surat harus diisi.',
            'nomor_surat.unique' => 'Nomor surat sudah digunakan.',
        ]);

        $doc = file_get_contents(public_path('template_surat/Surat-Tugas-Asesor.rtf'));
        // dd($doc);

        // Replace data
        $doc = str_replace('#NOMORSURAT', $request->nomor_surat, $doc);
        $doc = str_replace('#NAMAASESOR', $request->nama_asesor, $doc);
        $doc = str_replace('#NOMORASESOR', $request->no_reg, $doc);
        $doc = str_replace('#TANGGALSURAT', Carbon::createFromFormat('Y-m-d', $request->tanggal_surat)->locale('id')->isoFormat('DD MMMM YYYY'), $doc);
        $doc = str_replace('#NAMATUK', $request->nama_tuk, $doc);
        $doc = str_replace('#LOKASITUK', $request->alamat_tuk, $doc);
        $doc = str_replace('#TANGGALUJI', Carbon::createFromFormat('Y-m-d', $request->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY'), $doc);
        $doc = str_replace('#SKEMA', $request->skema, $doc);


        $fileName =  'Surat Tugas_' . $request->nama_asesor . '_' . str_replace('/', '-', Carbon::createFromFormat('Y-m-d', $request->tanggal_uji)->locale('id')->isoFormat(' DD MMMM YYYY'));
        Storage::put('public/surat/' . $fileName . '.doc', $doc);

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


        return back();
    }

    // ############ Page Edit Surat
    public function editSurat($id)
    {
        $data['dataSurat'] = SuratTugasModel::where('id', $id)->first();
        $tuk['tuk'] = TUKModel::get();
        return view('admin.surat.surat-tugas-asesor.edit', $data, $tuk);
    }

    // ############ Page Update Surat -> DB
    public function updateSurat(Request $request, $id)
    {
        // dd($request->all());

        // Hapus dulu file lama
        $namaSurat = DB::table('surat_tugas')->where('id', $id)->value('nama_surat');
        $filePath = 'public/surat/' . $namaSurat . '.doc';

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        } else {
            //echo "File tidak ditemukan.";
        }

        // Buat File Doc Baru
        $doc = file_get_contents(public_path('template_surat/Surat-Tugas-Asesor.rtf'));

        // Replace data
        $doc = str_replace('#NOMORSURAT', $request->nomor_surat, $doc);
        $doc = str_replace('#NAMAASESOR', $request->nama_asesor, $doc);
        $doc = str_replace('#NOMORASESOR', $request->no_reg, $doc);
        $doc = str_replace('#TANGGALSURAT', Carbon::createFromFormat('Y-m-d', $request->tanggal_surat)->locale('id')->isoFormat('DD MMMM YYYY'), $doc);
        $doc = str_replace('#NAMATUK', $request->nama_tuk, $doc);
        $doc = str_replace('#LOKASITUK', $request->alamat_tuk, $doc);
        $doc = str_replace('#TANGGALUJI', Carbon::createFromFormat('Y-m-d', $request->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY'), $doc);
        $doc = str_replace('#SKEMA', $request->skema, $doc);


        $fileName =  'Surat Tugas_' . $request->nama_asesor . '_' . str_replace('/', '-', Carbon::createFromFormat('Y-m-d', $request->tanggal_uji)->locale('id')->isoFormat(' DD MMMM YYYY'));
        Storage::put('public/surat/' . $fileName . '.doc', $doc);

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


        return redirect('surat-tugas-asesor/');
    }

    public function destroy(Request $request)
    {
        $namaSurat = DB::table('surat_tugas')->where('id', $request->id)->value('nama_surat');
        $filePath = 'public/surat/' . $namaSurat . '.doc';

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            SuratTugasModel::destroy($request->id);
            return redirect('surat-tugas-asesor/');
        } else {
            SuratTugasModel::destroy($request->id);
            echo "File tidak ditemukan.";
        }
    }


    public function downloadSurat($id)
    {
        // dd($id);
        $namaSurat = DB::table('surat_tugas')->where('id', $id)->value('nama_surat');
        $filePath = 'public/surat/' . $namaSurat . '.doc';

        if (Storage::exists($filePath)) {
            return response()->download(storage_path('app/' . $filePath), $namaSurat . '.doc');
        } else {
            // Jika pada saat download file docnya tidak ada.. maka buat lagi file docnya
            echo "File tidak ditemukan.";

            $dataSurat = SuratTugasModel::where('id', $id)->first();

            // Buat File Doc Baru
            $doc = file_get_contents(public_path('template_surat/Surat-Tugas-Asesor.rtf'));

            // Replace data
            $doc = str_replace('#NOMORSURAT', $dataSurat->nomor_surat, $doc);
            $doc = str_replace('#NAMAASESOR', $dataSurat->nama_asesor, $doc);
            $doc = str_replace('#NOMORASESOR', $dataSurat->no_reg, $doc);
            $doc = str_replace('#TANGGALSURAT', Carbon::createFromFormat('Y-m-d', $dataSurat->tanggal_surat)->locale('id')->isoFormat('DD MMMM YYYY'), $doc);
            $doc = str_replace('#NAMATUK', $dataSurat->nama_tuk, $doc);
            $doc = str_replace('#LOKASITUK', $dataSurat->alamat_tuk, $doc);
            $doc = str_replace('#TANGGALUJI', Carbon::createFromFormat('Y-m-d', $dataSurat->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY'), $doc);
            $doc = str_replace('#SKEMA', $dataSurat->skema, $doc);


            $fileName =  'Surat Tugas_' . $dataSurat->nama_asesor . '_' . str_replace('/', '-', Carbon::createFromFormat('Y-m-d', $dataSurat->tanggal_uji)->locale('id')->isoFormat(' DD MMMM YYYY'));
            Storage::put('public/surat/' . $fileName . '.doc', $doc);

            return response()->download(storage_path('app/' . $filePath), $namaSurat . '.doc');

        }
    }

    public function generatePdf($id)
    {
        $dataSurat = SuratTugasModel::where('id', $id)->first();
        $pdf = PDF::loadView('admin.surat.surat-tugas-asesor.pdf', ['dataSurat' => $dataSurat]);

        return $pdf->stream($dataSurat->nama_surat . '.pdf');
    }

    public function get_data_tuk($id)
    {
        $empData['data'] = DB::table('tuk')
            ->select("tuk_alamat")
            ->where('tuk_nama', $id)
            ->get();

        return response()->json($empData);
    }
}
