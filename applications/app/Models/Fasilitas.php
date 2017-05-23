<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{

    protected $table = 'amd_fasilitas';

    protected $fillable = ['nama_fasilitas','flag_publish','actor'];
    
}
