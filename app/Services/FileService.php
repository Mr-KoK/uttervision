<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Exception;

class FileService extends Service{

    public static function saveFile($path,$name,$file){
        dd('fuckkkkk');
        try {
            Storage::disk($path)->put($name,$file);
            return Storage::disk($path)->url($name);
        }catch (Exception $exception){
            throw new Exception($exception);
        }
    }

}