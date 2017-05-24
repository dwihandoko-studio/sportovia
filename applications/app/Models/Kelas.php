<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{

    protected $table = 'amd_kelas';

    protected $fillable = ['id_kelas_kategori','id_program','nama_kelas','deskripsi_kelas','img_url',
                            'img_alt','fasilitas','video_url','slug','flag_publish','actor'];
                            
}