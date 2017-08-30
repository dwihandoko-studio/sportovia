<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasGaleri extends Model
{
    protected $table = 'amd_kelas_galeri';

    protected $fillable = ['id_kelas', 'img_url', 'img_alt'];

    public function kelas()
    {
      return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }
}
