<?php

namespace App\Http\Controllers\DataLSP;

use App\Http\Controllers\Controller;
use App\Models\AsesiModel;
use App\Models\AsesorModel;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Ramsey\Uuid\Rfc4122\UuidV1;

class AsesiController extends Controller
{

    protected $data;

    public function __construct()
    {
        // Inisialisasi titlePage
        $this->data['titlePage'] = 'Data Asesi';
    }

    public function compact(){
        $this->data['dataAsesor'] = AsesorModel::get();
        $this->data['dataAsesi'] = AsesiModel::get();
        
        return view('admin.asesi.compact.index', $this->data);
    }

    public function index()
    {
        $this->data['dataAsesor'] = AsesorModel::get();
        $this->data['dataAsesi'] = AsesiModel::get();
        
        return view('admin.asesi.index', $this->data);
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        $data = Excel::toArray([], $request->file('file')); // Baca file Excel
        $rows = $data[0]; // Ambil sheet pertama
        $duplicates = []; // Array untuk menyimpan data yang duplikat 

        foreach ($rows as $key => $row) 
        {
            if ($key == 0) continue; // Skip header


            // Validasi nilai tanggal pada $row[6]
            if (!isset($row[6]) || !is_numeric($row[6])) {
                dd("Data Tanggal Lahir tidak valid pada ROW ke $key | Tanggal : " . (isset($row[6]) ? $row[6] : "NULL") . " | NAMA : " . $row[1]);
                
                // Lewati baris jika tidak valid
                // continue; 
            }

            // excel date convert (excel epoch to unix epoch)
            $birthDateUnix = gmdate('Y-m-d', ($row[6] - 25569) * 86400);

            // clear whitespace & nik must number
            $nama_lengkap = preg_replace('/\s+/', ' ', strtoupper(trim($row[1])));
            $nama_tempat_bekerja = preg_replace('/\s+/', ' ', strtoupper(trim($row[2])));
            $alamat = preg_replace('/\s+/', ' ', strtoupper(trim($row[3])));
            $nik = preg_replace('/\D/', '', preg_replace('/\s+/', ' ', strtoupper(trim($row[4]))));
            $tempat_lahir = preg_replace('/\s+/', ' ', strtoupper(trim($row[5])));
            $tanggal_lahir = $birthDateUnix;
            $jenis_kelamin = preg_replace('/\s+/', ' ', strtoupper(trim($row[7])));
            $alamat_tempat_tinggal = preg_replace('/\s+/', ' ', strtoupper(trim($row[8])));
            $telp = preg_replace('/\s+/', ' ', strtoupper(trim($row[9])));
            $email = preg_replace('/\s+/', ' ', trim($row[10]));
            $pendidikan_terakhir = preg_replace('/\s+/', ' ', strtoupper(trim($row[11])));
            $jabatan_pekerjaan = preg_replace('/\s+/', ' ', strtoupper(trim($row[12])));
            $skema_sertifikasi = preg_replace('/\s+/', ' ', strtoupper(trim($row[13])));
            $rencana_uji_kompetensi = preg_replace('/\s+/', ' ', strtoupper(trim($row[14])));


            // Periksa apakah seluruh baris sudah ada di database
            $exists = DB::table('asesi')->where([
                ['nik', '=', $nik],
            ])->exists();
            // $exists = DB::table('asesi')->where([
            //     ['nama_asesi', '=', $nama_asesi],
            //     ['nik', '=', $nik],
            //     ['tempat_lahir', '=', $tempat_lahir],
            //     ['tanggal_lahir', '=', $tanggal_lahir],
            //     ['jenis_kelamin', '=', $jenis_kelamin],
            //     ['tempat_tinggal', '=', $tempat_tinggal],
            //     ['kode_kabupaten', '=', $kode_kabupaten],
            //     ['kode_provinsi', '=', $kode_provinsi],
            //     ['telp', '=', $telp],
            //     ['email', '=', $email],
            //     ['kode_pendidikan', '=', $kode_pendidikan],
            //     ['kode_pekerjaan', '=', $kode_pekerjaan],
            //     ['kode_jadwal', '=', $kode_jadwal],
            //     ['tanggal_uji', '=', $tanggal_uji],
            //     ['nomor_registrasi_asesor', '=', $nomor_registrasi_asesor],
            //     ['kode_sumber_anggaran', '=', $kode_sumber_anggaran],
            //     ['kode_kementrian', '=', $kode_kementrian],
            //     ['status_kompeten', '=', $status_kompeten],
                
            // ])->exists();

            if ($exists) {
                // Simpan seluruh baris sebagai duplikat
                $duplicates[] = [
                    'nama_lengkap' => $nama_lengkap,
                    'nama_tempat_bekerja' => $nama_tempat_bekerja,
                    'alamat' => $alamat,
                    'nik' => $nik,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alamat_tempat_tinggal' => $alamat_tempat_tinggal,
                    'telp' => $telp,
                    'email' => $email,
                    'pendidikan_terakhir' => $pendidikan_terakhir,
                    'jabatan_pekerjaan' => $jabatan_pekerjaan,
                    'skema_sertifikasi' => $skema_sertifikasi,
                    'rencana_uji_kompetensi' => $rencana_uji_kompetensi,
                    
                ];
            } else {
                // Masukkan data ke database jika tidak duplikat
                DB::table('asesi')->insert([
                    // 'id' => rand(0000000000, 9999999999),
                    'id' => Str::uuid(),
                    'nama_lengkap' => $nama_lengkap,
                    'nama_tempat_bekerja' => $nama_tempat_bekerja,
                    'alamat' => $alamat,
                    'nik' => $nik,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alamat_tempat_tinggal' => $alamat_tempat_tinggal,
                    'telp' => $telp,
                    'email' => $email,
                    'pendidikan_terakhir' => $pendidikan_terakhir,
                    'jabatan_pekerjaan' => $jabatan_pekerjaan,
                    'skema_sertifikasi' => $skema_sertifikasi,
                    'rencana_uji_kompetensi' => $rencana_uji_kompetensi,
                ]);
            }
        }

        // Kirim data duplikat ke view
        return back()->with([
            'success' => 'Data berhasil diimpor!',
            'duplicates' => $duplicates, // Kirim baris-baris duplikat
        ]);
    }

    public function asesiDeleted($id)
    {
        AsesiModel::destroy($id);

        $flashData = [
            'judul' => 'Delete Success',
            'pesan' => 'Data TUK Telah Dihapus',
            'swalFlashIcon' => 'success',
        ];
        // return redirect()->route('tuk')->with('flashData', $flashData);

        return response()->json(['message' => 'Data Surat Berhasil Dihapus']);
    }
}
