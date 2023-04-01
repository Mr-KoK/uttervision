<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'active', 'img', 'content',
    ];
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
