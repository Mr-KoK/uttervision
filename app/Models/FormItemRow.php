<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormItemRow extends Model
{
    protected $table = 'form_item_rows';
    protected $fillable = [
        'form_item_id', 'answer_id','selected', 'value', 'status'
    ];

    public function item()
    {
        return $this->belongsTo('App\FormItem','form_item_id','id');
    }

    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }
}
