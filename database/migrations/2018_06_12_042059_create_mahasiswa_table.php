<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname')->comment('Nama lengkap mahasiswa');
            $table->string('email')->unique()->comment('Alamat email mahasiswa');
            $table->string('major')->comment('Jurusan kuliah');
            $table->string('address')->comment('Alamat mahasiswa');
            $table->date('birth')->comment('Tanggal lahir mahasiswa');
            $table->enum('gender', ['male', 'female'])->default('male')->comment('Jenis kelamin mahasiswa');
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
