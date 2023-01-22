@extends('member.layout.login-master')

@section('head')
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/cpp/admin/login-admin.min.css') }}">--}}
    <title>Login In App - UtterVision</title>
    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render('re-1', {
                'sitekey' : '6Le-c9gfAAAAAK2Qi-PqR60sNKtzkjI8qmO46uQx',
                'callback' : (e)=>{verifyRegisterForm(e)},
                'theme' : 'green',
                'expired-callback': verifyExpireRegisterForm()
            });

            grecaptcha.render('le-1', {
                'sitekey' : '6Le-c9gfAAAAAK2Qi-PqR60sNKtzkjI8qmO46uQx',
                'callback' : (e)=>{verifyLoginForm(e)},
                'theme' : 'green',
                'expired-callback': verifyExpireLoginForm()
            });

        };
    </script>
    <link rel="stylesheet" href='{{asset('assets/css/cpp/member/member-login.min.css')}}'>
    <link rel="stylesheet" href='{{asset('assets/css/cpp/public/main.min.css')}}'>

@endsection

@section('foot')
    <script src="{{asset('assets/js/public/components/register-form.js')}}"></script>
    <script src="{{asset('assets/js/public/components/login-form.js')}}"></script>
    <script src="{{asset('assets/js/public/auth.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async defer>
    </script>
@endsection

@section('content')
    <div class="parent-login">
        <div class="login-page text-center">
            <div class="logo-parent-login">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/svg/main-logo.svg') }}" alt="">
                </a>
            </div>
            <div class="forms-holder d-inline-block">
                <div class="social-actions">
                    <a class="social-login" href="{{route('google.register')}}">
                        <img src="{{asset('assets/images/googlelogin.svg')}}" alt="google account">
                    </a>
                </div>

                @include('public.components.register-form')
                @include('public.components.login-form')

                <div class="partner-holder btn green-btn mb-2 w-100">
                    <a href="{{route('partner.login')}}">Are You Our Partner?</a>
                </div>

            </div>
            <div class="line-bottom-type">
                <div class="d-flex justify-content-center">
                    <div class="mx-md-3 mx-2">
                        <p class="text-white">
                            Student
                        </p>
                    </div>
                    <div class="mx-md-3 mx-2">
                        <p class="text-white">
                            Investor
                        </p>
                    </div>
                    <div class="mx-md-3 mx-2">
                        <p class="text-white">
                            Visitor
                        </p>
                    </div>
                    <div class="mx-md-3 mx-2">
                        <p class="text-white">
                            EX/SX
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


