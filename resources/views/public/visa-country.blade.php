@extends('public.layout.master-home')

@section('head')
    <title>{{$country->title}}</title>
    <meta name="description" content="{{$country->meta_description}}">
    <meta name="keywords" content="{{$country->meta_keyword}}">
    <meta name="author" content="{{$country->admin->name}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/public/get-visa-country.min.css?v=1.4')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/public/uttericon.min.css')}}">
@endsection

@section('foot')
    <script src="{{asset('assets/js/public/country/country.js')}}"></script>
@endsection

@section('content')
    <style>
        @media only screen and (max-width: 767px)  {
            .top-information-holder {
                {{--background-image:url({{$country->cover_img_mobile}});--}}
            }
        }
        @media only screen and (min-width: 768px) {
            .top-information-holder {
                background-image:url({{$country->cover_img}});
            }
        }
        
    </style>
    <section class="top-information-holder">
        <div class="top-information d-none d-md-block d-lg-block">
            <div class="text-holder container box effect5">
                <h1><img src="{{asset("assets/images/public/country/pre-text.png")}}" alt="path image"> Apply<span
                            class="small-text"> for a</span>
                    <br>
                    <strong>{{$country->name}} </strong>

                    <span class="green-text"> visa</span>
                </h1>
                <p>Reliable platform to simplify the visa process for everyone, everywhere</p>
                <div class="btns-holder">
                    <a target="_blank" class="green-btn"
                       href="{{route('steps','id='.$country->group_id.'&country='.$country->id)}}">Start The Visa
                        Process</a>
                    <a target="_blank" class="white-btn" href="{{route('dev')}}">Check My Eligibility</a>
                </div>
            </div>
        </div>
        <div class="top-information-mobile flex-column text-center d-flex flex-wrap d-md-none d-lg-none">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="img-holder ">
                <img src="{{$country->img}}" alt="">
            </div>
            <div class="logo-top col-12">
                <img src="{{asset('assets/images/svg/footer-loho.svg')}}" alt="">
            </div>

            <div class="action-process col-12">
                <h2>Get Ready To Apply for Your<br>
                    <strong>{{$country->name}}</strong>
                    <br><span class="green-text">VISA</span>
                </h2>
                <a class="d-block" href="#start-process-mobile">
                    <h3>Let's Go!</h3>
                    <div class="arrow">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>

            </div>

        </div>
    </section>
    <section class="five-step-holder ">
        <div class="brush-paint">
            <img src="{{asset('assets/images/public/country/brush-paint.png')}}" alt="brush paint">
        </div>
        <div class="five-step-header-text text-center  container">
            <small>We encourage you to do your visa process all by yourself</small>
            <h2>You Need To Go Through These Simple <span>5 Steps</span></h2>
        </div>
        <div class="steps d-flex flex-wrap container">
            <div class="step text-center">
                <div class="icon-holder">
                    <div class="icon">
                        <i class="icon-account"></i>
                    </div>
                </div>
                <div class="text-holder">
                    <p>Create Account</p>
                    <small>You must be logged into your own account to submit an application.</small>
                </div>
            </div>
            <div class="step text-center">
                <div class="icon-holder">
                    <div class="icon">
                        <i class="icon-upload"></i>
                    </div>
                </div>
                <div class="text-holder">
                    <p>Upload Your Document</p>
                    <small>There is a list of documents you need to submit in order to apply.</small>
                </div>
            </div>
            <div class="step text-center">
                <div class="icon-holder">
                    <div class="icon">
                        <i class="icon-dollar"></i>
                    </div>
                </div>
                <div class="text-holder">
                    <p>Pay The Fees</p>
                    <small>You will be asked to pay your fees. Your fees must be made with</small>
                </div>
            </div>
            <div class="step text-center">
                <div class="icon-holder">
                    <div class="icon">
                        <i class="icon-submit"></i>
                    </div>
                </div>
                <div class="text-holder">
                    <p>Submit Your Application</p>
                    <small>For ensuring that the documents you submit are correct</small>
                </div>
            </div>
            <div class="step text-center">
                <div class="icon-holder">
                    <div class="icon">
                        <i class="icon-passport"></i>
                    </div>
                </div>
                <div class="text-holder">
                    <p>Obatin Your Visa</p>
                    <small>We usually mail the new travel document to you.</small>
                </div>
            </div>

        </div>
    </section>
    <section class="video-section">
        <input type="hidden" value="{{$country->video}}" class="_video-src">
        <div class="video-section-holder container justify-content-between align-items-center d-flex flex-wrap">
            <div class="text-holder col-12 col-lg-5">
                <small>Find Out How The Process Works At Utter Vision!</small>
                <h2>Watch the <span>Video</span></h2>
                <p>Using A Straightforward Online Platform Only In A Few Minutes.
                    Using A Straightforward Online Platform Only In A Few Minutes.Using A Straightforward Online
                    Platform Only In A Few Minutes.
                    Using A Using A Straightforward Online Platform Only In A Few Minutes.</p>
            </div>
            <div class="video-holder col-12 col-lg-6">
                <div class="video-place">
                    <div class="video-container position-relative">
                        <div class="video">
                            <div class="_play">
                                <i class="fa fa-play"></i>
                            </div>
                            <div class="_glassy"></div>
                            <div class="video-placeholder" style="background-image: url({{$country->cover_img}})"></div>
                        </div>
                        <div class="shape"></div>
                        <img class="_shadow" src="{{asset('assets/images/public/country/shadow.png')}}"
                             alt="brush paint">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="start-process-desktop" class="ask-section text-center d-none d-lg-block d-md-block">

        <div class="ask-holder container position-relative">
            <div class="brush-paint position-absolute">
                <img src="{{asset('assets/images/public/country/brush-paint.png')}}" alt="brush paint">
            </div>
            <small>We encourage you to do your visa process all by yourself</small>
            <p>Ready To Start Your Journey?</p>
            <div class="btns-holder">
                <a class="green-btn" href="{{route('steps','id='.$country->group_id.'&country='.$country->id)}}">GET STARTED</a>
                <a class="white-btn" href="#">I HAVE Questions</a>
            </div>
        </div>

    </section>

    <section id="start-process-mobile" class="start-process-mobile d-block d-lg-none d-md-none">
        <div class="section-title text-center">
            <h2>Ready To apply for a visa?</h2>
        </div>
        <div class="body_x">
            <img class="text-center d-block m-auto" src="{{asset('assets/images/public/country/visa_img.svg')}}" alt="get visa process">
            <h3 class="text-center">#1 Most Reliable Worldwide Visa Central Platform</h3>
            <p class="text-center">we allow you to apply and obtain visa for one or multiple countries all in one place.</p>
            <a href="{{route('steps','id='.$country->group_id.'&country='.$country->id)}}" class="green-btn text-center">START THE VISA PROCESS</a>
            <a href="" class="text-center">CHECK YOUR ELIGIBILITY</a>
        </div>
    </section>

    <section class="help_section container">
        <div class="title-section d-flex align-items-center flex-wrap">
            <img width="300" height="auto" class="pr-1 title-img"
                 src="{{asset('assets/images/public/steps/help-steps.svg')}}" alt="help for steps">
            <div class="title-text">
                <h2>Need Help To Filling The <span>5 Step</span> Registery Form</h2>
                <small>At utter vision, we believe birth certificates must not be a privilege. And Immigration
                    is </small>
            </div>
        </div>
        <div class="main-section">
            <div class="holder-main-section">
                <ul class="panel-group accordion helps" id="accordion-help" role="tablist" aria-multiselectable="true">
                    <li class="d-flex align-items-center">
                        <div class="icon row-icon mr-4">
                            <i class="icon-account"></i>
                        </div>
                        <div class="row-info">
                            <div class="panel-heading" role="tab" id="headingOne-help-1">
                                <div
                                        class="help-btn collapse-btn d-flex align-items-center collapsed" role="button"
                                        data-target="#collapse-help-1"
                                        data-toggle="collapse"
                                        data-parent="#accordion-help"
                                        href="#collapse-help-1"
                                        aria-expanded="true"
                                        aria-controls="collapse-help-1">
                                    <p>Create Account?</p>
                                    <i class="fa fa-angle-up rotate-icon"></i>
                                </div>
                            </div>
                            <div
                                    id="collapse-help-1" class="panel-collapse collapse in"
                                    role="tabpanel"
                                    aria-labelledby="headingOne-help-1">
                                <div class="panel-body">
                                    <p>its a more information about create account</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="icon row-icon mr-4">
                            <i class="icon-upload"></i>
                        </div>
                        <div class="row-info">
                            <div class="panel-heading" role="tab" id="headingOne-help-2">
                                <div
                                        class="help-btn collapse-btn d-flex align-items-center collapsed" role="button"
                                        data-toggle="collapse" data-parent="#accordion-help"
                                        href="#collapse-help-2" aria-expanded="true"
                                        aria-controls="collapse-help-2">
                                    <p>Complete The Application?</p>
                                    <i class="fa fa-angle-up rotate-icon"></i>
                                </div>
                            </div>
                            <div
                                    id="collapse-help-2" class="panel-collapse collapse in"
                                    role="tabpanel"
                                    aria-labelledby="headingOne-help-2">
                                <div class="panel-body">
                                    <p>its a more information about create account</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="icon row-icon mr-4">
                            <i class="icon-dollar"></i>
                        </div>
                        <div class="row-info">
                            <div class="panel-heading" role="tab" id="headingOne-help-3">
                                <div
                                        class="help-btn collapse-btn d-flex align-items-center collapsed" role="button"
                                        data-toggle="collapse" data-parent="#accordion-help"
                                        href="#collapse-help-3" aria-expanded="true"
                                        aria-controls="collapse-help-3">
                                    <p>Pay The Fees?</p>
                                    <i class="fa fa-angle-up rotate-icon"></i>
                                </div>
                            </div>
                            <div
                                    id="collapse-help-3" class="panel-collapse collapse in"
                                    role="tabpanel"
                                    aria-labelledby="headingOne-help-3">
                                <div class="panel-body">
                                    <p>its a more information about create account</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="icon row-icon mr-4">
                            <i class="icon-submit"></i>
                        </div>
                        <div class="row-info">
                            <div class="panel-heading" role="tab" id="headingOne-help-4">
                                <div
                                        class="help-btn collapse-btn d-flex align-items-center collapsed" role="button"
                                        data-toggle="collapse" data-parent="#accordion-help"
                                        href="#collapse-help-4" aria-expanded="true"
                                        aria-controls="collapse-help-4">
                                    <p>Pick Up Your Visa?</p>
                                    <i class="fa fa-angle-up rotate-icon"></i>
                                </div>
                            </div>
                            <div
                                    id="collapse-help-4" class="panel-collapse collapse in"
                                    role="tabpanel"
                                    aria-labelledby="headingOne-help-4">
                                <div class="panel-body">
                                    <p>its a more information about create account</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="icon row-icon mr-4">
                            <i class="icon-passport"></i>
                        </div>
                        <div class="row-info">
                            <div class="panel-heading" role="tab" id="headingOne-help-5">
                                <div
                                        class="help-btn collapse-btn d-flex align-items-center collapsed" role="button"
                                        data-toggle="collapse" data-parent="#accordion-help"
                                        href="#collapse-help-5" aria-expanded="true"
                                        aria-controls="collapse-help-5">
                                    <p>Submit Your Visa?</p>
                                    <i class="fa fa-angle-up rotate-icon"></i>
                                </div>
                            </div>
                            <div
                                    id="collapse-help-5" class="panel-collapse collapse in"
                                    role="tabpanel"
                                    aria-labelledby="headingOne-help-5">
                                <div class="panel-body">
                                    <p>its a more information about create account</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

@endsection