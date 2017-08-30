<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableAmdTrial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amd_trial', function (Blueprint $table) {
            $table->renameColumn('id_kelas_kategori', 'type');
            $table->renameColumn('id_kelas', 'id_content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('amd_trial', function (Blueprint $table) {
            $table->renameColumn('type', 'id_kelas_kategori');
            $table->renameColumn('id_content', 'id_kelas');
        });
    }
}
