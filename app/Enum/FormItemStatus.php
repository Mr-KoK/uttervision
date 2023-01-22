<?php
namespace App\Enum;

abstract class FormItemStatus extends Enums {
    const Pending = "0";
    const Approve = "1";
    const Reject = "2";
    const Review = "3";
}