<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_kelas', function(Blueprint $table){
          $table->increments('id');
          $table->integer('id_kelas_kategori')->unsigned();
          // id_program 0 -> Regular; 1 -> Children
          $table->integer('id_program')->unsigned();
          $table->string('nama_kelas');
          $table->text('deskripsi_kelas');
          $table->string('img_url');
          $table->string('img_alt');
          $table->string('fasilitas')->nullable();
          $table->string('video_url')->nullable();
          $table->string('slug');
          $table->integer('flag_publish')->unsigned()->default(1);
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
