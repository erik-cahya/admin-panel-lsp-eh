<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_asesi');
            $table->bigInteger('nik');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L')->comment('L for Laki-laki, P for Perempuan');
            $table->string('tempat_tinggal');
            $table->string('kode_kabupaten');
            $table->string('kode_provinsi');
            $table->string('telp');
            $table->string('email');
            $table->string('kode_pendidikan');
            $table->string('kode_pekerjaan');
            $table->string('kode_jadwal');
            $table->string('tanggal_uji');
            $table->string('nomor_registrasi_asesor');
            $table->string('kode_sumber_anggaran');
            $table->string('kode_kementrian');
            $table->enum('status_kompeten', ['K', 'BK'])->default('K')->comment('K/BK');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asesi');
    }
}
