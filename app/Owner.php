<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Owner extends Authenticatable
{
    use Notifiable;

    protected $guard = 'owner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'city', 'address','open_from','open_to'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function menus()
    {
        return $this->hasMany('App\Menu');
    }

    public function days()
    {
        return $this->hasMany('App\Day');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function reserves()
    {
        return $this->hasMany('App\Reserve');
    }

    public function layouts()
    {
        return $this->hasOne('App\Layout');
    }
}
