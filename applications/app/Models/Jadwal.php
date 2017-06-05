<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'amd_jadwal';

    protected $fillable = ['id_member','id_kelas','id_kelas_ruang','hari','jam','flag_status','aktor'];
}
