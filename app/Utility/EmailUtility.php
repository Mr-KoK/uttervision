<?php

namespace App\Utility;

use App\Mail\ReportToDevelopers;
use Exception;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;
use phpDocumentor\Reflection\PseudoTypes\HtmlEscapedString;
use PhpParser\Node\Scalar\String_;

class EmailUtility extends Utilities {
    public static function sendEmailTo($destinations ,$subject, $body){
        try {
            if(is_array($destinations)) {
                foreach ($destinations as $person) {
                    Mail::to($person)->send(new ReportToDevelopers($body, $subject));
                    return $person;
                }
            }
        }catch (Exception $exception){
            throw new Exception($exception);
        }
    }
}