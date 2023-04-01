<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file_explorer';
    protected $fillable = ['img'];
    public function folder()
    {
        return $this->belongsTo('App\Folder');
    }
}