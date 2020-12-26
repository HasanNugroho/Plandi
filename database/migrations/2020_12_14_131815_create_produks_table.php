<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->text('foto');
            $table->text('foto_utama');
            $table->string('nama_produk');
            $table->string('slug');
            $table->string('visitor')->nullable();
            $table->string('kategori')->nullable();
            $table->string('berat_barang');
            $table->string('berat_volume');
            $table->string('diameter_luar');
            $table->string('diameter_dalam');
            $table->string('panjang_tali');
            $table->integer('harga');
            $table->text('diskripsi');
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
        Schema::dropIfExists('produks');
    }
}
