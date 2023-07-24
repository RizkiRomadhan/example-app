<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('nama_mahasiswa', 70);
            $table->foreignId('user_id')->constrained();
            $table->string('id_jurusan')->nullable();
            $table->foreign('id_jurusan')->references('id_jurusan')->on('tbl_jurusan')->onDelete('set null');
            $table->string('id_prodi')->nullable();
            $table->foreign('id_prodi')->references('id_prodi')->on('tbl_prodi')->onDelete('set null');
            $table->string('nidn_dosen1')->nullable();
            $table->foreign('nidn_dosen1')->references('nidn')->on('tbl_dosen')->onDelete('set null');
            $table->string('nidn_dosen2')->nullable();
            $table->foreign('nidn_dosen2')->references('nidn')->on('tbl_dosen')->onDelete('set null');
            $table->string('nidn_penguji1')->nullable();
            $table->foreign('nidn_penguji1')->references('nidn')->on('tbl_dosen')->onDelete('set null');
            $table->string('nidn_penguji2')->nullable();
            $table->foreign('nidn_penguji2')->references('nidn')->on('tbl_dosen')->onDelete('set null');
            $table->string('email', 70)->nullable();
            $table->string('nomor_ponsel', 70)->nullable();
            $table->string('status', 70)->nullable();
            $table->string('judul', 255)->nullable();
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
        Schema::dropIfExists('mahasiswa');
    }
}
