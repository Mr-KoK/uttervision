@extends('partner.layout.login-master')

@section('head')
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/cpp/admin/login-admin.min.css') }}">--}}
    <title>Login In App - UtterVision</title>
    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render('le-1', {
                'sitekey' : '6Le-c9gfAAAAAK2Qi-PqR60sNKtzkjI8qmO46uQx',
                'callback' : (e)=>{verifyLoginForm(e)},
                'theme' : 'green',
                'expired-callback': verifyExpireLoginForm()
            });
        };
    </script>
    <link rel="stylesheet" href='{{asset('assets/css/cpp/public/partner-login.min.css')}}'>
    <link rel="stylesheet" href='{{asset('assets/css/cpp/public/main.min.css')}}'>

@endsection

@section('foot')
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
                <br>
                <h5>Welcome To Partner Login</h5>
                <br>
                </div>
            <div class="forms-holder d-inline-block">
                @include('public.components.partner-login-form')
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


