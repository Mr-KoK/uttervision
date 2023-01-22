@extends('member.layout.master')


@section('head')
    <title>Member Dashboard | UtterVision</title>
@endsection

@section('modal')
    @if(request()->get('utm')=='camp_first_login')

    @endif
@endsection

@section('foot')
    <script src="{{asset('assets/js/member/dashboard.js')}}"></script>
    @if(request()->get('utm')=='camp_first_login')
        <script>
            let timerInterval;
            Swal.fire({
                title: 'Your Account Ativiated!',
                text: 'Be Happy!',
                width: 600,
                padding: '3em',
                confirmButtonText:'Thanks',
                showConfirmButton: true,
                color: '#716add',
                background: '#fff url(/images/trees.png)',
                backdrop: `
    rgba(0,0,123,0.4)
    url("{{asset('assets/images/member/gif/nyan-cat.gif')}}")
    left top
    no-repeat
  `,   timer: 6000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            })
        </script>
    @endif
@endsection

@section('content')
    {{--    @if($user->isVerify())--}}


    <div class="main-content client">
        <div class="row">

            <div class="col-5 col-sm-12 visa-application">
                <div class="box" style="height: 100%">
                    @if(count($user->forms) > 0)
                        <div class="box-header p-0 d-block">
                            <div class="d-flex justify-content-end w-100">
                                <div class="dropdown d-inline-block">
                                    <button type="button" class="btn header-content-item waves-effect p-0"
                                            id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
										<span class="info d-xl-inline-block  color-span">
											switch to your other applications
											<span class="fs-20 font-w600 selected-counry">{{$user->forms[0]->country->name}}</span>
										</span> <i class='bx bx-chevron-down ml-10'></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        @foreach($user->forms as  $form)
                                            <button
                                                    class="dropdown-item select-form {{$form->id == $user->forms[0]->id ? 'selected' : ''}}"
                                                    question-process="{{$form->getQuestionPercent()}}"
                                                    document-process="{{$form->getDocumentPercent()}}"
                                                    review-process="{{$form->getReviewPercent()}}"
                                                    total-process="{{$form->getTotalFormCompliment()}}"
                                                    application-link="{{$form->getUserApplicantUrl()}}"
                                                    flag="{{$form->country->img}}"
                                            >
                                                <img
                                                        width="16"
                                                        height="12"
                                                        src="{{$form->country->img}}"
                                                        alt="UtterVision"
                                                        class="align-middle me-1">
                                                <span>{{$form->country->name}}</span>
                                            </button>
                                        @endforeach
                                        <div class="dropdown-divider">

                                        </div>
                                        <a class="dropdown-item text-danger" href="#add-new-visa">
                                            <i class="bx bx-plus font-size-16 align-middle me-1 text-danger">
                                            </i> <span>Apply for new</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="me-auto">
                                <h4 class="card-title m-0 fs-18 fw-normal">Your Recent <span class="color-9">Visa Application</span>
                                </h4>
                                <p class="fs-12">Continue to process your application for
                                    <strong>{{$user->name}}</strong></p>
                            </div>
                        </div>
                        <div class="box-body pt-0">
                            <div class="row">
                                <div class="col-xl-12 col-12 w-sm-100 mb-30">
                                    <div class="canvas-container m-auto">
                                        <canvas
                                                style="
                                                        display: block;
                                                        background-image: url({{$user->forms[0]->country->img}}) !important;
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
                                            <div data-percent="{{$user->forms[0]->getDocumentPercent()}}"
                                                 data-color="#D2D2D2" data-label="Documents"></div>
                                            <div data-percent="{{$user->forms[0]->getQuestionPercent()}}"
                                                 data-color="#ACCD00" data-label="Questions"></div>
                                            <div data-percent="{{$user->forms[0]->getReviewPercent()}}"
                                                 data-color="#DF88D9"
                                                 data-label="Review"></div>
                                            <div data-percent="100" data-color="#ABA7EC" data-label="Five Step"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-12 col-12 w-sm-100 mb-0">
                                    <div class="d-flex m-auto justify-content-center">
                                        <ul class="box-list mt-20 ml-18p">
                                            <li>
                                                <!-- <span class="bg-blue square"></span> -->
                                                <span class="pr-5 color-6 document-percent">{{$user->forms[0]->getDocumentPercent()}}%</span>Documents
                                            </li>
                                            <li>
                                                <!-- <span class="bg-success square"></span> -->
                                                <span class="pr-5 color-8 question-percent">{{$user->forms[0]->getQuestionPercent()}}%</span>
                                                Questions
                                            </li>
                                            <li>
                                                <!-- <span class="bg-warning square"></span> -->
                                                <span class="pr-5 color-9 review-percent">{{$user->forms[0]->getReviewPercent()}}%</span>
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
                        <div class="action justify-content-center w-100 text-center flex-wrap m-0">
                            <a href="{{$user->forms[0]->getUserApplicantUrl()}}"
                               class="invite rounded-pill col-sm-12 col-lg-12 col-xl-5">
                                <img width="20" src="{{asset('assets/images/member/svg/icon-application.svg')}}"
                                     alt="UtterVision"
                                     class="align-middle mr-5">
                                Application
                            </a>
                            <a href="javascript:void(0)" class=" add rounded-pill mt-5 col-sm-12 col-lg-12 col-xl-5">
                                <img width="23" src="{{asset('assets/images/member/svg/icon-passport.svg')}}"
                                     alt="UtterVision" class="align-middle mr-5">
                                Visa Process
                            </a>
                        </div>
                    @else
                        <h2 style="display: flex;opacity: .3; align-items: center;justify-content: center;height: 100%;">
                            No Form!
                        </h2>
                    @endif
                </div>
            </div>

            <div class="col-7 col-sm-12">
                <div class="row">
                    <div class="box">
                        <div class="box-header pt-0">
                            <div class="me-auto">
                                <h4 class="card-title m-0 fs-18 fw-normal">List Of The <span class="color-9">Previous Countries</span>
                                    You Have Applied For </h4>
                                <p class="fs-12">Continue to process your application for
                                    <strong>{{$user->name}}</strong></p>
                            </div>
                        </div>
                        <div class="box-body pb-0">
                            <div class="box-body pt-19">
                                <div class="row">
                                    @if(count($user->forms) > 0)
                                        @foreach($user->forms as $key=>$form)
                                            <div class="col-4 text-center mb-0 pd-0">
                                                <div class="icon-box">
                                                    <img
                                                            width="98"
                                                            height="72"
                                                            src="{{$key < 1 ?  asset('assets/images/member/svg/canada-flag-select.svg') :asset('assets/images/member/svg/usa-flag-select.svg')  }}"
                                                            alt="UtterVision" class="align-middle"></div>
                                                <h5 class="mb-2 fs-12 color-1 fw-light"> {{$form->getType()}} For
                                                    <strong>{{$form->country->name}}</strong></h5>
                                                <a href="{{$form->getUserApplicantUrl()}}"
                                                   class="action-btn">Continue</a>
                                            </div>
                                        @endforeach
                                        <div class="col-4 text-center mb-0 pd-0">
                                            <div class="icon-box">
                                                <img
                                                        width="98"
                                                        height="72"
                                                        src="{{asset('assets/images/member/svg/new-flag-select.svg')}}"
                                                        alt="UtterVision" class="align-middle"></div>
                                            <h5 class="mb-2 fs-12 color-1 fw-light"> Add Country For Get Visa</h5>
                                            <a href="#add-new-visa" class="action-btn">New Visa Process</a>
                                        </div>
                                    @else
                                        <div class="col-4 text-center mb-0 pd-0">
                                            <div class="icon-box">
                                                <img
                                                        src="{{asset('assets/images/member/svg/new-flag-select.svg')}}"
                                                        alt="UtterVision" class="align-middle"></div>
                                            <h5 class="mb-2 fs-12 color-1 fw-light"> Add Country For Get Visa</h5>
                                            <a href="#add-new-visa" class="action-btn">Add New Visa Process</a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-15">
                    <div class="box flex-wrap flex-lg-nowrap d-flex" style="height: 100%">
                        @if(count($user->forms) > 0)
                            <div class="mr-15">
                                <div class="box-header pt-10">
                                    <div class="me-auto">
                                        <h4 class="card-title m-0 fs-18 fw-normal">Visa Form <span
                                                    class="color-8">Completed</span></h4>
                                        <p class="fs-10">Selected Country Visa Process on questions & answers at a
                                            glance </p>
                                    </div>
                                </div>
                                <div class="box-body pb-0 mb-20 mt-34">
                                    <div class="box-body pt-19">
                                        <div class="d-flex">
                                            <span class="badge badge-success-light mr-10 rounded-pill">Step 01</span>
                                            <span
                                                    class="badge badge-success-light mr-10 rounded-pill">Step 02</span>
                                            <span class="badge badge-success-light mr-10 rounded-pill">Step 03</span>
                                            <span
                                                    class="badge badge-success-light mr-10 rounded-pill">Step 04</span>
                                        </div>
                                        <div class="d-flex mt-10">
                                            <span class="badge badge-success-light mr-10 rounded-pill">Step 05</span>
                                            <span class="badge badge-info-light mr-10 rounded-pill">Step 06</span>
                                            {{--                                        <span class="badge badge-success-light mr-10 rounded-pill">Step 03</span>--}}
                                            {{--                                        <span class="badge badge-success-light mr-10 rounded-pill">Step 04</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body d-flex justify-content-end">
                                <div class="progress-cicle m-auto flex-wrap justify-content-center d-flex">
                                    <div
                                            id="circle"
                                            class="chart-circle chart-circle-xll"
                                            data-value="0.{{$user->forms[0]->getTotalFormCompliment()}}"
                                            data-thickness="20">
                                        <div class="chart-circle-value">{{$user->forms[0]->getTotalFormCompliment()}}%
                                        </div>
                                    </div>
                                    <div class="title-progress fs-12 font-w600 mt-10 ml-10">
                                        <h5 class="fs-12 mb-0 mt-20 mt-lg-0 font-w500 color-text mt-28">On Progress<span
                                                    class="text-primary font-w600 pl-8 total-percent">{{$user->forms[0]->getTotalFormCompliment()}}%</span>
                                        </h5></div>
                                </div>

                            </div>
                        @else
                            <h2 style="width:100%;display: flex;opacity: .3; align-items: center;justify-content: center;height: 100%;">
                                No Form!
                            </h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-7 col-sm-12" id="add-new-visa">
                <div class="row">
                    <div class="box">
                        <div class="box-header pb-10">
                            <div class="me-auto right">
                                <h4 class="card-title m-0 fs-18 fw-normal">Select Country For <span
                                            class="color-10">Multiple Visa </span> Right Here </h4>
                                <p class="fs-12">to proceed or applying new Visa, please select the listed countries on
                                    the map </p>
                            </div>
                        </div>
                        <div class="box-body map-body">
                            {{--                                <div class="map-500" id="world-map"></div>--}}
                            <div class="map-blocks text-center mobile-map">
                                <img src="{{asset('assets/images/resources/map-1-1.png')}}" class="map-image"
                                     alt="world map"/>

                                @if( count($north_america_countries) > 0)
                                    <div style="top: 33%; left: 16%;" title="north-america"
                                         class="_pointer map-person-1 north-america">
                                        <div class="position-relative">
                                            <label for="american-area">
                                                <span class="map-point pulse-css"></span>
                                            </label>
                                            <ul>
                                                @foreach($north_america_countries as $key=>$country)
                                                    <li><a href="{{$country->getUrl()}}">
                                                            <img src="{{$country->img}}" alt="{{$country->name}}">
                                                            <span>{{$country->name}}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                @if( count($south_america_countries) > 0)
                                    <div style="top: 75%; left: 30%;" title="south-america"
                                         class="_pointer map-person-2 south-america">
                                        <div class="position-relative">
                                            <label for="american-area">
                                                <span class="map-point pulse-css"></span>
                                            </label>
                                            <ul>
                                                @foreach($south_america_countries as $key=>$country)
                                                    <li><a href="{{$country->getUrl()}}"><img src="{{$country->img}}"
                                                                                              alt="{{$country->name}}"><span>{{$country->name}}</span></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                @if( count($europe_countries) > 0)
                                    <div style="top: 32%; left: 55%;" title="europe"
                                         class="_pointer map-person-7 europe">
                                        <div class="position-relative">
                                            <label for="american-area">
                                                <span class="map-point pulse-css"></span>
                                            </label>
                                            <ul>
                                                @foreach($europe_countries as $key=>$country)
                                                    <li>
                                                        <a href="{{$country->getUrl()}}">
                                                            <img src="{{$country->img}}" alt="{{$country->name}}">
                                                            <span>{{$country->name}}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                @if( count($asia_countries) > 0)
                                    <div style="top: 34%; left: 73%;" title="asia" class="_pointer map-person-2 asia">
                                        <div class="position-relative">
                                            <label for="american-area">
                                                <span class="map-point pulse-css"></span>
                                            </label>
                                            <ul>
                                                @foreach($asia_countries as $key=>$country)
                                                    <li><a href="{{$country->getUrl()}}"><img src="{{$country->img}}"
                                                                                              alt="{{$country->name}}"><span>{{$country->name}}</span></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                @if( count($africa_countries) > 0)
                                    <div style="top: 60%; left: 50%;" title="africa"
                                         class="_pointer map-person-5 africa">
                                        <div class="position-relative">
                                            <label for="american-area">
                                                <span class="map-point pulse-css"/>
                                            </label>
                                            <ul>
                                                @foreach($africa_countries as $key=>$country)
                                                    <li><a href="{{$country->getUrl()}}"><img src="{{$country->img}}"
                                                                                              alt="{{$country->name}}"><span>{{$country->name}}</span></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                @if( count($australasia_countries) > 0)
                                    <div style="top: 79%; left: 77%;" title="australasia"
                                         class="_pointer map-person-5 australasia">
                                        <div class="position-relative">
                                            <label for="american-area">
                                                <span class="map-point pulse-css"></span>
                                            </label>
                                            <ul>
                                                @foreach($australasia_countries as $key=>$country)
                                                    <li>
                                                        <a href="{{$country->getUrl()}}">
                                                            <img src="{{$country->img}}" alt="{{$country->name}}">
                                                            <span>{{$country->name}}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5 col-sm-12 most-coment">
                <div class="box h-100">
                    <div class="box-header d-flex">
                        <div class="me-auto">
                            <h4 class="card-title m-0 fs-18 fw-normal">most common <span
                                        class="color-9">questions</span></h4>
                            <p class="fs-12">questions that asked by user commonly</p>
                        </div>

                        <div class="box-right d-flex">
                            <div class="icon-ratting">
                                <i class='bx bxs-star'></i>
                            </div>
                            <div class="dropdown ml-14">
                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown"
                                   aria-expanded="false"> <i class='bx bx-dots-vertical-rounded fs-22'></i> </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                       data-target="#delete_project"><i
                                                class="bx bx-trash"></i> Delete</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="bx bx-edit mr-5"></i>Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider m-0"></div>
                    <div class="box-body pt-20">
                        <ul>
                            <li>
                                <a href="#q-1" data-toggle="collapse" class="fs-12 font-w400 color-primary mb-13">
                                    1. do you Lorem ipsum
                                    dolor sit amet, consectetur adipiscing elit?
                                    <i class="bx bx-caret-down ml-10"></i>
                                </a>
                                <div id="q-1" class="collapse">
                                    <div class="box-ans">
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Commodi consequatur, cumque deleniti eum excepturi facilis maxime neque non odio placeat quae quam
                                            rerum ullam vitae, voluptas? Laboriosam, officia quia</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#q-2" data-toggle="collapse" class="fs-12 font-w400 color-primary mb-13">
                                    1. do you Lorem ipsum
                                    dolor sit amet, consectetur adipiscing elit?
                                    <i class="bx bx-caret-down ml-10"></i>
                                </a>
                                <div id="q-2" class="collapse">
                                    <div class="box-ans">
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Commodi consequatur, cumque deleniti eum excepturi facilis maxime neque non odio placeat quae quam
                                            rerum ullam vitae, voluptas? Laboriosam, officia quia</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#q-3" data-toggle="collapse" class="fs-12 font-w400 color-primary mb-13">
                                    1. do you Lorem ipsum
                                    dolor sit amet, consectetur adipiscing elit?
                                    <i class="bx bx-caret-down ml-10"></i>
                                </a>
                                <div id="q-3" class="collapse">
                                    <div class="box-ans">
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Commodi consequatur, cumque deleniti eum excepturi facilis maxime neque non odio placeat quae quam
                                            rerum ullam vitae, voluptas? Laboriosam, officia quia</span>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="text-center">
                        <button href="#" class="action-btn fs-15 p-3 ">Ask Your Own Questions</button>
                    </div>

                </div>
            </div>
        </div>
    </div>


    {{--    @else--}}

    {{--        <h1>Please Active Your Account!</h1>--}}


    {{--    @endif--}}

    {{--        <div class="row">--}}
    {{--            <div class="box">--}}
    {{--                <div class="box-header">--}}
    {{--                    <h4 class="card-title">Marker</h4>--}}
    {{--                </div>--}}
    {{--                <div class="box-body ">--}}
    {{--                    <div class="map-500" id="map-marker"></div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

@endsection