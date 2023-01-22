<?php

namespace App\Traits;

use Exception;

trait FilesHelper
{
    public function getExtension()
    {
        try {
            if ($_FILES["file"]["name"]) {
                $exp = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
            } else {
                $exp = 'png';
            }
            return $exp;
        } catch (Exception $exception) {
            throw new Exception($exception);
        }

    }
}