<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa');
            $table->string('kelas');
            $table->enum('absen', ['hadir', 'izin', 'alpa'])->default('alpa');
            $table->string('keterangan')->nullable();
            $table->string('hari');
            $table->string('tanggal');
            $table->string('bulan');
            $table->string('tahun');
            $table->time('jam_masuk');
            $table->time('jam_pulang')->nullable();
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
        Schema::dropIfExists('absensis');
    }
}
