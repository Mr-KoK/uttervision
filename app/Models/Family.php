<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        'name', 'family', 'user_id', 'same_pass', 'description',
        'relation', 'pass_id', 'status', 'img', 'birthday'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
