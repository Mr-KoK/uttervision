<div class="questions-holder my-1">
    <div class="_spinner"></div>
    @if(count($questions) > 0)
        <div class="dash-card between flex align-center questions-header list-item">
            <span>Icon</span>
            {{--        <p>Title</p>--}}
            <p>Text</p>
            <p>Step Group</p>
            <p>Step</p>
            <span>Actions</span>
        </div>
    @endif
    @forelse ($questions as $q_key=>$question)

        <div row-id="{{$question->id}}" class="dash-card between collapse-question f-warp flex align-center list-item">
            <i class="{{$question->icon ? $question->icon : 'icon-info'}}"></i>
            <p class="d-inline-block q_text">
                {{$question->text}}
            </p>
            <p class="d-inline-block q_step_group">
                {{isset($question->step->group->name) ? $question->step->group->name : ''}}
            </p>
            <p class="d-inline-block q_step">
                {{isset($question->step->name) ? $question->step->name : ''}}
            </p>
            <div class="_question-actions  list-actions flex align-center between c-30 ">
                <a class="collapse-question-btn" title="edit question">
                    <img width="40"
                         src="{{asset('/assets/images/admin/icons/edit-icon.svg')}}"
                         alt="edit-page">
                </a>

                <a class="_delete-question" question-id="{{$question->id}}" title="delete question" href="#">
                    <img width="40"
                         src="{{asset('/assets/images/admin/icons/delete.png')}}"
                         alt="delete-page"></a>

            </div>
            <div class="collapse-body c-100">
                <div class="flex between f-warp align-center">
                    <div class="input-holder c-47">
                        <label for="_question-text-{{$q_key}}">
                            <p>Text</p>
                            <input
                                    value="{{$question->text}}"
                                    name="_question-text"
                                    autocomplete="new_email"
                                    class="required _question-text"
                                    id="_question-text-{{$q_key}}"
                                    placeholder="insert Text For Question" type="text">
                            <small></small>
                        </label>
                    </div>
                    <div class="input-holder c-47">
                        <label for="_question-group">
                            <p>Step Group</p>
                            <select
                                    name="_step-group"
                                    autocomplete="step-group"
                                    class="_step-group">
                                <option selected value="">Select a group step</option>
                                @foreach($s_groups as $group_key=>$s_group)
                                    <option {{isset($question->step->group->id) && $question->step->group->id == $s_group->id ? 'selected' : ''}} value="{{$s_group->id}}">{{$s_group->name}}</option>
                                @endforeach
                            </select>
                            <small></small>
                        </label>
                    </div>
                    <div class="input-holder c-47">
                        <label for="_question-icon">
                            <p>Icon</p>
                            <div  class="_icons-holder">
                                <input value="icon-info" class="_icon" type="hidden">
                                <button><i class="icon-info"></i> <span>Select Icon</span></button>
                                <ul class="list-icons">
                                    @foreach($icons as $icon)
                                        <li><i class="{{$icon['class']}}"></i><span>{{$icon}}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <small></small>
                        </label>
                    </div>
                    <div class="input-holder c-47">
                        <label for="_question-text">
                            <p>Step</p>
                            <select title="First Select a step group" name="_step" autocomplete="_step"
                                    class="_step">
                                @if(isset($question->step->id))
                                    @foreach($question->step->group->steps as $item)
                                        <option {{$question->step->id == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                @else
                                    <option value="">Select a step</option>
                                @endif
                            </select>
                            <small></small>
                        </label>
                    </div>
                    <div class="q-answers"
                         style="margin-top: 10px;padding-top: 10px;border-top: 1px dashed #ccc;width: 100%;">
                        <p>Question Answers</p>
                        <div class="answers-boxs">
                            @foreach($question->group_answers as $box_key=>$answer_box)
                                <div class="box-answer">
                                    <div class="type-holder c-47 t-center mauto">
                                        <label for="_answers-type-{{$box_key}}">
                                            <select name="_answers-type-{{$box_key}}" id="_answers-type-{{$box_key}}">
                                                <option value="0" {{$answer_box->type == 0 ? 'selected' : ''}}>Sample input</option>
                                                <option value="1" {{$answer_box->type == 1 ? 'selected' : ''}}>Radio Box</option>
                                                <option value="2" {{$answer_box->type == 2 ? 'selected' : ''}}>Select Box</option>
                                                <option value="3" {{$answer_box->type == 3 ? 'selected' : ''}}>Multi Select Box</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="answers">
                                        @foreach($answer_box->answers as $answer_key=> $answer)
                                            <div class="ans-holder my-1  align-center between flex">
                                                <div class="_answer-holder input-holder c-47">
                                                    <label for="_answer-{{$answer_key}}-{{$q_key}}">
                                                        <input value="{{$answer->text}}" a-id ={{$answer->id}} index="{{$answer_key}}" id="_answer-{{$answer_key}}-{{$q_key}}" class="_answer" type="text">
                                                    </label>
                                                </div>
                                                <div class="ans-question-holder c-47">
                                                    <div class="answer-questions">
                                                        @foreach($answer->questions as $key_question=>$l_question)
                                                            <div class="input-holder flex align-center c-47">
                                                                              <label for="_question-text">
                                                                                    <select list="_question-datalist" class="modal-select-question" >
                                                                                        @foreach($questions as $list_question)
                                                                                            <option
                                                                                                    {{$question->id == $list_question->id ? 'disabled' : ''}}
                                                                                                    {{$l_question->id == $list_question->id ? 'selected' : ''}}
                                                                                                    value="{{$list_question->id}}"
                                                                                            >
                                                                                                    {{$list_question->text}} | {{isset($list_question->step->name) ? $list_question->step->name : ''}}
                                                                                            </option>
                                                                                        @endforeach
                                                                                   </select>
                                                                                    <small></small>
                                                                               </label>
                                                                         <div class="remove-question flex">
                                                                             <img width="60" height="60" style="margin-left: 5px;cursor: pointer" src="/assets/images/admin/icons/close-icon.svg" alt="remove">
                                                                         </div>
                                                                       </div>
                                                        @endforeach
                                                    </div>
                                                    <button question-id="{{$question->id}}" id="question-ans-{{$answer_key}}" class="add-qus-answer">Add Question</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="actions">
                                        <button class="add-more-answer">add more</button>
                                        <button index='{{$group_key}}' class="remove-box-answer"><img src="{{asset('assets/images/admin/icons/close-icon.svg')}}" alt=""></button>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="btn-actions">
                            <button class="add-group-answer-btn">Add new group answer</button>
                        </div>
                    </div>
                    <div class="btn-holder t-center c-100">
                        <img class="edit-question" q-id="{{$question->id}}"
                             style="width: 60px;margin-top: 16px;cursor: pointer"
                             src="{{asset('assets/images/admin/icons/check.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="py-2 t-center dash-card ">
            <h1 class="t-center mauto">Ops!</h1>
            <p class="t-center mauto">Sry</p>
            <p class="t-center mauto">no Question is there</p>
            <div>
                <img src="{{asset('assets/images/admin/icons/no-item.png')}}" alt="">
            </div>
        </div>
    @endforelse

</div>
@if(!empty($questions->links()))
    <div class="pagination-holder">
        {{$questions->links()}}
    </div>
@endif





