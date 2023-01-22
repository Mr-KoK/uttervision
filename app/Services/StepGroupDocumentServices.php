<?php

namespace App\Services;

use App\StepGroupDocument;
use Exception;

class StepGroupDocumentServices extends Service
{

    public static function createDefaultSGroupDocuments($step_group_id)
    {
        try {
            StepGroupDocument::create([
                'name' => 'passport',
                'step_group_id' => $step_group_id
            ]);
            StepGroupDocument::create([
                'name' => 'degree',
                'step_group_id' => $step_group_id
            ]);

        } catch (Exception $exception) {
            throw new Exception($exception);
        }

    }

    public static function updateSGroupDocuments($step_group_id, $documents)
    {
        try {
            StepGroupDocument::where('step_group_id','=',$step_group_id)->delete();
            foreach ($documents as $document) {
                StepGroupDocument::create([
                    'name' => $document['name'],
                    'step_group_id' => $step_group_id
                ]);
            }
        }catch (Exception $exception){
            throw new Exception($exception);
        }
    }

}