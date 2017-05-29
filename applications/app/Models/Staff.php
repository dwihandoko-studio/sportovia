<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'amd_staff';

    protected $fillable = ['nama_staff','id_jabatan','quotes_staff','avatar','avatar_alt','flag_publish','actor'];


    public function jabatan()
    {
        return $this->belongsTo('App\Models\StaffJabatan');
    }
}
