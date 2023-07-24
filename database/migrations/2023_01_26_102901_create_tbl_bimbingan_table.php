<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBimbinganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bimbingan', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi');
            $table->dateTime('waktu');
            $table->string('nidn_dosen1')->nullable();
            $table->foreign('nidn_dosen1')->references('nidn')->on('tbl_dosen')->onDelete('set null');
            $table->string('nidn_dosen2')->nullable();
            $table->foreign('nidn_dosen2')->references('nidn')->on('tbl_dosen')->onDelete('set null');
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
        Schema::dropIfExists('tbl_bimbingan');
    }
}
