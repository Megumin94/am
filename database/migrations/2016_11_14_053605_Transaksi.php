<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_Am')->unsigned();
            $table->integer('id_Pelanggan')->unsigned();
            $table->integer('id_Layanan')->unsigned();
            $table->date('tgl_Kfs')->nullable();
            $table->date('tgl_Baso')->nullable();
            $table->date('tgl_Kontrak')->nullable();
            $table->string('status_Projek', 15);
            $table->string('nilai', 9);
            $table->foreign('id_Pelanggan')->references('id')->on('pelanggan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_Layanan')->references('id')->on('layanan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_Am')->references('id')->on('AMS')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
