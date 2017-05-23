<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasKategori extends Model
{

    protected $table = 'amd_kelas_kategori';

    protected $fillable = ['kategori_kelas','quotes_kategori','deskripsi_kategori','img_banner','img_banner_alt',
                          'img_thumb','img_thumb_alt','slug','flag_publish','actor'];

                          
}
