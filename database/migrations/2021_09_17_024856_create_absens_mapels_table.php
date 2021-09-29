<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens_mapels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa');
            $table->string('kelas');
            $table->foreignId('mapel');
            $table->enum('absen', ['hadir', 'izin', 'alpa'])->default('alpa');
            $table->string('keterangan')->nullable();
            $table->date('tanggal');
            $table->date('bulan');
            $table->date('tahun');
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
        Schema::dropIfExists('absens_mapels');
    }
}
