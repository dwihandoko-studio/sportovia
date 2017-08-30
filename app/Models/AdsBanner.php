<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdsBanner extends Model
{
    protected $table = 'amd_ads_banner';

    protected $fillable = ['ads_judul','img_url','img_alt','tanggal_publish','actor','flag_publish'];
}
