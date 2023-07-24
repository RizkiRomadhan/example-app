<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_prodi', function (Blueprint $table) {
            $table->string('id_prodi')->primary();
            $table->string('id_jurusan')->nullable();
            $table->foreign('id_jurusan')->references('id_jurusan')->on('tbl_jurusan')->onDelete('set null');
            $table->string('nama_prodi', 70);
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
        Schema::dropIfExists('tbl_prodi');
    }
}
