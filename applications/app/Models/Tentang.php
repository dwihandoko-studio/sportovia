<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = 'amd_tentang';

    protected $fillable = ['deskripsi_tentang','visi','misi'];

    
}
