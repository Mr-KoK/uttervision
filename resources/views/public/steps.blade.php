@extends('public.layout.master-home')

@section('head')
    <title>Steps UtterVision</title>
    <script type="text/javascript">
        var onloadCallback = function () {
            grecaptcha.render('re-1', {
                'sitekey': '6Le-c9gfAAAAAK2Qi-PqR60sNKtzkjI8qmO46uQx',
                'callback': (e) => {
                    verifyRegisterForm(e)
                },
                'theme': 'green',
                'expired-callback': verifyExpireRegisterForm()
            });

            grecaptcha.render('le-1', {
                'sitekey': '6Le-c9gfAAAAAK2Qi-PqR60sNKtzkjI8qmO46uQx',
                'callback': (e) => {
                    verifyLoginForm(e)
                },
                'theme': 'green',
                'expired-callback': verifyExpireLoginForm()
            });

        };
    </script>
    <link rel="stylesheet" href="{{asset('assets/css/cpp/public/steps.min.css?v=1.4')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/public/uttericon.min.css?v=1.4')}}">
    <meta name="description" content="Our Steps in UtterVision">

@endsection

@section('foot')
    <script src="{{asset('assets/js/public/main-public.js?v=1.4')}}"></script>
    <script src="{{asset('assets/js/public/components/login-form.js?v=1.4')}}"></script>
    <script src="{{asset('assets/js/public/components/register-form.js?v=1.4')}}"></script>
    <script src="{{asset('assets/js/public/step/step.js?v=1.4')}}"></script>
    @if(!(\Illuminate\Support\Facades\Auth::check()))
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                async defer>
        </script>
    @endif



@endsection

@section('content')

    <section class="top-banner">
        <div class="top-banner-holder"></div>
    </section>

    <section class="steps_section container">
        <input id="country_id" type="hidden" value="{{$country->id}}">
        <div class="steps-holder">
            <div class="top-steps-holder">
                <div class="top-steps d-flex justify-content-between">
                    <div class="left-border"></div>
                    <div class="visa-box">
                        <h3>Visa</h3>
                        <p>Online Assessment</p>
                    </div>
                    <div class="right-border"></div>
                </div>
            </div>
            <div class="main-steps-holder">
                <div class="main-steps d-flex justify-content-center">
                    <?php $last_key = 0 ?>
                    <div class="step step-visa-type text-center active" index="{{$last_key}}">
                        <p class="s-name">
                            Start
                        </p>
                        <small>
                            Select Visa Type
                        </small>
                    </div>
                    @foreach($steps as $key=>$step)
                        @if(count($step->questions)>0)
                            <div class="step part-2" index="{{$last_key+1}}">
                                <p class="s-name">
                                    Step {{$last_key+1}}
                                </p>
                                <small>
                                    {{$step->name}}
                                </small>
                            </div>
                        <?php $last_key = $last_key + 1 ?>
                        @endif
                    @endforeach
                    <div class="step part-2" index="{{$last_key+1}}">
                        <p class="s-name">
                            Step {{$last_key+1}}
                        </p>
                        <small>
                            Continue
                        </small>
                    </div>
                </div>
            </div>
            <div class="question-steps-holder">
                <div id="main-gs">
                    <?php $last_key = 0 ?>

                    <div class="group-step select-visa-type-body active" index="{{$last_key}}">
                        <div class="main-questions-holder main-select-type-visa">
                            <div class="questions panel-group" id="accordion-start" role="tablist" aria-multiselectable="true">
                                <div class="question quest my-2  active" >
                                    <div class="panel-heading" role="tab" id="headingOne-0">
                                        <div class="question-btn collapse-btn" role="button" data-toggle="collapse" data-parent="#accordion-start" href="#collapse-start" aria-expanded="true" aria-controls="collapse-start">
                                            <i class="icon-my_location q-icon"></i>
                                            <p class="question-text">
                                                Select Your Visa Type Then Continue!
                                            </p>
                                            <i class="fa fa-angle-up rotate-icon"></i>
                                        </div>
                                    </div>
                                    <div id="collapse-start" class="panel-collapse pt-3 collapse in show" role="tabpanel" aria-labelledby="headingOne-0-1">
                                        <div class="panel-body text-center">
                                            <div class="radio-item">
                                                <input
                                                        id="type-0"
                                                        type="radio"
                                                        name="visa-type"
                                                        value="0">
                                                <label class="radio-btn"
                                                       for="type-0">Student Visa
                                                </label>
                                            </div>

                                            <div class="radio-item">
                                                <input
                                                        id="type-1"
                                                        type="radio"
                                                        name="visa-type"
                                                        value="1">
                                                <label class="radio-btn"
                                                       for="type-1">Visitor Visa
                                                </label>
                                            </div>

                                            <div class="radio-item">
                                                <input
                                                        id="type-2"
                                                        type="radio"
                                                        name="visa-type"
                                                        value="2">
                                                <label class="radio-btn"
                                                       for="type-2">Job Offer Visa
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>




                        </div>
                    </div>

                    @foreach($steps as $key=>$step)
                        @if(count($step->questions)>0)
                            <div class="group-step" index="{{$last_key+1}}">
                            <div class="header-question-steps">
                                <p>Please answer the following questions accurately and completely.</p>
                                <h3>Online Assessment <span>Visa</span> Form!</h3>
                            </div>
                            <div class="main-questions-holder">
                                <div class="questions panel-group" id="accordion-{{$last_key+1}}" role="tablist"
                                     aria-multiselectable="true">
                                    @foreach($step->questions as $index=>$question)
                                        <div class="question quest my-2 active" question-id="{{$question->id}}">
                                            <div class="panel-heading" role="tab" id="headingOne-{{$index}}">
                                                <div class="question-btn collapse-btn"
                                                     role="button"
                                                     data-toggle="collapse"
                                                     data-parent="#accordion-{{$last_key+1}}"
                                                     href="#collapse-{{$index}}-{{$last_key+1}}"
                                                     aria-expanded="true"
                                                     aria-controls="collapse-{{$index}}-{{$last_key+1}}">
                                                    <i class="{{$question->icon}} q-icon"></i>
                                                    <p class="question-text">
                                                        {{$question->text}}
                                                    </p>
                                                    <i class="fa fa-angle-up rotate-icon"></i>
                                                </div>
                                            </div>
                                            <div id="collapse-{{$index}}-{{$last_key+1}}"
                                                 class="panel-collapse collapse in show"
                                                 role="tabpanel"
                                                 aria-labelledby="headingOne-{{$index}}-{{$last_key+1}}">
                                                <div class="panel-body">
                                                    @if(isset($question->group_answers) && count($question->group_answers) > 0)
                                                        @foreach($question->group_answers as $group_answer)
                                                            @include('public.components.step-answer')
                                                        @endforeach
                                                    @else
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                </div>
                <?php $last_key = $last_key + 1 ?>
                @endif
                @endforeach

                <div class="group-step login-step" index="{{$last_key+1}}">
                    <div class="header-question-steps">
                        <h3>Submit Your <span>Information</span></h3>
                    </div>
                    <div class="main-questions-holder">
                        @guest
                            <div class="actions-holder mb-25 text-center">

                                <div class="init-auth-step">

                                    <div class="init-auth-step-holder">
                                        <p>Do You Have Account With Us?!</p>
                                        <button type="button"
                                                class="login-action green-btn btn-login btn-login-login">
                                            Yes
                                        </button>
                                        <button type="button"
                                                class="register-action  white-btn btn-login btn-login-login">
                                            No
                                        </button>
                                    </div>
                                </div>

                                @include('public.components.register-form')

                                @include('public.components.login-form')

                            </div>
                        @endguest

                        @auth
                            <div class="action-holder text-center mb-25">
                                <button user-id="{{Auth::user()->id}}" class="submit-form btn btn__forthly">Go to
                                    Dashborad
                                </button>
                            </div>
                        @endauth
                    </div>
                </div>

            </div>

        </div>
        <div class="nav-btn">
            <button class="_prev">Prev</button>
            <button class="_next part-2">Next</button>
        </div>
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

    <section class="apply-visa py-3">
        <div class="apply-visa-holder d-flex align-items-center container">
            <h2 class="mr-3">Apply <span>Visa</span></h2>
            <p>Click To Watch Apply Visa Tour</p>
        </div>
    </section>


@endsection