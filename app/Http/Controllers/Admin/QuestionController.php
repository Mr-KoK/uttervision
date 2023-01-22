<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\AnswerGroup;
use App\Http\Controllers\Controller;
use App\Question;
use App\QuestionAnswer;
use App\Services\QuestionService;
use App\Services\ResponseService;
use App\SGroup;
use App\Step;
use App\Utility\HtmlHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index(Request $request)
    {
        $questions = Question::query()->orderByDesc('id');
        $s_groups = SGroup::all();
        if ($request->ajax()) {
            if (isset($request->s_group)) {
                if ($request->s_group == -1){
                    $questions->whereNull('step_id');
                }else{
//                    $questions->whereIn('step_id',Step::query()->where('group_id',$request->s_group)->pluck('id')->toArray());
                    $questions->whereIn('step_id',DB::table('steps')->where('group_id','=',$request->s_group )->pluck('id')->toArray());
                }
            }
            try {
                return view('admin.question.load', [
                    's_groups' => $s_groups,
                    'questions' => $questions->paginate(15),
                    'icons' => HtmlHelper::getIcons(),
                    'select_questions' => Question::all(),
                ])->render();
            } catch (\Exception $e) {
                return response()->json([
                    'er' => $e->getMessage(),
                ], 301);
            }

        }
        return view('admin.question.list-question', [
            's_groups' => $s_groups,
            'questions' => $questions->paginate(15),
            'icons' => HtmlHelper::getIcons(),
            'select_questions' => Question::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $question = new Question();
            $question->title = $request->title;
            $question->text = $request->text;
            $question->icon = $request->icon;
            $question->parent_id = $request->question;
            $question->step_id = $request->step;
            $question->save();
            if (isset($request->answers) && count($request->answers) > 0) {
                $answerGroup = new AnswerGroup();
                $answerGroup->type = $request->type;
                $answerGroup->question_id = $question->id;
                $answerGroup->save();
                foreach ($request->answers as $answer) {
                    $newAnswer = new Answer();
                    $newAnswer->text = $answer['text'];
                    $newAnswer->group_id = $answerGroup->id;
                    $newAnswer->save();
                    if (isset($answer['questions']) && count($answer['questions']) > 0) {
                        foreach ($answer['questions'] as $question) {
                            $questionAnswer = new QuestionAnswer();
                            $questionAnswer->question_id = $question;
                            $questionAnswer->answer_id = $newAnswer->id;
                            $questionAnswer->save();
                        }
                    }
                }
            }
            return response()->json([
                'success' => true,
                'question' => $question
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 300);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        try {

            $question = Question::find($request->id);
            $question->title = $request->title;
            $question->text = $request->text;
            $question->icon = $request->icon;
            $question->parent_id = $request->question;
            $question->step_id = $request->step_id;
            $question->save();

            if (isset($request->group_answers) && count($request->group_answers) > 0) {
                QuestionService::updateAnswerOfQuestion($question, $request->group_answers);
            } else {
                QuestionService::removeAnswerOfQuestion($question);
            }
            return response()->json([
                'success' => true,
                '$request' => $request->group_answers
            ], 200);

        } catch (\Exception $e) {
           return ResponseService::jsonRes(false,'',$e->getMessage(),$e->getLine(),301);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Question $question
     * @return JsonResponse
     */
    public function delete(Question $question, $id)
    {
        try {
            Question::where('id', $id)->delete();
            return response()->json([
                'success' => true,
                'id' => $id
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e
            ], 300);
        }
    }
}
