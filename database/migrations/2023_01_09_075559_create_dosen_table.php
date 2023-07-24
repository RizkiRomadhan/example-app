<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dosen', function (Blueprint $table) {
            $table->string('nidn')->primary();
            $table->string('nama_dosen', 70);
            $table->string('id_user', 70);
            $table->string('id_jurusan')->nullable();
            $table->foreign('id_jurusan')->references('id_jurusan')->on('tbl_jurusan')->onDelete('set null');
            $table->string('email', 70);
            $table->string('nomor_ponsel', 70);
            $table->string('status', 70);
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
        Schema::dropIfExists('dosen');
    }
}
