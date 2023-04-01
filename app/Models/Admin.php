<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = "admin";

    protected $fillable = [
        'email', 'password', 'name', 'img' ,'role' ,'phone_number', 'last_seen'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function service()
    {
        return $this->hasMany('App\Service');
    }
    public function country()
    {
        return $this->hasMany('App\Country');
    }
}