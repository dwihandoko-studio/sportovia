<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SosialMedia extends Model
{

    protected $table = 'amd_sosial_media';

    protected $fillable = ['nama_sosmed','link_url','flag_publish','actor'];


}
