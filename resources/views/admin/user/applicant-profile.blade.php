@extends('admin.layout.master')


@section('head')
    <link rel="stylesheet" href='{{asset('assets/css/cpp/admin/profile-application.min.css')}}'>
    <title>{{$form->user->name}} Application - UtterVision</title>
@endsection

@section('foot')
    <script src="{{asset('assets/js/admin/profile-application.js')}}"></script>
@endsection()

@section('content')
    <h1>{{$form->user->name}} Application</h1>
    <div class="form-holder">
        <div class="tabular-form">
            <div class="tabs flex align-center">
                <div class="tab-btn tab-1 active" data-bs-target="tab-1">
                    <span>User Questions</span>
                </div>
                <div class="tab-btn tab-2" data-bs-target="tab-2">
                    <span>User Document</span>
                </div>
                <div class="tab-btn tab-3" data-bs-target="tab-3">
                    <span>User Review</span>
                </div>
                <div class="tab-btn tab-4" data-bs-target="tab-4">
                    <span>User Payment</span>
                </div>
                <div class="tab-btn tab-5" data-bs-target="tab-5">
                    <span>Visa Submition</span>
                </div>
            </div>

            <div class="tab-bodies flex c-100">
                <div class="tab-body tab-questions active" holder="tab-1">
                    <p class="percent-answer-form"><b>{{$form->getQuestionPercent()}}% </b> of form has been
                        completed!</p>

                    @foreach($form->items as $key=>$item)
                        <div class="quest dash-card {{$item->haveAnswer() ? 'answered' : 'not-answered'}}">
                            <small>{{$key+1}} - </small>
                            <h3>{{$item->group_answer->question->text}}</h3>
                            @switch($item->group_answer->type)
                                @case(0)
                                <ul class="q-answer input-box">
                                    @foreach($item->rows as $row_key=>$row )
                                        <li class="{{$row->selected ? 'trust' : ''}}">
                                            <span>{{$row->value ? $row->value : 'No Answer'}}</span></li>
                                    @endforeach
                                </ul>
                                @break
                                @case(1)
                                <ul class="q-answer radio-box">
                                    @foreach($item->rows as $row_key=>$row )
                                        <li class="{{$row->selected ? 'trust' : ''}}">
                                            <span>{{$row->answer->text}}</span></li>
                                    @endforeach
                                </ul>
                                @break
                                @case(2)
                                <ul class="q-answer select-box">
                                    @foreach($item->rows as $row_key=>$row )
                                        <li class="{{$row->selected ? 'trust' : ''}}">
                                            <span>{{$row->answer->text}}</span></li>
                                    @endforeach
                                </ul>
                                @break
                                @case(3)
                                <ul class="q-answer check-box">
                                    @foreach($item->rows as $row_key=>$row )
                                        <li class="{{$row->selected ? 'trust' : ''}}">
                                            <span>{{$row->answer->text}}</span></li>
                                    @endforeach
                                </ul>
                                @break
                                @default
                                <ul class="q-answer">
                                    @foreach($item->rows as $row_key=>$row )
                                        <li class="{{$row->selected ? 'trust' : ''}}">
                                            <span>{{$row->answer->text}}</span></li>
                                    @endforeach
                                </ul>
                            @endswitch
                        </div>
                    @endforeach
                </div>
                <div class="tab-body tab-document" holder="tab-2">
                    @foreach($form->documents as $key=>$doc)
                        <div class="dash-card form-docs">
                            <div class="flex align-center between ">
                                <h4>{{$doc->name}}</h4>
                                <img width="150" src="{{$doc->src}}" alt="{{$doc->name}}">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-body tab-review" holder="tab-3">
                    @foreach($form->items as $key=>$item)
                        <div class="quest dash-card">
                            <small>{{$key+1}} - </small>
                            <h3>{{$item->group_answer->question->text}}</h3>
                            @switch($item->group_answer->type)
                                @case(0)
                                <ul class="q-answer input-box">
                                    @foreach($item->rows as $row_key=>$row )
                                        <li class="{{$row->selected ? 'trust' : ''}}">
                                            <span>{{$row->value ? $row->value : 'No Answer'}}</span>
                                            <select class="review-row green-btn" row-id= {{$row->id}} >
                                                <option {{$row->status === 0 ? 'selected' : ''}} value="0">Review
                                                </option>
                                                <option {{$row->status === 1 ? 'selected' : ''}} value="1">Approve
                                                </option>
                                                <option {{$row->status === 2 ? 'selected' : ''}} value="2">Unapproved
                                                </option>
                                                <option {{$row->status === 3 ? 'selected' : ''}} value="3">Decline
                                                </option>
                                            </select></li>
                                    @endforeach
                                </ul>
                                @break
                                @case(1)
                                <ul class="q-answer radio-box">
                                    @foreach($item->rows as $row_key=>$row )
                                        <li class="{{$row->selected ? 'trust' : ''}}">
                                            <span>{{$row->answer->text}}</span>
                                            <select class="review-row green-btn" row-id= {{$row->id}}>
                                                <option {{$row->status === 0 ? 'selected' : ''}} value="0">Review
                                                </option>
                                                <option {{$row->status === 1 ? 'selected' : ''}} value="1">Approve
                                                </option>
                                                <option {{$row->status === 2 ? 'selected' : ''}} value="2">Unapproved
                                                </option>
                                                <option {{$row->status === 3 ? 'selected' : ''}} value="3">Decline
                                                </option>
                                            </select>
                                        </li>
                                    @endforeach
                                </ul>
                                @break
                                @case(2)
                                <ul class="q-answer select-box">
                                    @foreach($item->rows as $row_key=>$row )
                                        <li class="{{$row->selected ? 'trust' : ''}}">
                                            <span>{{$row->answer->text}}</span>
                                            <select class="review-row green-btn" row-id= {{$row->id}}>
                                                <option {{$row->status === 0 ? 'selected' : ''}} value="0">Review
                                                </option>
                                                <option {{$row->status === 1 ? 'selected' : ''}} value="1">Approve
                                                </option>
                                                <option {{$row->status === 2 ? 'selected' : ''}} value="2">Unapproved
                                                </option>
                                                <option {{$row->status === 3 ? 'selected' : ''}} value="3">Decline
                                                </option>
                                            </select>
                                        </li>
                                    @endforeach
                                </ul>
                                @break
                                @case(3)
                                <ul class="q-answer check-box">
                                    @foreach($item->rows as $row_key=>$row )
                                        <li class="{{$row->selected ? 'trust' : ''}}">
                                            <span>{{$row->answer->text}}</span>
                                            <select class="review-row green-btn" row-id= {{$row->id}}>
                                                <option {{$row->status === 0 ? 'selected' : ''}} value="0">Review
                                                </option>
                                                <option {{$row->status === 1 ? 'selected' : ''}} value="1">Approve
                                                </option>
                                                <option {{$row->status === 2 ? 'selected' : ''}} value="2">Unapproved
                                                </option>
                                                <option {{$row->status === 3 ? 'selected' : ''}} value="3">Decline
                                                </option>
                                            </select></li>
                                    @endforeach
                                </ul>
                                @break
                                @default
                                <ul class="q-answer">
                                    @foreach($item->rows as $row_key=>$row )
                                        <li class="{{$row->selected ? 'trust' : ''}}">
                                            <span>{{$row->answer->text}}</span>
                                            <select class="review-row green-btn" row-id= {{$row->id}}>
                                                <option {{$row->status === 0 ? 'selected' : ''}} value="0">Review
                                                </option>
                                                <option {{$row->status === 1 ? 'selected' : ''}} value="1">Approve
                                                </option>
                                                <option {{$row->status === 2 ? 'selected' : ''}} value="2">Unapproved
                                                </option>
                                                <option {{$row->status === 3 ? 'selected' : ''}} value="3">Decline
                                                </option>
                                            </select>
                                        </li>
                                    @endforeach
                                </ul>
                            @endswitch
                        </div>
                    @endforeach
                </div>
                <div class="tab-body tab-payment" holder="tab-4">
                    tab 4

                </div>
                <div class="tab-body tab-other" holder="tab-5">
                    tab 5

                </div>
            </div>
        </div>
    </div>
    <div class="chat-box">
        <h2>Chat With {{$form->user->name}} </h2>

        <label for="">
            <textarea
                    rows="8"
                    placeholder=""></textarea>
        </label>

    </div>
@endsection()
