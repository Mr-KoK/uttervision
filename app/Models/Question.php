<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title' , 'text' , 'icon' , 'index' , 'parent_id' , 'step_id' , 'group_answers'
    ];
    /**
     * @var mixed
     */


    public function step()
    {
        return $this->belongsTo('App\Step','step_id','id');
    }

    public function group_answers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
       return $this->hasMany('App\AnswerGroup','question_id','id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Question');
    }

    public function answers()
    {
        return $this->belongsToMany('App\Answer','question_answers','question_id','answer_id');
    }

}
