<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'amd_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_member','name', 'email', 'password', 'avatar', 'confirmed','confirmation_code','role_id','login_count'
      ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
  	{
  		return $this->belongsTo('App\Models\Role');
  	}

    public function member()
    {
      return $this->belongsTo('App\Models\Member', 'id_member');
    }
}
