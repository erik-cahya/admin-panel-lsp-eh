<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManajemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manajemen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_manajemen');
            $table->string('no_telp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jabatan')->nullable();
            $table->text('foto_manajemen')->nullable();
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
        Schema::dropIfExists('manajemen');
    }
}
