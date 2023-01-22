<?php

namespace App\Http\Controllers\Users;
use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->cart_number = $request->cart_number;
        $cart->cvv = $request->cvv;
        $cart->mounth = $request->mounth;
        $cart->year = $request->year;
        $cart->save();
        return response()->json(
            [
                'data' =>  'successfull',
                'status' => 200
            ]
        );
    }
    public function update(Request $request)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->first();
        $cart->user_id = auth()->user()->id;
        $cart->cart_number = $request->cart_number;
        $cart->cvv = $request->cvv;
        $cart->mounth = $request->mounth;
        $cart->year = $request->year;
        $cart->save();
        return response()->json(
            [
                'message' =>  'successfull',
                'data' => $cart,
                'status' => 200
            ]
        );
    }
}