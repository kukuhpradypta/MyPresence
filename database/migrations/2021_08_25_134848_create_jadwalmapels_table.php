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
            $table->string('namaguru');
            $table->string('namakelas');
            $table->date('tanggalmapel');
            $table->time('jampelajaran');
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
