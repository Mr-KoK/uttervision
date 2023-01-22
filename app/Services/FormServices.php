<?php

namespace App\Services;

use App\AnswerGroup;
use App\Country;
use App\Document;
use App\Form;
use App\FormItem;
use App\FormItemRow;
use Exception;

class FormServices extends Service
{
    public static function createForm($form)
    {
        try {
            $response['exist'] = false;
            $oldForm = Form::where('user_id', '=', $form['user_id'])->where('country_id', '=', $form['country_id'])->first();
            if (!$oldForm) {
                $f = Form::firstOrCreate(['type' => $form['type'], 'user_id' => $form['user_id'], 'country_id' => $form['country_id'], 'status' => 0]);
                $country = Country::where('id', '=', $form['country_id'])->first();
                $sGroup = $country->group;
                if (count($sGroup->documents) > 0) {
                    foreach ($sGroup->documents as $key => $doc) {
                        $document = Document::create([
                            'form_id' => $f->id,
                            'name' => $doc->name,
                        ]);
                    }
                }
                if (isset($f['items'])) {
                    self::createFormItems($form['items'], $f->id, $sGroup);
                }
                $response['exist'] = false;
                $response['form'] = $f;
                return $response;
            } else {
                $response['exist'] = true;
                $response['form'] = $oldForm;
                return $response;
            }
        } catch (Exception $exception) {
            throw new Exception($exception);
        }
    }

    public static function createFormItems($items, $form_id, $sGroup)
    {
        foreach ($items as $key => $item) {
            $i = FormItem::firstOrCreate(['question_id' => $item['question_id'], 'form_id' => $form_id, 'status' => 0, 'position' => 0]);
            if (isset($item['rows'])) {
                self::createFormItemRows($item['rows'], $i->id);
            }
        }
        $step_6 = $sGroup->steps->where('position',1)->first();
        if (isset($step_6->questions)){
            foreach ($step_6->questions as $index=>$question){
                $j = FormItem::firstOrCreate(['question_id' =>$question->id , 'form_id' => $form_id, 'status' => 0, 'position' => 1]);
                if (isset($question->group_answers)){
                    foreach($question->group_answers as $group){
                        if (isset($group->answers)){
                            foreach ($group->answers as $answer)
                            $r = FormItemRow::firstOrCreate(['form_item_id' => $j->id, 'answer_id' => $answer->id, 'selected' => 0, 'value' => null, 'status' => 0]);
                        }
                    }
                }
            }
        }
    }

    public static function createFormItemRows($rows, $item_id)
    {
        foreach ($rows as $key => $row) {
            $r = FormItemRow::firstOrCreate(['form_item_id' => $item_id, 'answer_id' => $row['answer_id'], 'selected' => $row['selected'], 'value' => $row['value'], 'status' => 0]);
        }
    }

    public static function createNullFormItemRows($steps, $item_id)
    {
        foreach ($steps as $key => $row) {
            $r = FormItemRow::firstOrCreate(['form_item_id' => $item_id, 'answer_id' => $row['answer_id'], 'selected' => $row['selected'], 'value' => $row['value'], 'status' => 0]);
        }
    }

    public static function updateRows($rows)
    {
        try {
            foreach ($rows as $key => $row) {
                self::updateRow($row);
            }
        } catch (Exception $exception) {
            throw new Exception($exception);
        }
    }

    public static function updateRow($row)
    {
        try {
            $item = FormItemRow::find($row['row_id']);
            $item->value = $row['value'];
            $item->selected = $row['selected'];
            $item->save();
        } catch (Exception $exception) {
            throw new Exception($exception);
        }
    }

}