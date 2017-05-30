<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{

    protected $table = 'amd_news_event';

    protected $fillable = ['news_event','judul','deskripsi','img_banner','img_banner_alt','img_thumb',
                            'img_thumb_alt','tanggal_event','tanggal_publish','slug','flag_publish','actor'];


}
