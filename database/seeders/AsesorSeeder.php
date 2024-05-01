<?php

namespace Database\Seeders;

use App\Models\AsesorModel;
use Illuminate\Database\Seeder;

class AsesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataAsesor = [
            [
                'nama_asesor' => 'Alit Aditya Angga Widiarsah',
                'no_reg' => 'MET.000.005572 2018',
                'no_telp' => '083162983008',
                'alamat' => 'Jalan Padang Galak No.24, Kesiman, Petilan, Denpasar Timur'
            ],
            [
                'nama_asesor' => 'Anton Kurniawan',
                'no_reg' => 'MET.000.005575 2018',
                'no_telp' => '081805473893',
                'alamat' => 'Jalan Fajar Utama No. 2, Singaraja'
            ],
            [
                'nama_asesor' => 'I Dewa Made Yudiarta',
                'no_reg' => 'MET.000.000877 2020',
                'no_telp' => '08123867939',
                'alamat' => 'Jalan Sangkalangit III No.11, Tembau Ten, Penatih, Denpasar Timur'
            ],
            [
                'nama_asesor' => 'I Gede Sumerta',
                'no_reg' => 'MET.000.009823 2018',
                'no_telp' => '081238491839',
                'alamat' => 'Dusun Dangin Tukadaya - No.-RT.-RW.-Dangin Tukadaya, Jembrana, Jembrana Bali'
            ],
            [
                'nama_asesor' => 'I Gede Swastika',
                'no_reg' => 'MET.000.005573 2018',
                'no_telp' => '08113887087',
                'alamat' => 'Jalan Tukad Buana 2 Br. Gunung Sari No.46, Padangsambian Kaja, Denpasar Barat'
            ],
            [
                'nama_asesor' => 'I Gusti Agung Putu Prawira Deasy Suharta',
                'no_reg' => 'MET.000.000882 2020',
                'no_telp' => '087862575235',
                'alamat' => 'Jalan Taman Baruna I Gang 2 No.109, Jimbaran, Kuta Selatan, Badung'
            ],
            [
                'nama_asesor' => 'I Gusti Made Sutama Arsa',
                'no_reg' => 'MET. 000.001817.2018',
                'no_telp' => '081916394411',
                'alamat' => 'Br. Padang, Punggul, Abiansemal, Badung'
            ],
            [
                'nama_asesor' => 'I Komang Sutarmika',
                'no_reg' => 'MET.000.005577 2018',
                'no_telp' => '08124688625',
                'alamat' => 'Br. Tegeh, Perumahan Turus Lumbung Lestari I A No. 3, Dalung, Kuta Utara, Badung'
            ],
            [
                'nama_asesor' => 'I Made Arta',
                'no_reg' => 'MET.000.005574 2018',
                'no_telp' => '081244368013',
                'alamat' => 'Perumahan Gedong Mekar Tunjung No. 9, Jalan Mekar, Kepaon Indah, Pemogan, Denpasar'
            ],
            [
                'nama_asesor' => 'I Made Juni Suaryana',
                'no_reg' => 'MET.000.005576 2018',
                'no_telp' => '081238942696',
                'alamat' => 'Jalan Nangka Gang Turi No. 31B, Lingkungan Karang Sari RT 0, Tuban, Kuta, Badung'
            ],
            [
                'nama_asesor' => 'I Nengah Jati',
                'no_reg' => 'MET.000.010638 2016',
                'no_telp' => '0811392667',
                'alamat' => 'Br. Tanahampo, Ulakan, Manggis, Karangasem'
            ],
            [
                'nama_asesor' => 'I Putu Angga Sukma Primantara',
                'no_reg' => 'MET.000.005590 2018',
                'no_telp' => '082236353635',
                'alamat' => 'Jalan Gunung Mas Gang Wilis No.9, Padangsambian, Denpasar Barat'
            ],
            [
                'nama_asesor' => 'I Wayan Mudiarta',
                'no_reg' => 'MET.000.000880 2020',
                'no_telp' => '081239390645',
                'alamat' => 'Banjar Gumasih Mambal Kajanan Mambal, Abiansemal. Badung'
            ],
            [
                'nama_asesor' => 'I Wayan Widiyasa',
                'no_reg' => 'MET.000.000878 2020',
                'no_telp' => '081239619209',
                'alamat' => 'Br. Dinas Tegallinggah Kaja, Penebel, Tabanan'
            ],
            [
                'nama_asesor' => 'Ribut Ponco Purnomo',
                'no_reg' => 'MET.000.000879 2020',
                'no_telp' => '081919911983',
                'alamat' => 'Jalan Taman Baruna II No.22, Jimbaran, Kuta Selatan, Badung'
            ],
            [
                'nama_asesor' => 'I Gusti Agung Wahyu Paranagita',
                'no_reg' => 'MET.000.005578 2018',
                'no_telp' => null,
                'alamat' => null,
            ],
            [
                'nama_asesor' => 'Ida Bagus Gde Widiantara, S.T., M.T.',
                'no_reg' => 'MET.000.006969 2021',
                'no_telp' => null,
                'alamat' => null,
            ]
        ];

        foreach ($dataAsesor as $row) {
            AsesorModel::create($row);
        }
    }
}
