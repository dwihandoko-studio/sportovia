<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{

    protected $table = 'amd_trial';

    protected $fillable = ['id_kelas_kategori','id_kelas','telp','email','subjek','pesan','flag_status'];

    
}
