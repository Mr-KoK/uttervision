<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable=[
        'index' , 'text' ,'group_id'
    ];
    /**
     * @var mixed
     */

    public function group(){
       return $this->belongsTo('App\AnswerGroup','group_id','id');
    }

    public function questions(){
      return  $this->belongsToMany('App\Question','question_answers','answer_id','question_id');
    }
}
