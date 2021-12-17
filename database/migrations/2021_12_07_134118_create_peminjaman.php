<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('level', ['Mahasiswa', 'Pegawai']);
            $table->char('no_induk', 13);
            $table->string('prodi');
            $table->char('nohp', 13);
            $table->foreignId('ruang_id')->nullable();
            $table->foreignId('barang_id')->nullable();
            $table->foreignId('jadwal_id')->nullable();
            $table->string('kegiatan');
            $table->date('tgl_kegiatan');
            $table->integer('sts_pinjam')->nullable();
            $table->integer('peserta');
            $table->string('path_file');
            $table->string('namefile');
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
        Schema::dropIfExists('peminjaman');
    }
}
