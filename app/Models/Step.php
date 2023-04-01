<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [
        'name', 'img', 'description', 'index' , 'group_id'
    ];

    public function group()
    {
        return $this->belongsTo('App\SGroup','group_id','id');
    }

    public function questions()
    {
        return $this->hasMany('App\Question','step_id','id');
    }
}


