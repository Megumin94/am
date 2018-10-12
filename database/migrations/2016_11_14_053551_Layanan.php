<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Layanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_Produk', 50);
            $table->string('daerah_Instalasi', 50);
            $table->string('satuan_Quantity', 5);
            $table->integer('nominal_Harga', false, true)->length(10);
            $table->string('payterm', 9);
            $table->integer('abonemen', false, true)->length(10)->nullable();
            $table->date('akhir_Kontrak');
            $table->integer('biaya', false, true)->length(10);
            $table->string('mitra', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layanan');
    }
}
