<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_surat');
            $table->string('nomor_surat');
            $table->string('nama_asesor');
            $table->string('no_reg');
            $table->string('nama_tuk');
            $table->text('alamat_tuk');
            $table->string('tanggal_uji');
            $table->string('tanggal_surat');
            $table->string('skema');
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
        Schema::dropIfExists('surat_tugas');
    }
}
