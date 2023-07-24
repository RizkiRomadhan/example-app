<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJudulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_judul', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 70)->nullable();
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->string('status', 70);
            $table->string('nidn_dosen_1')->nullable();
            $table->foreign('nidn_dosen_1')->references('nidn')->on('tbl_dosen')->onDelete('set null');
            $table->string('nidn_dosen_2')->nullable();
            $table->foreign('nidn_dosen_2')->references('nidn')->on('tbl_dosen')->onDelete('set null');
            $table->string('berkas_proposal')->nullable();
            $table->string('berkas_formdaftar')->nullable();
            $table->string('berkas_asistensi')->nullable();
            $table->string('berkas_kp')->nullable();
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
        Schema::dropIfExists('juduls');
    }
}
