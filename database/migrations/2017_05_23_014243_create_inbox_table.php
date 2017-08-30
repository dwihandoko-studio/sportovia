<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_inbox', function(Blueprint $table){
          $table->increments('id');
          $table->string('nama');
          $table->string('telp');
          $table->string('email');
          $table->string('subjek');
          $table->text('pesan');
          $table->integer('has_read')->unsigned()->default(0);
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
