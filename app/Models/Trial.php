<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{

    protected $table = 'amd_trial';

    protected $fillable = ['type','id_content','nama','telp','email','subjek','pesan','flag_status'];


    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_content');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\NewsEvent', 'id_content');
    }
}
