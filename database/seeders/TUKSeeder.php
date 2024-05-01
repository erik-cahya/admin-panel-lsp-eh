<?php

namespace Database\Seeders;

use App\Models\TUKModel;
use Illuminate\Database\Seeder;

class TUKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataTUK = [
            [
                'tuk_nama' => 'Ayana Resort and Spa Bali',
                'tuk_alamat' => 'Jalan Karang Mas Sejahtera, Jimbaran, Bali, Indonesia',
                'tuk_namaCP' => null,
                'tuk_kontakCP' => null
            ],
            [
                'tuk_nama' => 'Renaissance Bali Nusa Dua Resort',
                'tuk_alamat' => 'Kawasan Pariwisata Lot SW 4-5,Nusa Dua, Bali',
                'tuk_namaCP' => null,
                'tuk_kontakCP' => null
            ],
            [
                'tuk_nama' => 'Mövenpick Resort & Spa Jimbaran Bali',
                'tuk_alamat' => 'Jalan Wanagiri No.1, Jimbaran, Kec. Kuta Selalatan, Bali',
                'tuk_namaCP' => null,
                'tuk_kontakCP' => null
            ],
            [
                'tuk_nama' => 'Sekretariat ACE Bali',
                'tuk_alamat' => 'Gedung Politeknik Negeri Bali, Jalan Raya Kampus Unud, Jimbaran, Kuta Selatan, Badung, Bali',
                'tuk_namaCP' => 'Yudi Sanjaya',
                'tuk_kontakCP' => '085739944505'
            ],
            [
                'tuk_nama' => 'Swiss-Belexpress Kuta Legian',
                'tuk_alamat' => 'Jl. Legian Gg. Troppozone, Lingkungan Pelasa, Kuta, Kec. Kuta, Kabupaten Badung, Bali',
                'tuk_namaCP' => null,
                'tuk_kontakCP' => null
            ],
            [
                'tuk_nama' => 'Swiss-Belhotel Tuban',
                'tuk_alamat' => 'Jl. Kubu Anyar No.31, Tuban, Kec. Kuta, Kabupaten Badung, Bali',
                'tuk_namaCP' => null,
                'tuk_kontakCP' => null
            ],
        ];

        foreach ($dataTUK as $row) {
            TUKModel::create($row);
        }
    }
}
