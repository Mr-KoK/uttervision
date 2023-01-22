<?php

namespace App\Services;

use App\Step;
use Exception;

class StepServices extends Service
{
    /**
     * @throws Exception
     */
    public static function updateStepsIndexing($indexing): bool
    {
        try {
            if (!isset($indexing)) {
                return false;
            }
            foreach ($indexing as $item) {
                $step = Step::find($item['step_id']);
                $step->index = $item['index'];
                $step->save();
            }
            return true;
        } catch (Exception $exception) {
            throw new Exception($exception);
        }
    }

    public static function updateStepStatus($step_id,$status){
        try{
            Step::where('id',$step_id)->update([
                'status'=>$status
            ]);
        }catch (Exception $exception){
            throw new Exception($exception);
        }

    }

    public static function updateStepPosition($step_id,$position){
        try{
            Step::where('id',$step_id)->update([
                'position'=>$position
            ]);
        }catch (Exception $exception){
            throw new Exception($exception);
        }

    }
}
