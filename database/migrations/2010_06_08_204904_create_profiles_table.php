<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kartu_keluarga_id');
            $table->foreign('kartu_keluarga_id')->references('id')->on('kartu_keluarga')->nullOnDelete();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->enum('jk',['Laki-Laki','Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('pendidikan')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('status_perkawinan');
            $table->string('status_hubungan_dalam_keluarga')->nullable();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
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
        Schema::dropIfExists('profiles');
    }
}
