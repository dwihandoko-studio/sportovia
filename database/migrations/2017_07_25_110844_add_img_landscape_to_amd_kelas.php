<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgLandscapeToAmdKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('amd_kelas', function(Blueprint $table){
        $table->string('img_url_landscape')->after('deskripsi_kelas');
        $table->string('img_alt_landscape')->after('img_url_landscape');
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
