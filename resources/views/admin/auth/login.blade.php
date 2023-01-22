@extends('admin.layout.login-master')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/cpp/admin/login-admin.min.css') }}">
    <title>Login To App - UtterVision</title>
@endsection

@section('foot')
    <script src="{{asset('assets/js/login-admin.js')}}" type="text/javascript"></script>
@endsection

@section('content')
    <div class="parent-login">
        <div class="login-page">
            <div class="logo-parent-login">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/svg/main-logo.svg') }}" alt="">
                </a>
            </div>
            <div class="text-top-login mt-5 pt-3">
                <div class="d-flex justify-content-center">
                    <div class="mx-1">
                        <h4>Memebrs Login</h4>
                    </div>
                    <div class="mx-1 mt-2">
                        <p class="p-0 my-auto">please login to your account</p>
                    </div>
                </div>
            </div>
            <div class="card card-login">
                <div class="_spinner">
                </div>
                <div class="card-body mt-4">
                    <form name="form">

                        <div class="form-group mb-3">
                            <label class="mb-2">E-mail</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-group-text-email">
                                        <img src="{{ asset('assets/images/Suche.svg') }}" alt="">
                                    </div>
                                </div>
                                <input name="email" type="text" class="form-control email" placeholder="your e-mail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-group-text-email">
                                        <img src="{{ asset('assets/images/Suche-2.svg') }}" alt="">
                                    </div>
                                </div>
                                <input name="password" type="password" class="form-control password"
                                       placeholder="your password">
                                <div class="input-group-append">
                                    <div class="input-group-text input-group-text-password">
                                        <img src="{{ asset('assets/images/Suche-3.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="error-login">

                            </p>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn-login btn-login-login">Login</button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between position-relative">
                            <div class="form-group mt-3 ml-3">
                                <label class="container-check footer-login">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </form>

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


