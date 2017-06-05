<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_member', function(Blueprint $table){
          $table->increments('id');
          $table->integer('anak_member')->unsigned()->nullable();
          $table->string('kode_member');
          $table->string('email')->unique()->nullable();
          $table->string('nama_member');
          $table->string('tempat_lahir');
          $table->date('tanggal_lahir');
          $table->date('tanggal_gabung');
          $table->text('alamat');
          $table->string('dokumen_rapot');
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
