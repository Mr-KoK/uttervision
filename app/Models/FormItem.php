<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormItem extends Model
{
    protected $table = 'form_items';
    protected $fillable = [
        'form_id', 'question_id', 'status', 'position'
    ];

    public function form(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Form');
    }

    public function question(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Question','question_id','id');
    }

    public function rows(){
        return $this->hasMany('App\FormItemRow','form_item_id','id');
    }

    public function haveAnswer(){
        foreach ($this->rows as $row){
            if($row->selected == '1'){
                return true;
            }
        }
        return false;
    }

    public function getStatus(){
        switch ($this->status) {
            case '0':
                return 'Pending';
            case '1':
                return 'Approve';
            case '2':
                return 'Reject';
            case '3':
                return 'Review';
            default:
                return 'Pending';
        }

    }
}
