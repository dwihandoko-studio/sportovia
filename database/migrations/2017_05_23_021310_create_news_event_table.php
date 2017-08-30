<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_news_event', function(Blueprint $table){
          $table->increments('id');
          $table->string('judul')->unique();
          $table->text('deskripsi_news_event');
          $table->string('img_banner');
          $table->string('img_banner_alt');
          $table->string('img_thumb');
          $table->string('img_thumb_alt');
          $table->date('tanggal_event')->nullable();
          $table->date('tanggal_publish');
          $table->string('slug')->unique();
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
