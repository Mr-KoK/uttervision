<?php

namespace App\Http\Controllers;

use App\Country;
use App\SGroup;
use App\Step;
use Illuminate\Http\Request;
use function view;

class StepsController extends Controller{

    public function index(Request $request){
        $id = $request->id;
        $sG = SGroup::where('id',$id)->first();
        $steps = Step::where('group_id',$id)->where('position',0)->orderBy("index")->get();
        if($id == 0 || !isset($sG) || empty($sG->steps) || $sG->isEmpty()){
            return view('public.404');
        }
        else{
            return view('public.steps',[
                's_group' => $sG,
                'steps'=>$steps,
                'country' => Country::find($request->country)
            ]);
        }
    }

}