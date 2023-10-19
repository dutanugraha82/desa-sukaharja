<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPenghasilanOrtuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_penghasilan_ortu', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('ttl');
            $table->string('agama');
            $table->string('jk');
            $table->string('pekerjaan');
            $table->string('nik');
            $table->string('kewarganegaraan');
            $table->string('penghasilan');
            $table->string('ejaan_penghasilan');
            $table->string('anggota');
            $table->string('ejaan_anggota');
            $table->text('alamat');
            $table->string('nama_anak');
            $table->string('ttl_anak');
            $table->string('jk_anak');
            $table->string('pekerjaan_anak');
            $table->string('nik_anak');
            $table->text('alamat_anak');

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
        Schema::dropIfExists('surat_penghasilan_ortu');
    }
}
