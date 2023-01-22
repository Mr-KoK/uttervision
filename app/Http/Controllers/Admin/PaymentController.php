<?php

namespace App\Http\Controllers\Admin;

use App\Payment;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $payments = $request->array;
        Payment::where('user_id', $request->id)->delete();
        for ($i = 0; $i < count($payments); $i++) {
            $partner = User::where('name', $payments[$i]['partnerName'])->first();
            $pay = new Payment;
            $pay->partner_id = $partner->id;
            $pay->type = $payments[$i]['type'];
            $pay->commision = $payments[$i]['commision'];
            $pay->date = $payments[$i]['date'];
            $pay->time = $payments[$i]['time'];
            $pay->user_id = $request->id;
            $pay->save();
        }
        return response()->json(
            [
                'data' =>  'successfully',
                'status' => 200
            ]
        );
    }
}
