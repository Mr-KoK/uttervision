@extends('admin.layout.master')

@section('head')
    <title>List Questions - UtterVision</title>
    <link rel="stylesheet" href="{{asset('assets/lib/juqery/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/admin/all-question.min.css')}}">
@endsection

@section('foot')
    <script src="{{asset('assets/js/vendor/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/admin/list-question.js')}}"></script>
@endsection

@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-add-question">
        <div class="modal-dialog " role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="flex between f-warp align-center">
                            {{--                            <div class="input-holder c-47">--}}
                            {{--                                <label for="_question-title">--}}
                            {{--                                    <p>Title</p>--}}
                            {{--                                    <input class="" id="_question-title" placeholder="insert Question Name" type="text">--}}
                            {{--                                    <small></small>--}}
                            {{--                                </label>--}}
                            {{--                            </div>--}}
                            <div class="input-holder c-47">
                                <label for="_question-text">
                                    <p>Text</p>
                                    <input name="_question-text" autocomplete="new_email" class="required"
                                           id="_question-text"
                                           placeholder="insert Text For Question" type="text">
                                    <small></small>
                                </label>
                            </div>
                            <div class="input-holder c-47">
                                <label for="_question-text">
                                    <p>Step Group</p>
                                    <select name="_step-group" autocomplete="step-group" class="_step-group"
                                            id="_step-group">
                                        <option selected value="">Select a group step</option>
                                        @foreach($s_groups as $s_group)
                                            <option value="{{$s_group->id}}">{{$s_group->name}}</option>
                                        @endforeach
                                    </select>
                                    <small></small>
                                </label>
                            </div>
                            <div class="input-holder c-47">
                                <label for="_question-icon">
                                    <p>Icon</p>
                                    <div class="_icons-holder">
                                        <input value="icon-info" class="_icon" id="_icon" type="hidden">
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
                                    <select title="First Select a step group" disabled name="_step" autocomplete="_step"
                                            class="_step" id="_step">
                                        <option value="">Select a step</option>
                                    </select>
                                    <small></small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="_answers">

                        <div class="add-answer-btn d-inline-block modal-add-answer">Add Answer</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success add-question-btn relative"><i class="_spinner"></i>Add
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="header-section between flex f-warp">
            <h1>Questions</h1>
        </div>
        <datalist id="_question-datalist">
            <option value="0">Select a Question</option>
            @foreach($select_questions as $item_question)
                <option value="{{$item_question->id}}">
                    {{$item_question->text}} | {{isset($item_question->step->name) ? $item_question->step->name : ''}}
                </option>
            @endforeach
        </datalist>
        <section class="questions-holder">
            <div class="filters d-flex my-1">
                <select class="c-30" name="filter-groups" id="filter-groups">
                    <option value="">all step groups</option>
                    <option value="-1">without step group</option>
                    @foreach($s_groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="questions">
                @include('admin.question.load')
            </div>
            <div class="btn-add absolute-btn">+</div>
        </section>


    </div>
@endsection