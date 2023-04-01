<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Partner extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'name', 'password', 'img', 'phone_number'
    ];

    protected $guard = "partner";


    protected $hidden = [
        'remember_token', 'password',
    ];

    public function countries()
    {
        return $this->belongsToMany('App\Country', 'partners_country', 'parent_id', 'country_id');
    }
}
