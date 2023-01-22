<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $fillable =[
        'answer_id' , 'question_id'
    ];
}
