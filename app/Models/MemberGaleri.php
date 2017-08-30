<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberGaleri extends Model
{
    protected $table = 'amd_member_galeri';

    protected $fillable = ['id_member','id_jadwal', 'img_url', 'img_alt'];

    public function member()
    {
      return $this->belongsTo('App\Models\Member', 'id_member');
    }

    public function jadwal()
    {
      return $this->belongsTo('App\Models\Jadwal', 'id_jadwal');
    }
}
