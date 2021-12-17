<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('verify')->nullable();
            $table->char('nim', 8)->nullable();
            $table->char('tahun', 4)->nullable();
            $table->string('prodi')->nullable();
            $table->string('name');
            $table->enum('status', ['Mahasiswa', 'Pegawai'])->nullable();
            $table->enum('level', ['Admin', 'User', 'Moderator']); 
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('nomorhp', 13)->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
