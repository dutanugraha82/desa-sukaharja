<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKtmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ktm', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->nullOnDelete();
            $table->string('nama_ortu');
            $table->string('ttl_ortu');
            $table->string('jk_ortu');
            $table->string('nik');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->longText('alamat');
            $table->string('nama_anak');
            $table->string('ttl_anak');
            $table->string('jk_anak');
            $table->string('sekolah');
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
        Schema::dropIfExists('ktm');
    }
}
