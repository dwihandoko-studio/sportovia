<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_member_galeri', function(Blueprint $table){
          $table->increments('id');
          $table->integer('id_member')->unsigned();
          $table->integer('id_jadwal')->unsigned()->nullable();
          $table->string('img_url');
          $table->string('img_alt');
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
