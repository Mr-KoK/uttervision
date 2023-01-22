<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ResponseService;
use App\Services\StepServices;
use App\SGroup;
use App\Step;
use Exception;
use Illuminate\Http\Request;

class StepController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $five_steps = Step::where('group_id', $request->group_id)->where('position',0)->orderBy('index', 'asc')->get();
            $last_step= Step::where('group_id', $request->group_id)->where('position',1)->orderBy('index', 'asc')->get();
            $step_group = SGroup::where('id', $request->group_id)->first();
            return view('admin.step.load', [
                'five_steps' => $five_steps,
                'last_step' => $last_step,
                's_group' =>$step_group,
                'group_id'=>$request->group_id
            ])->render();
        }
        return view('admin.step.list-step', [
            'sgroups' => SGroup::all()
        ]);
    }

    public function updateStatus(Request $request){
        try {
            StepServices::updateStepStatus($request->step_id,$request->status);
            return ResponseService::jsonRes(true,true,'Update Successfully!','',200);
        }catch (Exception $exception){
            return ResponseService::jsonRes(false,false,$exception->getMessage(),$exception->getLine(),200);
        }
    }

    public function updatePosition(Request $request){
        try {
            StepServices::updateStepStatus($request->step_id,$request->position);
            return ResponseService::jsonRes(true,true,'Update Successfully!','',200);
        }catch (Exception $exception){
            return ResponseService::jsonRes(false,false,$exception->getMessage(),$exception->getLine(),200);
        }
    }

    public function list()
    {
        return response()->json([
            'steps' => Step::orderBy('index', 'desc')->get()
        ], 200);
    }

    public function indexingUpdate(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            StepServices::updateStepsIndexing($request->step_index);
            return ResponseService::jsonRes(true,$request,'steps updated successfully!','',200);
        }catch (Exception $exception){
            return ResponseService::jsonRes(false,$request,$exception->getMessage(),$exception->getLine(),301);
        }
    }

    public function store(Request $step)
    {
        $newStep = new Step();
        $newStep->name = $step->name;
        $newStep->group_id = $step->group_id;
        $newStep->description = $step->description;
        $newStep->position = $step->position;
        $newStep->index = $step->index;
        $newStep->save();
        return response()->json(
            [
                'step' => $step,
            ], 200);
    }


    public function update(Request $request)
    {
        Step::where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return response()->json([], 200);
    }


    public function delete(Request $request)
    {
        Step::destroy($request->id);
        return response()->json([], 200);
    }

    public function getByGroupId(int $id){
        if($id && !empty($id)){
            try {
                $steps = Step::where('group_id',$id)->get();
                return response()->json([
                    'success'=>true,
                    'steps'=>$steps
                ],200);

            }catch (Exception $e){
                return response()->json([
                    'success'=>false,
                    'error'=>$e->getMessage()
                ],300);
            }
        }
        else{
            return response()->json([
                'success'=>false
            ],200);
        }
    }
}
