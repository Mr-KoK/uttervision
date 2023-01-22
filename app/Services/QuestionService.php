<?php
namespace App\Services;

use App\Answer;
use App\AnswerGroup;
use App\Question;
use App\QuestionAnswer;
use Exception;

class QuestionService extends Service {
    /**
     * @throws Exception
     */
    public static function removeAnswerOfQuestion(Question $question): bool
    {
        try {
            foreach ($question->group_answers as $group){
                AnswerGroup::where('id',$group->id)->delete();
            }
            return true;
        }
        catch (Exception $e){
            throw new Exception($e);
        }
    }

    /**
     * @throws Exception
     */
    public static function updateAnswerOfQuestion(Question $question,$group_answers): bool
    {
        try {
            self::removeAnswerOfQuestion($question);
            foreach ($group_answers as $boxAnswer){
                $answerGroup = new AnswerGroup();
                $answerGroup->type = $boxAnswer['type'];
                $answerGroup->question_id = $question->id;
                $answerGroup->save();
                foreach ($boxAnswer['answers'] as $answer) {
                    $newAnswer = new Answer();
                    $newAnswer->text = $answer['answerText'];
                    $newAnswer->group_id = $answerGroup->id;
                    $newAnswer->save();
                    if(isset($answer['questions']) && count($answer['questions']) > 0){
                        foreach ($answer['questions'] as $quest){
                            $questionAnswer = new QuestionAnswer();
                            $questionAnswer->question_id = $quest;
                            $questionAnswer->answer_id = $newAnswer->id;
                            $questionAnswer->save();
                        }
                    }
                }
            }
            return true;
        }catch (Exception $e){
            throw new Exception($e);
        }
    }
}

