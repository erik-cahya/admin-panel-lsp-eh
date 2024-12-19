<?php

use App\Models\TUKModel;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('gettuk', function (){
    $data = TUKModel::get();
    $this->info($data); // Menampilkan data ke terminal
});


Artisan::command('delete-table {nama_table}', function ($nama_table) {
    $nama_table = preg_replace('/[^a-zA-Z0-9_]/', '', $nama_table);
    DB::table('migrations')->where('migration', 'LIKE', "%{$nama_table}%")->delete();

    DB::statement("DROP TABLE IF EXISTS `{$nama_table}`");

    $this->info("Tabel '{$nama_table}' berhasil dihapus!");
})->describe('Hapus tabel dan data terkait dari database');
