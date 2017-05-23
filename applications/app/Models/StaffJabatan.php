<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffJabatan extends Model
{

    protected $table = 'amd_staff_jabatan';

    protected $fillable = ['nama_jabatan','flag_publish','actor'];

    public function staff()
    {
        return $this->hasMany('App\Models\Staff');
    }
}
