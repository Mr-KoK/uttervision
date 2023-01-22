@extends('member.layout.master')


@section('head')
    <title>Member Applicant | UtterVision</title>
    <link rel="stylesheet" href="{{asset('assets/css/cpp/member/member-applciation.min.css')}}">
@endsection

@section('foot')

    <script src="{{asset('assets/lib/flipper-count-down/jquery.flipper-responsive.js')}}"></script>
    <script src="{{asset('assets/js/member/application.js')}}"></script>
@endsection

@section('content')
    <div class="main-content client">
        <div class="row mb-0">
            <div class="col-4 col-sm-12 mb-10">
                <div class="row">
                    <div class="box pb-0 overflow-hidden">
                        <div class="box-header d-block mb-40">
                            <div class="me-auto">
                                <h4 class="card-title m-0 fs-16 fw-normal text-over-dots">Dear <span
                                            class="color-9">{{$user->name}}</span>, Welcome
                                </h4>
                                <p class="fs-12"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 d-flex mb-0 justify-content-end">
                                <div class="flex-wrap justify-content-center d-flex">
                                    <div class="header-item waves-effect text-center">
                                        <img width="109" height="109" class="rounded-circle header-profile-user mr-5 "
                                             src="{{$user->getAvatar()}}" alt="{{$user->name}}">
                                        <span class="info d-block justify-content-center  color-span text-center m-0">
											<div class="">
                                                <span class="d-block fs-20 font-w600 ">
                                                    {{$user->name}}
                                                </span>
                                            </div>
											<div class=" w-100 m-auto">
                                                <a href="#" class="fs-9 color-8 mt-20">
                                                    {{count($user->forms)}} Visa in Progress </a> </div>
										</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 box-body mb-0 user-profile">
                                <ul class="mb-0 mw-100 color-span ml-5 ">
                                    <li>
                                        <span class="info-tlt">Applicant Type</span>
                                        <span class="info-span">{{$form->getType()}}</span>
                                    </li>
                                    <li>
                                        <span class="info-tlt">Email ID</span>
                                        <span class="info-span">{{$user->email}}</span>
                                    </li>
                                    <li>
                                        <div>
                                            <span class="info-tlt">Varification</span>
                                            <span class="badge {{$user->isVerify() ? 'badge-success' : 'badge-danger'}}  rounded-pill">{{$user->isVerify() ? 'Verified ' : 'Not Verified '}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="info-tlt">Joining Date</span>
                                        <span class="info-span font-w600 fs-15">{{$user->created_at->format('Y/d/m')}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-12 mb-10 visa-application">
                <div class="row">
                    <div class="box">
                        <div class="box-header mb-22">
                            <div class="me-auto">
                                <h4 class="card-title m-0 fs-16 fw-normal text-over-dots">Your Application <span
                                            class="color-9">Statistic</span>
                                </h4>
                                <p class="fs-12">visa application process of applicant</p>
                            </div>
                        </div>
                        <div class="box-body pt-0">
                            <div class="row">
                                <div class="col-xl-12 col-12 w-sm-100 mb-30">
                                    <div class="canvas-container m-auto">
                                        <canvas
                                                style="
                                                        display: block;
                                                        background-image: url({{$form->country->img}}) !important;
                                                        background-position: 52% 48% !important;
                                                        background-repeat: no-repeat !important;
                                                        background-attachment: initial !important;
                                                        background-origin: initial !important;
                                                        background-clip: initial !important;
                                                        background-size: 150px !important;
                                                        width: 175px;
                                                        height: 218px;
                                                        "
                                                id="chartjs-4" class="chartjs flag-item" width="80"
                                                height="80"></canvas>
                                        <div class="chart-data">
                                            <div data-percent="{{$form->getDocumentPercent()}}"
                                                 data-color="#D2D2D2" data-label="Documents"></div>
                                            <div data-percent="{{$form->getQuestionPercent()}}"
                                                 data-color="#ACCD00" data-label="Questions"></div>
                                            <div data-percent="{{$form->getReviewPercent()}}" data-color="#DF88D9"
                                                 data-label="Review"></div>
                                            <div data-percent="100" data-color="#ABA7EC" data-label="Five Step"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-12 col-12 w-sm-100 mb-0">
                                    <div class="d-flex m-auto justify-content-center">
                                        <ul class="box-list mt-20 ml-14p">
                                            <li>
                                                <!-- <span class="bg-blue square"></span> -->
                                                <span class="pr-5 color-6 document-percent">{{$form->getDocumentPercent()}}%</span>
                                                Documents
                                            </li>
                                            <li>
                                                <!-- <span class="bg-success square"></span> -->
                                                <span class="pr-5 color-8 question-percent">{{$form->getQuestionPercent()}}%</span>
                                                Questions
                                            </li>
                                            <li>
                                                <!-- <span class="bg-warning square"></span> -->
                                                <span class="pr-5 color-9 review-percent">{{$form->getReviewPercent()}}%</span>
                                                Review
                                            </li>
                                            <li><!-- <span class="bg-info square"></span> -->
                                                <span class="pr-5 color-10">100%</span> Five Step
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-12 mb-10">
                <div class="row">
                    <div class="box flex-wrap flex-lg-nowrap d-flex pb-0 position-relative">
                        <div class="d-flex flex-grow-1 flex-fill">
                            <div class="box-header p-0 d-block">
                                <div class="box-header p-1 d-block">
                                    <div class="me-auto">
                                        @if($offer!=0 && $offer != 1)
                                            <input type="hidden" id="time-left"
                                                   value="{{$offer}}">
                                            <h4 class="card-title m-0 fs-15 fw-normal text-nowrap">You Have <span
                                                        class="color-9 days-toleft font-w500 fs-25"> 0 </span> Days
                                            </h4>
                                            <p class="fs-11 w-100 text-center">
                                            <span class="d-block fs-30 color-21 font-w900"> <i
                                                        class="hour-toleft">00</i>:<i class="min-toleft">00</i> </span>
                                                <strong class="font-w300">Remains Premium</strong></p>
                                        @else
                                            <h4 class="card-title m-0 fs-15 fw-normal">You Have <span
                                                        class="color-9 font-w500 fs-25"> 0 </span> Days </h4>
                                            <p class="fs-11 w-100 text-center">
                                            <span class="d-block fs-30 color-21 font-w900"> <i
                                                        class="">00</i>:<i class="">00</i> </span>
                                                <strong class="font-w300">Remains Premium</strong></p>
                                        @endif

                                    </div>
                                    <div class="action justify-content-center w-100 text-center flex-wrap m-0 p-0">
                                        <a href="javascript:void(0)"
                                           class="add rounded-pill mt-5 fs-10 d-flex align-items-center">
                                            Premium
                                            <img
                                                    src="{{asset('assets/images/member/svg/ico-crown.svg')}}"
                                                    alt="UtterVision" class="align-middle position-relative mt-2 px-2">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class=" flex-wrap justify-content-center d-flex">
                                    <div class="">
                                        <img class="w-100"
                                             src="{{asset('assets/images/member/svg/img-time-managments.svg')}}"
                                             alt="Brazil">
                                    </div>
                                </div>
                            </div>
                            @if($offer == 0)
                                <div class="not-allow action position-absolute">
                                    <a class="add rounded-pill fs-12">
                                        Please Verify Your Account
                                    </a>
                                    <p>get 6 day free premium after account activation</p>
                                </div>
                            @elseif($offer == 1)
                                <div class="not-allow action position-absolute">
                                    <a class="add rounded-pill fs-12">
                                        Get Premium Account
                                    </a>
                                    <p>Your Trial Account Time End</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="box mt-27">
                        <div class="box-footer">
                            <div class="d-flex align-items-center">
                                <div class="d-flex mb-3 mb-md-0">
                                    <img src="{{asset('assets/images/member/svg/ico-remainig-questions.svg')}}"
                                         alt="user">
                                    <div class="ml-19">
                                        <div class="me-auto">
                                            <h4 class="card-title m-0 fs-15 fw-normal">
                                                <span class="color-8 font-w300 fs-38 pr-5"
                                                      style="border-right: 1px dotted #ccc">{{$form->getCountQuestionAnswered()}}</span>
                                                <span class="color-21 font-w300 fs-28">{{count($form->items)}}</span>
                                                <span class="color-21 font-w300 fs-12">questions</span>
                                            </h4>
                                        </div>
                                        <div><strong class="font-w300">total question answered</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="d-flex align-items-center">
                                <div class="d-flex mb-3 mb-md-0">
                                    <img src="{{asset('assets/images/member/svg/ico-remainig-documents.svg')}}"
                                         alt="user">
                                    <div class="ml-19">
                                        <div class="me-auto">
                                            <h4 class="card-title m-0 fs-15 fw-normal">
                                                <span class="color-8 font-w300 fs-38 pr-5"
                                                      style="border-right: 1px dotted #ccc">{{$form->getCountDocumentUploaded()}}</span>
                                                <span class="color-21 font-w300 fs-28">{{count($form->documents)}}</span>
                                                <span class="color-21 font-w300 fs-12">files</span>
                                            </h4>
                                        </div>
                                        <div><strong class="font-w300">total documents completed</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12" id="add-new-visa">
                <div class="row">
                    <div class="box pd-0">
                        <div class="tab-menu-heading hremp-tabs p-0 ">
                            <div class="tabs-menu1 pb-5 mt-30">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs w-80 d-flex justify-content-strat m-auto">
                                    <li><a href="#tab6" class="active" data-bs-toggle="tab">5 Step Questions</a>
                                    </li>
                                    <li><a href="#tab7" class="" data-bs-toggle="tab">Step 6 Questions</a>
                                    </li>
                                    <li><a href="#tab10" data-bs-toggle="tab">Documents</a></li>
                                    <li><a href="#tab9" data-bs-toggle="tab">Payments</a></li>
                                    <li><a href="#tab12" data-bs-toggle="tab">Notes</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body w-90 m-auto tabs-menu-body hremp-tabs1 p-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab6">
                                    <div class="box-body pl-15 pr-15 pb-20 activity mt-10">
                                        <div class="table-responsive">
                                            <div
                                                    id="task-profile" role="grid">
                                                <ul class="table-header align-items-center p-2 justify-content-between d-flex">

                                                    <li class="w-5 border-bottom-0 d-inline-block  sorting fs-14 font-w500"
                                                        tabindex="0"
                                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                                    >Status
                                                    </li>

                                                    <li class="w-60 border-bottom-0 d-inline-block sorting fs-14 font-w500"
                                                        tabindex="0">
                                                        Question
                                                    </li>


                                                    <li class="w-10 border-bottom-0 d-inline-block text-center sorting_disabled fs-14 font-w500"
                                                        rowspan="1" colspan="1">Action
                                                    </li>
                                                </ul>
                                                @foreach($form->items->where('position',0) as $key=>$item)
                                                    <ul item-id="{{$item->id}}"
                                                        class="p-2 position-relative table-row d-flex align-items-center justify-content-between flex-wrap overflow-hidden">

                                                        <li class="w-5">
                                                        <span class="badge  {{$item->status == 0 ? "badge-pink-light": ($item->status == 1 ? "badge-success" : ($item->status == 2 ? "badge-danger" : "badge-warning"))}}">
                                                            {{$item->getStatus()}}
                                                        </span>
                                                        </li>

                                                        <li class="w-60">

                                                                <span title="{{$key+1}}- {{$item->question->text}}"
                                                                      class="fs-12">
                                                               {{$key+1}}- {{$item->question->text}}
                                                       </span>
                                                        </li>

                                                        <li class="w-10 text-center">

                                                            <img width="60" style="cursor: pointer"
                                                                 class="edit-answer"
                                                                 src="{{asset('assets/images/member/svg/edit-btn.svg')}}"
                                                                 alt="">
                                                        </li>
                                                        <li class="w-100 mt-20 answers_box">
                                                            @if(isset($item->question->group_answers))
                                                                @foreach($item->question->group_answers as $group_answer)
                                                                    @switch($group_answer->type)
                                                                        @case(0)
                                                                        <div type="0"
                                                                             group-ans-id="{{$group_answer->id}}"
                                                                             class="user-answers">
                                                                            @foreach($item->rows as $key_rows=>$row)
                                                                                <div class="input-holder c-47">
                                                                                    <label for="answer-{{$group_answer->id}}-{{$key_rows}}-{{$row->id}}">
                                                                                        <input
                                                                                                row-id="{{$row->id}}"
                                                                                                id="row-{{$group_answer->id}}-{{$key_rows}}-{{$row->id}}"
                                                                                                class="row-{{$row->id}}"
                                                                                                value="{{$row->value}}"
                                                                                                name="_question-text"
                                                                                                type="text">
                                                                                        <small></small>
                                                                                    </label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        @break
                                                                        @case(1)
                                                                        <div type="1"
                                                                             group-ans-id="{{$group_answer->id}}"
                                                                             class="user-answers">
                                                                            @foreach($item->rows as $key=>$row)
                                                                                <div class="radio-item">
                                                                                    <input
                                                                                            {{$row->selected == '1' ? 'checked' : ''}}
                                                                                            row-id="{{$row->id}}"
                                                                                            id="row-{{$group_answer->id}}-{{$key}}-{{$row->id}}"
                                                                                            type="radio"
                                                                                            name="group-{{$group_answer->id}}"/>
                                                                                    <label class="radio-btn"
                                                                                           for="row-{{$group_answer->id}}-{{$key}}-{{$row->id}}">{{$row->answer->text}}
                                                                                    </label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        @break
                                                                        @case(2)
                                                                        <div type="2"
                                                                             group-ans-id="{{$group_answer->id}}"
                                                                             class="user-answers">
                                                                            <label for="_question-text">
                                                                                <select id="answer-{{$group_answer->id}}"
                                                                                        class="answer-{{$group_answer->id}}">
                                                                                    <option value="">Select One</option>
                                                                                    @foreach($item->rows as $key=>$row)
                                                                                        <option
                                                                                                {{$row->selected == 1 ? 'selected' : ''}}
                                                                                                row-id="{{$row->id}}"
                                                                                                id="row-{{$row->id}}"
                                                                                                name="group-{{$group_answer->id}}"
                                                                                                value="{{$row->id}}">{{$row->answer->text}}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <small></small>
                                                                            </label>
                                                                        </div>
                                                                        @break
                                                                        @case(3)
                                                                        <div type="3"
                                                                             group-ans-id="{{$group_answer->id}}"
                                                                             class="user-answers">
                                                                            @foreach($item->rows as $key=>$row)
                                                                                <div class="amswer-item">
                                                                                    <input
                                                                                            {{$row->selected == "1" ? 'checked' : ''}}
                                                                                            row-id="{{$row->id}}"
                                                                                            value="{{$row->id}}"
                                                                                            class="row-{{$group_answer->id}}"
                                                                                            id="row-{{$group_answer->id}}-{{$key}}-{{$row->id}}"
                                                                                            type="checkbox"/>
                                                                                    <label for="answer-{{$group_answer->id}}-{{$key}}-{{$row->id}}">{{$row->answer->text}}
                                                                                        <small></small>
                                                                                    </label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        @break
                                                                        @default
                                                                        <ul class="q-answer">
                                                                            @foreach($item->rows as $row_key=>$row )
                                                                                <li class="{{$row->selected ? 'trust' : ''}}">
                                                                                    <span>{{$row->answer->text}}</span>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endswitch
                                                                @endforeach
                                                            @endif
                                                            <img class="save-btn d-block m-auto pointer-event"
                                                                 src="{{asset('assets/images/member/svg/save-btn.svg')}}"
                                                                 alt="">
                                                        </li>
                                                        <li class="w-100 position-absolute _spinner-holder">
                                                            <div class="_spinner "></div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab7">
                                    <div class="box-body pl-15 pr-15 pb-20 activity mt-10">
                                        <div class="table-responsive">
                                            <div
                                                    id="task-profile" role="grid">
                                                <ul class="table-header align-items-center p-2 justify-content-between d-flex">

                                                    <li class="w-5 border-bottom-0 d-inline-block  sorting fs-14 font-w500"
                                                        tabindex="0"
                                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                                    >Status
                                                    </li>

                                                    <li class="w-60 border-bottom-0 d-inline-block sorting fs-14 font-w500"
                                                        tabindex="0">
                                                        Question
                                                    </li>


                                                    <li class="w-10 border-bottom-0 d-inline-block text-center sorting_disabled fs-14 font-w500"
                                                        rowspan="1" colspan="1">Action
                                                    </li>
                                                </ul>
                                                @foreach($form->items->where('position',1) as $key=>$item)
                                                    <ul item-id="{{$item->id}}"
                                                        class="p-2 position-relative table-row d-flex align-items-center justify-content-between flex-wrap overflow-hidden">

                                                        <li class="w-5">
                                                        <span class="badge  {{$item->status == 0 ? "badge-pink-light": ($item->status == 1 ? "badge-success" : ($item->status == 2 ? "badge-danger" : "badge-warning"))}}">
                                                            {{$item->getStatus()}}
                                                        </span>
                                                        </li>

                                                        <li class="w-60">

                                                                <span title="{{$key+1}}- {{$item->question->text}}"
                                                                      class="fs-12">
                                                               {{$key+1}}- {{$item->question->text}}
                                                       </span>
                                                        </li>

                                                        <li class="w-10 text-center">

                                                            <img width="60" style="cursor: pointer"
                                                                 class="edit-answer"
                                                                 src="{{asset('assets/images/member/svg/edit-btn.svg')}}"
                                                                 alt="">
                                                        </li>
                                                        <li class="w-100 mt-20 answers_box">
                                                            @if(isset($item->question->group_answers))
                                                                @foreach($item->question->group_answers as $group_answer)
                                                                    @switch($group_answer->type)
                                                                        @case(0)
                                                                        <div type="0"
                                                                             group-ans-id="{{$group_answer->id}}"
                                                                             class="user-answers">
                                                                            @foreach($item->rows as $key_rows=>$row)
                                                                                <div class="input-holder c-47">
                                                                                    <label for="answer-{{$group_answer->id}}-{{$key_rows}}-{{$row->id}}">
                                                                                        <input
                                                                                                row-id="{{$row->id}}"
                                                                                                id="row-{{$group_answer->id}}-{{$key_rows}}-{{$row->id}}"
                                                                                                class="row-{{$row->id}}"
                                                                                                value="{{$row->value}}"
                                                                                                name="_question-text"
                                                                                                type="text">
                                                                                        <small></small>
                                                                                    </label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        @break
                                                                        @case(1)
                                                                        <div type="1"
                                                                             group-ans-id="{{$group_answer->id}}"
                                                                             class="user-answers">
                                                                            @foreach($item->rows as $key=>$row)
                                                                                <div class="radio-item">
                                                                                    <input
                                                                                            {{$row->selected == '1' ? 'checked' : ''}}
                                                                                            row-id="{{$row->id}}"
                                                                                            id="row-{{$group_answer->id}}-{{$key}}-{{$row->id}}"
                                                                                            type="radio"
                                                                                            name="group-{{$group_answer->id}}"/>
                                                                                    <label class="radio-btn"
                                                                                           for="row-{{$group_answer->id}}-{{$key}}-{{$row->id}}">{{$row->answer->text}}
                                                                                    </label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        @break
                                                                        @case(2)
                                                                        <div type="2"
                                                                             group-ans-id="{{$group_answer->id}}"
                                                                             class="user-answers">
                                                                            <label for="_question-text">
                                                                                <select id="answer-{{$group_answer->id}}"
                                                                                        class="answer-{{$group_answer->id}}">
                                                                                    <option value="">Select One</option>
                                                                                    @foreach($item->rows as $key=>$row)
                                                                                        <option
                                                                                                {{$row->selected == 1 ? 'selected' : ''}}
                                                                                                row-id="{{$row->id}}"
                                                                                                id="row-{{$row->id}}"
                                                                                                name="group-{{$group_answer->id}}"
                                                                                                value="{{$row->id}}">{{$row->answer->text}}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <small></small>
                                                                            </label>
                                                                        </div>
                                                                        @break
                                                                        @case(3)
                                                                        <div type="3"
                                                                             group-ans-id="{{$group_answer->id}}"
                                                                             class="user-answers">
                                                                            @foreach($item->rows as $key=>$row)
                                                                                <div class="amswer-item">
                                                                                    <input
                                                                                            {{$row->selected == "1" ? 'checked' : ''}}
                                                                                            row-id="{{$row->id}}"
                                                                                            value="{{$row->id}}"
                                                                                            class="row-{{$group_answer->id}}"
                                                                                            id="row-{{$group_answer->id}}-{{$key}}-{{$row->id}}"
                                                                                            type="checkbox"/>
                                                                                    <label for="answer-{{$group_answer->id}}-{{$key}}-{{$row->id}}">{{$row->answer->text}}
                                                                                        <small></small>
                                                                                    </label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        @break
                                                                        @default
                                                                        <ul class="q-answer">
                                                                            @foreach($item->rows as $row_key=>$row )
                                                                                <li class="{{$row->selected ? 'trust' : ''}}">
                                                                                    <span>{{$row->answer->text}}</span>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endswitch
                                                                @endforeach
                                                            @endif
                                                            <img class="save-btn d-block m-auto pointer-event"
                                                                 src="{{asset('assets/images/member/svg/save-btn.svg')}}"
                                                                 alt="">
                                                        </li>
                                                        <li class="w-100 position-absolute _spinner-holder">
                                                            <div class="_spinner "></div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab10">
                                    <div class="box-body pl-15 pr-15 pb-20 mt-10">
                                        <div class="table-responsive">
                                            <div class="table-vcenter text-nowrap table-bordered border-bottom"
                                                 id="files-tables">

                                                <ul class="table-header align-items-center p-2 justify-content-between d-flex">

                                                    <li class="w-10 border-bottom-0 d-inline-block  sorting fs-14 font-w500"
                                                        tabindex="0"
                                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                                    >Name
                                                    </li>

                                                    <li class="w-10 border-bottom-0 d-inline-block sorting fs-14 font-w500"
                                                        tabindex="0">
                                                        File Name
                                                    </li>


                                                    <li class="w-5 border-bottom-0 d-inline-block text-center sorting_disabled fs-14 font-w500"
                                                        rowspan="1" colspan="1">Status
                                                    </li>

                                                    <li class="w-10 border-bottom-0 d-inline-block text-center sorting_disabled fs-14 font-w500"
                                                        rowspan="1" colspan="1">Progress
                                                    </li>

                                                    <li class="w-10 border-bottom-0 d-inline-block text-center sorting_disabled fs-14 font-w500"
                                                        rowspan="1" colspan="1">Actions
                                                    </li>
                                                </ul>

                                                <tbody>
                                                @foreach($form->documents as $key=>$document)
                                                    <ul item-id="{{$document->id}}"
                                                        class="p-2 position-relative table-row d-flex align-items-center justify-content-between flex-wrap overflow-hidden">
                                                        <li class="w-10">{{$document->name}}</li>
                                                        <li class="w-10">
                                                            <p class="font-weight-semibold file-name fs-14 mt-5">
                                                                {{$document->getFileName()}}
                                                            </p>

                                                            <div class="clearfix"></div>
                                                            <small class="text-muted">{{$document->create_at}}</small>
                                                        </li>
                                                        <li class="w-5">
                                                                <span class="badge status {{$document->status == 0 ? "badge-pink-light": ($document->status == 1 ? "badge-success" : ($document->status == 2 ? "badge-danger" : "badge-warning"))}}">
                                                            {{$document->getStatus()}}
                                                        </span>
                                                        </li>
                                                        <li class="w-10">
                                                            <div class="progress m-auto progress-sm">
                                                                <div class="progress-bar bg-primary">

                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="w-10 text-center">
                                                            <label for="doc-{{$document->id}}"
                                                                   file-type="{{$document->name}}"
                                                                   class="btn btn-primary upload-document">
                                                                Upload
                                                                <input
                                                                        accept="image/png, image/jpeg, application/pdf, image/x-eps"
                                                                        doc-id="{{$document->id}}"
                                                                        id="doc-{{$document->id}}"
                                                                        class="file-document" hidden type="file">

                                                            </label>
                                                        </li>

                                                        <li class="_spinner-holder position-absolute w-100">
                                                            <div class="_spinner"></div>
                                                        </li>
                                                    </ul>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab9">
                                    <div class="box-body pl-15 pr-15 pb-20 activity mt-10">
                                        <div class="table-responsive">
                                            <div id="task-profile" role="grid">
                                                <ul class="table-header align-items-center p-2 justify-content-between d-flex">

                                                    <li class="w-10 border-bottom-0 d-inline-block  sorting fs-14 font-w500"
                                                        tabindex="0" aria-controls="task-profile" rowspan="1"
                                                        colspan="1">PaymentID
                                                    </li>

                                                    <li class="w-10 border-bottom-0 d-inline-block sorting fs-14 font-w500"
                                                        tabindex="0">
                                                        ($)Amount
                                                    </li>


                                                    <li class="w-10 border-bottom-0 d-inline-block text-center sorting_disabled fs-14 font-w500"
                                                        rowspan="1" colspan="1">Payment Type
                                                    </li>

                                                    <li class="w-10 border-bottom-0 d-inline-block text-center sorting_disabled fs-14 font-w500"
                                                        rowspan="1" colspan="1">Due Date
                                                    </li>

                                                    <li class="w-10 border-bottom-0 d-inline-block text-center sorting_disabled fs-14 font-w500"
                                                        rowspan="1" colspan="1">Status
                                                    </li>


                                                </ul>
                                                <ul item-id="239"
                                                    class="p-2 position-relative table-row d-flex align-items-center justify-content-between flex-wrap overflow-hidden">

                                                    <li class="w-10">
                                                        <a href="#">#PAY-0298</a>
                                                    </li>

                                                    <li class="w-10">
                                                        <span class="font-weight-semibold">$298.00</span>
                                                    </li>

                                                    <li class="w-10 text-center">
                                                        Cash
                                                    </li>
                                                    <li class="w-10 text-center">
                                                        05-03-2021
                                                    </li>
                                                    <li class="w-10 text-center">
                                                        <span class="badge badge-danger-light">UnPaid</span>
                                                    </li>

                                                </ul>
                                                <ul item-id="239"
                                                    class="p-2 position-relative table-row d-flex align-items-center justify-content-between flex-wrap overflow-hidden">

                                                    <li class="w-10">
                                                        <a href="#">#PAY-0298</a>
                                                    </li>

                                                    <li class="w-10">
                                                        <span class="font-weight-semibold">$298.00</span>
                                                    </li>

                                                    <li class="w-10 text-center">
                                                        Cash
                                                    </li>
                                                    <li class="w-10 text-center">
                                                        05-03-2021
                                                    </li>
                                                    <li class="w-10 text-center">
                                                        <span class="badge badge-danger-light">UnPaid</span>
                                                    </li>

                                                </ul>
                                                <ul item-id="239"
                                                    class="p-2 position-relative table-row d-flex align-items-center justify-content-between flex-wrap overflow-hidden">

                                                    <li class="w-10">
                                                        <a href="#">#PAY-0298</a>
                                                    </li>

                                                    <li class="w-10">
                                                        <span class="font-weight-semibold">$298.00</span>
                                                    </li>

                                                    <li class="w-10 text-center">
                                                        Cash
                                                    </li>
                                                    <li class="w-10 text-center">
                                                        05-03-2021
                                                    </li>
                                                    <li class="w-10 text-center">
                                                        <span class="badge badge-danger-light">UnPaid</span>
                                                    </li>

                                                </ul>
                                                <ul item-id="239"
                                                    class="p-2 position-relative table-row d-flex align-items-center justify-content-between flex-wrap overflow-hidden">

                                                    <li class="w-10">
                                                        <a href="#">#PAY-0298</a>
                                                    </li>

                                                    <li class="w-10">
                                                        <span class="font-weight-semibold">$298.00</span>
                                                    </li>

                                                    <li class="w-10 text-center">
                                                        Cash
                                                    </li>
                                                    <li class="w-10 text-center">
                                                        05-03-2021
                                                    </li>
                                                    <li class="w-10 text-center">
                                                        <span class="badge badge-danger-light">UnPaid</span>
                                                    </li>

                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab12">
                                    <div class="">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-20">
                                                    <div class="form-group"><label class="form-label">Title</label>
                                                        <input class="form-control" placeholder="text"></div>
                                                </div>
                                                <div class="form-group mb-20"><label
                                                            class="form-label">Description:</label>
                                                    <textarea class="form-control" name="text" cols="30"
                                                              rows="10"></textarea>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="gr-btn"><a href="#" class="btn btn-primary btn-lg"
                                                               onclick="not1()">Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection