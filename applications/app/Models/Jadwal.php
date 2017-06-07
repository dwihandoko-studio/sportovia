<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'amd_jadwal';

    protected $fillable = ['id_member','id_kelas','id_kelas_ruang','hari','jam_mulai','jam_akhir','flag_status','aktor'];

    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'id_member');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }

    public function kelasRuang()
    {
        return $this->belongsTo('App\Models\KelasRuang', 'id_kelas_ruang');
    }
}
