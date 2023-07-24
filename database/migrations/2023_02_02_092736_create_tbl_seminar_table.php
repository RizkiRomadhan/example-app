<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSeminarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_seminar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa');
            $table->string('nidn_dosen1')->nullable();
            $table->foreign('nidn_dosen1')->references('nidn')->on('tbl_dosen')->onDelete('set null');
            $table->string('nidn_dosen2')->nullable();
            $table->foreign('nidn_dosen2')->references('nidn')->on('tbl_dosen')->onDelete('set null');
            $table->string('nidn_penguji1')->nullable();
            $table->foreign('nidn_penguji1')->references('nidn')->on('tbl_dosen')->onDelete('set null');
            $table->string('nidn_penguji2')->nullable();
            $table->foreign('nidn_penguji2')->references('nidn')->on('tbl_dosen')->onDelete('set null');
            $table->string('waktu');
            $table->string('ruangan');
            $table->string('status');
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
        Schema::dropIfExists('tbl_seminar');
    }
}
