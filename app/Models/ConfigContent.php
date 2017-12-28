<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigContent extends Model
{
    protected $table = 'amd_config_content';

    protected $fillable = ['content', 'descrip'];
}
