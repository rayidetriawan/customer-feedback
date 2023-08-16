<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->string('reported');
            $table->string('id_kategori');
            $table->string('id_kondisi');
            $table->string('id_teknisi');
            $table->string('subjek_masalah');
            $table->string('deskripsi_masalah');
            $table->string('foto');
            $table->string('file');
            $table->string('status');
            $table->string('progress');
            $table->date('tgl_proses');
            $table->date('tgl_solved')->nullable();
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
        Schema::dropIfExists('tikets');
    }
}
