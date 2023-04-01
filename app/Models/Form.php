<?php

namespace App;

use App\Enum\RowStatus;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';
    protected $fillable = [
        'user_id', 'country_id', 'status', 'type'
    ];

    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\FormItem', 'form_id', 'id');
    }

    public function documents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Document', 'form_id', 'id');
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getQuestionPercent()
    {
        $totalItems = count($this->items);
        $haveAnswer = 0;

        foreach ($this->items as $key => $item) {
            $tempBoolean = false;

            foreach ($item->rows as $index => $row) {
                if ($row->selected == '1') {
                    $tempBoolean = true;
                }
            }
            if ($tempBoolean) {
                $haveAnswer++;
            }
        }
//        dd($haveAnswer);
        return (round($haveAnswer / $totalItems, 2)) * 100;
    }

    public function getCountQuestionAnswered(){
        $haveAnswer = 0;

        foreach ($this->items as $key => $item) {
            $tempBoolean = false;

            foreach ($item->rows as $index => $row) {
                if ($row->selected == '1') {
                    $tempBoolean = true;
                }
            }
            if ($tempBoolean) {
                $haveAnswer++;
            }
        }

        return $haveAnswer;
    }

    public function getDocumentPercent()
    {
        $totalDocs = count($this->documents) == 0 ? '1' : count($this->documents);
        $uploaded = 0;
        foreach ($this->documents as $key => $doc) {
            if (isset($doc->src)) {
                $uploaded++;
            }
        }
        return ($uploaded/$totalDocs)*100;
    }

    public function getCountDocumentUploaded(){
        $uploaded = 0;
        foreach ($this->documents as $key => $doc) {
            if (isset($doc->src)) {
                $uploaded++;
            }
        }
        return $uploaded;
    }

    public function getReviewPercent()
    {
        $totalItems = count($this->items) != 0 ? count($this->items) : 1;
        $Review = 0;

        foreach ($this->items as $key => $item) {
            $tempBoolean = false;
            foreach ($item->rows as $index => $row) {
                if ($row->status == RowStatus::Review) {
                    $tempBoolean = true;
                }
            }
            if ($tempBoolean) {
                $Review++;
            }
        }

        return (round($Review / $totalItems, 2)) * 100;
    }

    public function getUserApplicantUrl()
    {
        return url('/member/application/'.$this->id);
    }

    public function getTotalFormCompliment(){
        return  round(( self::getReviewPercent() + self::getDocumentPercent() + self::getQuestionPercent() ) / 3,0);
    }

    function getStatus(){
        switch ($this->status){
            case '0':
                return 'inProcess';
            case '1':
                return 'Done';
            case '2':
                return 'stop';
        }
    }

    function getType(){
        switch ($this->type){
            case '0':
                return 'Student Visa';
            case '1':
                return 'Visitor Visa';
            case '2':
                return 'Job Offer';
        }
    }

}
