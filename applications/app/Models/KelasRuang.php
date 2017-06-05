<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasRuang extends Model
{
    protected $table = 'amd_kelas_ruang';

    protected $fillable = ['nama_kelas','lantai_kelas','kapasitas','link_cctv','flag_publish','actor'];


}
