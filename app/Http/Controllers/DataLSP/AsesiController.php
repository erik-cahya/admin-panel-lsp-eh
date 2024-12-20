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

        $data = Excel::toArray([], $request->file('file'));
        $rows = $data[0];
        $invalidRows = [];

        foreach ($rows as $key => $row) {
            if ($key == 0) continue; // Skip header

            // Validasi tanggal harus angka dan tidak null | kolom [6] excel
            if (!isset($row[6]) || !is_numeric($row[6])) {
                $invalidRows[] = [
                    'message' => 'Data Tanggal Excel Error',
                    'row_number' => $key + 1,
                    'nama' => $row[1],
                    'value' => 'Tanggal: ' . (isset($row[6]) ? $row[6] : "NULL")
                ];
            }

            // Validasi NIK harus 16 Digit | kolom [4] excel
            if (!preg_match('/^\d{16}$/', $row[4])) {
                $length = strlen(trim($row[4]));
                $invalidRows[] = [
                    'message' => 'Format NIK Salah',
                    'row_number' => $key + 1,
                    'nama' => $row[1],
                    'value' => 'NIK: ' . $row[4] . ' (Jumlah Digit: ' . $length . ')'
                ];
            }
        }

        // Jika ada baris tidak valid, tampilkan semuanya
        if (!empty($invalidRows)) {
            echo '<h2>Format data error</h2>';
            foreach ($invalidRows as $error) {
                echo '<div style="margin-top:15px; margin-left:20px;">' . $error['row_number'].'. ' . $error['message'] . ' | Baris ke: ' . $error['row_number'] . ' | Nama: ' . $error['nama'] . ' | ' . $error['value'] . "</div><hr>";
            }
            exit; // Hentikan proses setelah menampilkan error
        }

        // Jika semua data valid, lanjutkan proses
        $duplicates = [];
        foreach ($rows as $key => $row)
        {
            if ($key == 0) continue; // Skip header

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

            // Periksa apakah data sudah ada di database
            $exists = DB::table('asesi')->where([
                ['nik', '=', $nik],
            ])->exists();

            if ($exists) {
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
                DB::table('asesi')->insert([
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

        return back()->with([
            'success' => 'Data berhasil diimpor!',
            'duplicates' => $duplicates,
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
