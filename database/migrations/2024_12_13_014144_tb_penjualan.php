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
        Schema::create('tb_penjualan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_barang');
            $table->string('nama_barang');
            $table->string('harga_barang');
            $table->string('qty');
            $table->string('total_bayar');
            
          
            $table->rememberToken();
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
        //
    }
};
