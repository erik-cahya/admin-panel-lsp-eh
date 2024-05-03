<?php

namespace Database\Seeders;

use App\Models\SkemaModel;
use Illuminate\Database\Seeder;

class SkemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSkema = [
            [
                'nama_skema' => 'Mekanik Heating, Ventilation dan Air Condition (HVAC)',
            ],
            [
                'nama_skema' => 'Pelaksanaan Instalasi AC',
            ],
            [
                'nama_skema' => 'Perawatan Mesin Pendingin / AC',
            ],
            [
                'nama_skema' => 'Teknisi Lemari Pendingin',
            ],
            [
                'nama_skema' => 'Teknisi Refrigerasi Domestik',
            ],
        ];

        foreach ($dataSkema as $row) {
            SkemaModel::create($row);
        }
    }
}
