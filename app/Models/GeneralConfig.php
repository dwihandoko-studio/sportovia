<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralConfig extends Model
{
    protected $table = 'amd_general_config';

    protected $fillable = ['email_to', 'email_cc'];

    
}
