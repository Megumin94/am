<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_Am', 50);
            $table->string('no_Hp_Am', 13);
            $table->string('email', 50);
            $table->string('status', 9);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ams');
    }
}
