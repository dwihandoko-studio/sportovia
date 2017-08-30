<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_trial', function(Blueprint $table){
          $table->increments('id');
          $table->integer('id_kelas_kategori')->unsigned();
          $table->integer('id_kelas');
          $table->string('telp', 25);
          $table->string('email');
          $table->string('subjek');
          $table->text('pesan');
          // flag_status: 1->masih trial; 0->jadi member;
          $table->integer('flag_status')->unsigned()->default(1);
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
