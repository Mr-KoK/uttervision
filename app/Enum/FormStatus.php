<?php
namespace App\Enum;

abstract class FormStatus extends Enums {
    const inProcess = "0";
    const accept = "1";
    const reject = "1";
    const stop = "2";
}