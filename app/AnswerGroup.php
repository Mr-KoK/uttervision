<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerGroup extends Model
{
    protected $fillable = [
        'index' , 'type' , 'check_input' , 'question_id'
    ];

    public function answers(){
       return $this->hasMany('App\Answer','group_id','id');
    }

    public function form_items(){
        return $this->hasMany('App\FormItem','answer_group_id','id');
    }

    public function question(){
      return $this->belongsTo('App\Question','question_id','id');
    }
}
