<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkuLuarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sku_luar', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_usaha');
            $table->integer('penghasilan');
            $table->string('tahun_berdiri');
            $table->string('nama');
            $table->string('ttl');
            $table->string('nik');
            $table->enum('jk',['LAKI-LAKI','PEREMPUAN']);
            $table->string('pekerjaan');
            $table->string('agama');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->text('alamat_usaha');
            $table->text('alamat_asal');
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
        Schema::dropIfExists('sku_luar');
    }
}
