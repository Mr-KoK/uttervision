<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepGroupDocument extends Model
{
    protected $fillable = [
        'name', 'step_group_id'
    ];

    public function step_group()
    {
        return $this->belongsTo('App\SGroup','step_group_id','id');
    }
}
