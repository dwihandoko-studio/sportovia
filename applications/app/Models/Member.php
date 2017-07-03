<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'amd_member';

    protected $fillable = ['anak_member','kode_member','email','nama_member','img_member','tempat_lahir','tanggal_lahir',
                            'tanggal_gabung','alamat','flag_status','aktor'];


    public function user()
    {
      return $this->hasOne('App\Models\User');
    }
}
