<?php

namespace App\Utility;


use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Crap4j;

class CodingUtility extends Utilities
{

    public static function decrypt($string, $key) {
        $result = '';
        $string = base64_decode($string);
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key))-1, 1);
            $char = chr(ord($char)-ord($keychar));
            $result.=$char;
        }
        return $result;
    }

    public static function encrypt($string, $key) {
        $result = '';
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key))-1, 1);
            $char = chr(ord($char)+ord($keychar));
            $result.=$char;
        }
        return base64_encode($result);
    }

    public static function decryptID($encrypted)
    {
        return Crypt::decryptString($encrypted);
    }

    public static function encode($id)
    {


        $id_str = (string)$id;
        $offset = rand(0, 9);
        $encoded = chr(79 + $offset);
        for ($i = 0, $len = strlen($id_str); $i < $len; ++$i) {
            $encoded .= chr(65 + $id_str[$i] + $offset);
        }
        return $encoded;
    }

    public static function decode($encoded)
    {
        $offset = ord($encoded[0]) - 79;
        $encoded = substr($encoded, 1);
        for ($i = 0, $len = strlen($encoded); $i < $len; ++$i) {
            $encoded[$i] = ord($encoded[$i]) - $offset - 65;
        }
        return (int)$encoded;
    }
}