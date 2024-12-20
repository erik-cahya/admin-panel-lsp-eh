<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_asesor');
            $table->string('no_reg');
            $table->string('no_npwp')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('alamat')->nullable();
            $table->text('foto_asesor')->nullable();
            $table->text('gambar_tanda_tangan')->nullable();
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
        Schema::dropIfExists('asesor');
    }
}
