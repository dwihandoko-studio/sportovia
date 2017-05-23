<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_kelas_kategori', function(Blueprint $table){
          $table->increments('id');
          $table->string('kategori_kelas');
          $table->string('quotes_kategori');
          $table->text('deskripsi_kategori');
          $table->string('img_banner');
          $table->string('img_banner_alt');
          $table->string('img_thumb');
          $table->string('img_thumb_alt');
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
