<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldDokumenToJadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amd_jadwal', function(Blueprint $table){
          $table->string('dokumen_rapot')->nullable()->after('jam_akhir');
        });

        Schema::table('amd_member', function(Blueprint $table){
          $table->dropColumn('dokumen_rapot');
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
