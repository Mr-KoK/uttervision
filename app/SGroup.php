<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SGroup extends Model
{
    protected $fillable = [
        'name' , 'description'
    ];

    public function steps()
    {
        return $this->hasMany('App\Step','group_id','id');
    }

    public function documents()
    {
        return $this->hasMany('App\StepGroupDocument','step_group_id','id');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function isEmpty(){
        if(count($this->steps )==0){
            return true;
        }
        $empty = true;
        foreach ($this->steps as $step){
            if(count($step->questions) > 0){
                $empty = false;
            }
        }
        return $empty;
    }
}
