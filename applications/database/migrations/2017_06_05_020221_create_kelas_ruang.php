<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasRuang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_kelas_ruang', function(Blueprint $table){
          $table->increments('id');
          $table->string('nama_kelas');
          $table->string('lantai_kelas');
          $table->string('kapasitas')->nullable();
          $table->string('link_cctv')->nullable();
          $table->integer('flag_status')->unsigned();
          $table->integer('actor')->unsigned();
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
