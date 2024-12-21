<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('tb_kriteria', function (Blueprint $table) {
            //
            $table->id();
            $table->string('biaya_simpan');
            $table->string('biaya_pesan');
            $table->string('waktu_tunggu');
            $table->string('kebutuhan_pengaman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
