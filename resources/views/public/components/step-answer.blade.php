<div class="answers_box">
    @php
        $random = rand(1,1000);
    @endphp
    @switch($group_answer->type)
        @case(0)
        <div type="0" group-ans-id="{{$group_answer->id}}" question_id="{{$question->id}}" class="anseswer">
            @foreach($group_answer->answers as $key=>$ans)
                <div class="input-holder c-47">
                    <label for="answer-{{$group_answer->id}}-{{$key}}-{{$ans->id}}-{{$random}}">
                        <input
                                answer-id="{{$ans->id}}"
                                id="answer-{{$group_answer->id}}-{{$key}}-{{$ans->id}}-{{$random}}"
                                class="answer-{{$ans->id}}"
                                placeholder="{{$ans->text}}"
                                name="_question-text"
                                type="text">
                        <small></small>
                    </label>
                </div>
            @endforeach
        </div>

        @break

        @case(1)
        <div type="1" group-ans-id="{{$group_answer->id}}" question_id="{{$question->id}}" class="anseswer">
            @foreach($group_answer->answers as $key=>$ans)
                <div class="radio-item">
                    <input
                            answer-id="{{$ans->id}}"
                            ans-id="answer-{{$ans->id}}"
                            id="answer-{{$group_answer->id}}-{{$key}}-{{$ans->id}}-{{$random}}"
                            type="radio"
                            name="group-{{$group_answer->id}}"
                            value="{{$ans->id}}">
                    <label class="radio-btn"
                           for="answer-{{$group_answer->id}}-{{$key}}-{{$ans->id}}-{{$random}}">{{$ans->text}}
                    </label>
                </div>

            @endforeach
        </div>
        @break

        @case(2)
        <div type="2" group-ans-id="{{$group_answer->id}}" question_id="{{$question->id}}" class="anseswer">
            <label for="_question-text">
                <select id="answer-{{$group_answer->id}}" class="answer-{{$group_answer->id}}">
                    <option value="">Select One</option>
                    @foreach($group_answer->answers as $key=>$ans)
                        <option
                                answer-id="{{$ans->id}}"
                                ans-id="answer-{{$ans->id}}"
                                id="answer-{{$ans->id}}"
                                name="group-{{$group_answer->id}}"
                                value="{{$ans->id}}">{{$ans->text}}</option>
                    @endforeach
                </select>
                <small></small>
            </label>
        </div>
        @break

        @case(3)
        <div type="3" group-ans-id="{{$group_answer->id}}" question_id="{{$question->id}}" class="anseswer">

            @foreach($group_answer->answers as $key=>$ans)
                <div class="amswer-item">
                    <input
                            answer-id="{{$ans->id}}"
                            ans-id="answer-{{$ans->id}}"
                            value="{{$ans->id}}"
                            class="answer-{{$group_answer->id}}"
                            id="answer-{{$group_answer->id}}-{{$key}}-{{$ans->id}}-{{$random}}"
                            type="checkbox"/>
                    <label for="answer-{{$group_answer->id}}-{{$key}}-{{$ans->id}}-{{$random}}">{{$ans->text}}
                        <small></small>
                    </label>
                </div>
            @endforeach
        </div>
        @break

        @default
        <div type="1" group-ans-id="{{$group_answer->id}}" question_id="{{$question->id}}" class="anseswer">
            @foreach($group_answer->answers as $key=>$ans)
                <div class="radio-item">
                    <input
                            answer-id="{{$ans->id}}"
                            ans-id="answer-{{$ans->id}}"
                            id="answer-{{$group_answer->id}}-{{$key}}-{{$ans->id}}-{{$random}}"
                            type="radio"
                            name="group-{{$group_answer->id}}"
                            value="{{$ans->id}}">
                    <label class="radio-btn"
                           for="answer-{{$group_answer->id}}-{{$key}}-{{$ans->id}}-{{$random}}">{{$ans->text}}
                    </label>
                </div>

            @endforeach
        </div>
    @endswitch

    <div class="question-answer-holder">
        @foreach($group_answer->answers as $ans)
            @if(isset($ans->questions))
                @foreach($ans->questions as $quest)
                    <div class="quest-holder quest answer-{{$ans->id}}" question-id="{{$quest->id}}">
                        <p  class="m-0 question-text">{{$quest->text}}</p>
                        @foreach($quest->group_answers as $group_answer)
                            @include('public.components.step-answer')
                        @endforeach
                    </div>
                @endforeach
            @else
            @endif
        @endforeach

    </div>
</div>
