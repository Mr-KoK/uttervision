<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{

    public function index()
    {
       return view('partner.dashboard',[
           'partner'=>Auth::guard('partner')->user()
       ]);
    }

}
