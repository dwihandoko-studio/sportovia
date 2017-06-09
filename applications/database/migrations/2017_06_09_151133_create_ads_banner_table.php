<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_ads_banner', function(Blueprint $table){
          $table->increments('id');
          $table->string('ads_judul');
          $table->string('img_url')->nullable();
          $table->string('img_alt');
          $table->date('tanggal_publish');
          $table->integer('actor')->unsigned();
          $table->integer('flag_publish')->unsigned();
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
