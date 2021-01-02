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
            $table->text('foto')->nullable();
            $table->text('foto_utama');
            $table->string('nama_produk');
            $table->string('slug');
            $table->string('visitor')->default(0);
            $table->string('kategori')->nullable();
            $table->string('berat_barang')->nullable();
            $table->string('berat_volume')->nullable();
            $table->string('diameter_luar')->nullable();
            $table->string('diameter_dalam')->nullable();
            $table->string('panjang_tali')->nullable();
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
