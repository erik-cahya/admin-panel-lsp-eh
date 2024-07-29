<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuk', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('tuk_nama');
            $table->text('tuk_alamat')->nullable();
            $table->string('tuk_namaCP')->nullable();
            $table->string('tuk_kontakCP')->nullable();
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
        Schema::dropIfExists('tuk');
    }
}
