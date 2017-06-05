<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_jadwal', function(Blueprint $table){
          $table->increments('id');
          $table->integer('id_member');
          $table->integer('id_kelas');
          $table->integer('id_kelas_ruang');
          $table->string('hari');
          $table->string('jam');
          $table->integer('flag_status')->unsigned();
          $table->integer('aktor')->unsigned();
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
        //
    }
}
