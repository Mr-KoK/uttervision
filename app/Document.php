<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = "documents";

    protected $fillable = [
        'name', 'form_id', 'file', 'status'
    ];

    public function form(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Form', 'form_id', 'id');
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0 :
                return 'No File';
            case 1:
                return 'Pending';
            case 2:
                return 'Approve';
            case 3:
                return 'Reject';
            case 4:
                return 'Review';
        }
    }

    public function getFileName()
    {
        return $this->src ? pathinfo($this->src, PATHINFO_FILENAME) : '';
    }
}
