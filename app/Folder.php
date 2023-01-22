<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $table = 'folder_explorer';
    protected $fillable = ['name'];
    public function file()
    {
        return $this->hasMany('App\File');
    }

    public function folder()
    {
        return $this->hasMany('App\Folder', 'parent_id');
    }
}