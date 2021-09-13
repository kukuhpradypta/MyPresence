<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalmapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalmapels', function (Blueprint $table) {
            $table->id();
            $table->string('namamapel');
            $table->string('namaguru_id');
            $table->string('kelas_id');
            $table->string('hari');
            $table->time('jammasuk');
            $table->time('jamkeluar');
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
        Schema::dropIfExists('jadwalmapels');
    }
}
