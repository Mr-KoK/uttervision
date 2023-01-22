<?php
namespace App\Utility;


use App\File;

class HtmlHelper extends Utilities{
    public static function getIcons(){
        $icons = [];
        if (File::exists(public_path('xmls/icons.xml'))) {
            $xmldata = simplexml_load_file(public_path('xmls/icons.xml'));
            foreach ($xmldata as $icon){
                $icons[] = $icon;
            }
        }
        return $icons;
    }
}