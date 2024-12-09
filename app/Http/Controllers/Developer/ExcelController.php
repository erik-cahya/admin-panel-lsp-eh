<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index(){
        return view('Developer.Excel.index');
    }


    public function importWithoutClass(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        $data = Excel::toArray([], $request->file('file')); // Baca file Excel
        $rows = $data[0]; // Ambil sheet pertama
        $duplicates = []; // Array untuk menyimpan data yang duplikat

        foreach ($rows as $key => $row) {
            if ($key == 0) continue; // Skip header

            // bersihkan spasi berlebih & paksa kolom nik hanya angka
            $nama_lengkap = preg_replace('/\s+/', ' ', strtoupper(trim($row[1])));
            $nama_tempat_bekerja = preg_replace('/\s+/', ' ', strtoupper(trim($row[2])));
            $alamat = preg_replace('/\s+/', ' ', strtoupper(trim($row[3])));
            $nik = preg_replace('/\D/', '', preg_replace('/\s+/', ' ', strtoupper(trim($row[4]))));
            $tempat_lahir = preg_replace('/\s+/', ' ', strtoupper(trim($row[5])));
            $tanggal_lahir = preg_replace('/\s+/', ' ', strtoupper(trim($row[6])));
            $jenis_kelamin = preg_replace('/\s+/', ' ', strtoupper(trim($row[7])));
            $alamat_tempat_tinggal = preg_replace('/\s+/', ' ', strtoupper(trim($row[8])));
            $telp = preg_replace('/\s+/', ' ', strtoupper(trim($row[9])));
            $email = preg_replace('/\s+/', ' ', trim($row[10]));
            $pendidikan_terakhir = preg_replace('/\s+/', ' ', strtoupper(trim($row[11])));
            $jabatan_pekerjaan = preg_replace('/\s+/', ' ', strtoupper(trim($row[12])));
            $skema_sertifikasi = preg_replace('/\s+/', ' ', strtoupper(trim($row[13])));
            $rencana_uji_kompetensi = preg_replace('/\s+/', ' ', strtoupper(trim($row[14])));

            // dd($nik);
            
            

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


    public function example(Request $request)
    {
         $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        $data = Excel::toArray([], $request->file('file')); // Baca file Excel
        $rows = $data[0]; // Ambil sheet pertama
        $duplicates = []; // Array untuk menyimpan data yang duplikat

        foreach ($rows as $key => $row) {
            if ($key == 0) continue; // Skip header

            // Bersihkan spasi berlebih dari setiap kolom
            $name = preg_replace('/\s+/', ' ', trim($row[1]));
            $price = preg_replace('/\s+/', ' ', trim($row[1]));
            $quantity = preg_replace('/\s+/', ' ', trim($row[2]));

            // Periksa apakah seluruh baris sudah ada di database
            $exists = DB::table('products')->where([
                ['name', '=', $name],
                ['price', '=', $price],
                ['quantity', '=', $quantity],
            ])->exists();

            if ($exists) {
                // Simpan seluruh baris sebagai duplikat
                $duplicates[] = [
                    'name' => $name,
                    'price' => $price,
                    'quantity' => $quantity,
                ];
            } else {
                // Masukkan data ke database jika tidak duplikat
                DB::table('products')->insert([
                    'name'     => $name,
                    'price'    => $price,
                    'quantity' => $quantity,
                ]);
            }
        }

        // Kirim data duplikat ke view
        return back()->with([
            'success' => 'Data berhasil diimpor!',
            'duplicates' => $duplicates, // Kirim baris-baris duplikat
        ]);
    }
}
