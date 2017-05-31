<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasProgram extends Model
{
    protected $table = 'amd_kelas_program';

    protected $fillable = ['program_kelas','quotes_program','deskripsi_program','img_banner','img_banner_alt',
                          'img_thumb','img_thumb_alt','slug','flag_publish','actor'];


    public function Kelas()
    {
      return $this->hasMany('App\Models\Kelas');
    }
}
