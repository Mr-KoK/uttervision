<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="designer" content="Ali-Mansoury">
    <meta name="developer" content="Mehrdad-Hajiyani">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    @include('public.layout.head')

    @yield('head')
</head>

<body>

{{--<div class="preloader-activate preloader-active open_tm_preloader">--}}
{{--    <div class="preloader-area-wrap">--}}
{{--        <div class="spinner d-flex justify-content-center align-items-center h-100">--}}
{{--            <img src="{{asset('assets/images/resources/loading.gif')}}" class="img-fluid" alt="">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!--====================  header area ====================-->
<div class="header-area header-area--default flex-wrap">
    <!-- Header Top Wrap Start-->
    <div class="header-top-wrap w-100 theme-bg-lt-grren d-md-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <div class="header-right-box">
                        <div class="header-right-inner">
                            <div class="language-menu">
                                <ul>

                                    <a href="#" class="">
                                        LANGUAGE:
                                    </a>
                                    <li>
                                        <a href="#" class="">
                                            <img src="{{asset('assets/images/svg/en-lang.svg')}}" alt=""/>
                                            <span>ENG</span>
                                        </a>
                                        <ul class="ls-sub-menu">
                                            <li class=""><a href=" #"><span>FRENCH</span></a></li>
                                            <li class=""><a href=" #"><span>ARABIC</span></a></li>
                                            <li class=""><a href=" #"><span>HINDI</span></a></li>
                                            <li class=""><a href=" #"><span>MANDARIN CHINESE</span></a></li>
                                            <li class=""><a href=" #"><span>PORTUGUESE</span></a></li>
                                            <li class=""><a href=" #"><span>TURKISH</span></a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Header Top Wrap End -->

    <!-- Header Bottom Wrap Start -->
    <div class="header-bottom-wrap header-area--absolute  header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header default-menu-style position-relative">

                        <!-- brand logo -->
                        <div class="header__logo">
                            <a href="{{ url('/') }}">
                                <img src="{{asset('assets/images/svg/main-logo.svg')}}" class="img-fluid" alt="">
                            </a>
                        </div>

                        <!-- header midle box  -->
                        <div class="header-midle-box">
                            <div class="header-bottom-inner">
                                <div class="header-bottom-left-wrap ">
                                    <!-- navigation menu -->
                                    <div class="navbar navbar-expand-md navbar-light d-md-none d-lg-none">
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav ml-auto">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('home')}}">Home</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('about')}}">About</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('services')}}">Services</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('dev')}}">Blogs</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('contact')}}">Support</a>
                                                </li>
                                            </ul>
                                            <ul class=" d-md-none tow-tnm d-flex actions">
                                                @auth
                                                    <li><a href="{{route('member.dashboard')}}"
                                                           class="button button-secondary">Dashboard</a></li>
                                                    <li><a href="{{route('member.logout')}}" class="button">Logout</a>
                                                    </li>

                                                @endauth
                                                @guest
                                                    <li><a href="{{route('member.login')}}" class="button">Login Now</a>
                                                    </li>
                                                    <li><a href="{{route('member.register')}}"
                                                           class="button button-secondary">Register</a></li>
                                                @endguest

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="header__navigation d-none d-lg-block">
                                        <nav class="navigation-menu primary--menu">
                                            <ul>
                                                <li class="has-children active"><a
                                                            href="{{route('home')}}">Home</a></li>
                                                <li class="has-children"><a
                                                            href="{{route('about')}}">About</a></li>
                                                <li class="has-children"><a href="{{route('services')}}">Services</a>
                                                </li>
                                                <li class="has-children"><a href="{{route('contact')}}">Support</a>
                                                </li>
                                                <li class="has-children"><a href="{{route('dev')}}">Blogs</a>
                                                </li>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-mobile-view d-md-none">
                            <!--<div class="language-menu">
                                <ul>
                                    <li>
                                        <a href="#" class="">
                                            <img src="assets/images/svg/en-lang.svg" alt=""/><span>ENG</span>
                                        </a>
                                        <ul class="ls-sub-menu">
                                            <li class=""><a href="#"><span>FRENCH</span></a></li>
                                                <li class=""><a href="#"><span>ARABIC</span></a></li>
                                                <li class=""><a href="#"><span>HINDI</span></a></li>
                                                <li class=""><a href="#"><span>MANDARIN CHINESE</span></a></li>
                                                <li class=""><a href="#"><span>PORTUGUESE</span></a></li>
                                                <li class=""><a href="#"><span>TURKISH</span></a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>-->

                        </div>
                        <div class="header-right-box d-none d-sm-block">
                            <div class="header-right-inner" id="hidden-icon-wrapper1">
                                <!-- language-menu -->
                                <div class="language-menu">
                                    <ul>
                                        <li>
                                            <a href="#" class="">
                                                <img src="{{asset('assets/images/svg/en-lang.svg')}}"
                                                     alt=""/><span>ENG</span>
                                            </a>
                                            <ul class="ls-sub-menu">
                                                <li class=""><a href=" #"><span>FRENCH</span></a></li>
                                                <li class=""><a href=" #"><span>ARABIC</span></a></li>
                                                <li class=""><a href=" #"><span>HINDI</span></a></li>
                                                <li class=""><a href=" #"><span>MANDARIN
                                                                CHINESE</span></a></li>
                                                <li class=""><a href=" #"><span>PORTUGUESE</span></a>
                                                </li>
                                                <li class=""><a href=" #"><span>TURKISH</span></a>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!--<div class="col-md-2 col-1"> <img src="assets/images/svg/canada-flag.svg" class="img-fluid" alt=""> </div>-->
                                @guest
                                    <div class="col-md-4 col-5"><a href="{{ route('member.login') }}"
                                                                   class="btn btn__secondary">login</a></div>
                                    <div class="col-md-4 col-5"><a href="{{ route('member.register') }}"
                                                                   class="btn btn__forthly"
                                                                   title="login to UtterVision">
                                            Register</a></div>
                                @endguest
                                @auth
{{--                                    <div class="col-md-4 col-5"><a href="{{ route('member.logout') }}"--}}
{{--                                                                   class="btn btn__secondary">Logout</a></div>--}}
{{--                                    <div class="col-md-4 col-5"><a href="{{ route('member.dashboard') }}"--}}
{{--                                                                   class="btn btn__forthly"--}}
{{--                                                                   title="login to UtterVision">--}}
{{--                                            Dashboard</a></div>--}}
{{--                                    <div>--}}
{{--                                        <div class="profile-user">--}}
{{--                                            <img width="45" height="45" src="{{\Illuminate\Support\Facades\Auth::user()->img ?: asset('assets/images/admin/icons/avatar-placeholder.png')}}"--}}
{{--                                                 alt="{{\Illuminate\Support\Facades\Auth::user()->name}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                <div class="profile-user language-menu d-flex align-items-center">
                                    <div>Welcome <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span></div>
                                    <ul class="ml-3">
                                        <li>
                                            <a href="#" class="">
                                                <img width="45" height="45" src="{{\Illuminate\Support\Facades\Auth::user()->img ?: asset('assets/images/admin/icons/avatar-placeholder.png')}}"
                                                     alt="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                            </a>
                                            <ul class="ls-sub-menu">
                                                <li class=""><a href="{{route('member.dashboard')}}"><span>Dashboard</span></a></li>
                                                <li class=""><a href="{{route('member.profile')}}"><span>My Application</span></a></li>
                                                <li class=""><a href="{{route('member.profile')}}"><span>Profile</span></a></li>
                                                <li class=""><a href="{{route('member.logout')}}"><span>Logout</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                @endauth

                            </div>
                        </div>
                        <button class="mobile-navigation-icon d-block d-lg-none navbar-toggler" type="button"
                                id="mobile-menu-trigger" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <i></i>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Wrap End -->
</div>
<!--====================  End of header area  ====================-->

@yield('content')

<!--====================  footer desktop area ====================-->
<div class="footer-area-wrapper footer-desktop">
    <div class="footer-area section-space py-5">
        <div class="container pt-5">
            <div class="row footer-widget-wrapper">
                <div class="col-lg-9 col-md-4 col-sm-6 footer-widget row">
                    <div class="top-columns w-100 d-flex justify-content-center align-items-center">
                        <p class="mb-0">RECEIVE EMAIL UPDATES</p>
                        <label class="mb-0 " for="sup-email-footer">
                            <input id="sup-email-footer" placeholder="Your Email Address" type="email">
                        </label>
                        <button class="btn btn__forthly">
                            Register FOR Weekly Newsletter
                        </button>
                    </div>
                    <div class="footer-columns w-100 row">
                        <div class="col-lg-3 col-md-12 col-sm-12 footer-widget-coustom-col footer-widget">
                            <h4 class="footer-widget__title">Countries</h4>
                            <ul class="footer-widget__item-list">

                                @foreach($list_countries as $number=>$country)
                                    <li><a href="{{$country->getUrl()}}"
                                           class="hover-style-link">{{$country->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>


                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <h4 class="footer-widget__title">Company</h4>
                            <ul class="footer-widget__item-list">
                                <li><a href="{{ route('about') }}"
                                       class="hover-style-link">About us</a>
                                </li>
                                <li><a href="{{ route('services') }}"
                                       class="hover-style-link">Services</a>
                                </li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Careers</a>
                                </li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Blog</a></li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Leadership</a>
                                </li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Support</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <h4 class="footer-widget__title">Resources</h4>
                            <ul class="footer-widget__item-list">
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Discover</a>
                                </li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Visa</a></li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Travel
                                        Document</a></li>
                            </ul>
                            <h4 class="footer-widget__title">Legal</h4>
                            <ul class="footer-widget__item-list">
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Terms &
                                        Conditions</a></li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Privacy &
                                        Cookies </a></li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Terms of
                                        use</a></li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Utter Vision
                                        Fees</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <h4 class="footer-widget__title">Visas</h4>
                            <ul class="footer-widget__item-list">
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Tourist
                                        Visa</a></li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Work Visa</a>
                                </li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Student
                                        Visa</a></li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Business
                                        Visa</a></li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Nonimmigration
                                        Visa</a></li>
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Travel
                                        Document</a></li>
                            </ul>
                            <h4 class="footer-widget__title">Account </h4>
                            <ul class="footer-widget__item-list">
                                <li><a href="{{ route('contact') }}"
                                       class="hover-style-link">Manage Your
                                        Accoount</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 footer-widget">
                    <div class="footer-widget__logo text-center mb-20">
                        <img src="{{asset('assets/images/svg/footer-loho.svg')}}" class="img-fluid img-size-4" alt="">
                    </div>
                    <div class="footer-widget__list">
                        <div class="footer-widget-dic social-widget mt-30">
                            <p class="widget-title">Social</p>
                            <ul class="list ht-social-networks ">
                                <li class="item">
                                    <a href="https://facebook.com" target="_blank">
                                        <i class="fa fa-facebook-f link-icon"></i>
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="https://twitter.com" target="_blank">
                                        <i class="fa fa-twitter link-icon"></i>
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="https://instagram.com" target="_blank">
                                        <i class="fa fa-instagram link-icon"></i>
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="https://linkedin.com" target="_blank">
                                        <i class="fa fa-linkedin link-icon"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="single-footer-widger position-relative">
                            <p class="widget-title with-dots">SUPPORT CENTER</p>
                        </div>
                        <div class="single-footer-widger position-relative">
                            <p class="widget-title with-dots">COMPANY</p>
                        </div>

                        <div class="single-footer-widger">
                            <p class="footer-address">120 Eglinton Ave E, Toronto,
                                ON M4P 1E2, 75 Marjory Avenue M4M 2Y2</p>
                        </div>

                        <div class="single-footer-widger contact-call-widget">
                            <div class="d-flex align-items-end">
                                <img src="{{asset('assets/images/svg/head-set.svg')}}" alt="contact us">
                                <div class="text-holder">
                                    <p>Fell Free To Call Support</p>
                                    <span>+14379884261</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="footer-copyright-area mt-25 mb-25">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <span class="copyright-text">Copyright © 2021  <a href="https://UtterVision.com/" target="_blank">Utter Vision</a> Inc. an Online Visa Registration companies. All rights reserved. </span>
                </div>
                <div class="accessory_footer">
                    <ul>
                        <li><a href="{{route('dev')}}">Acknowledgements</a></li>
                        <li><a href="{{route('dev')}}">Froud Center</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====================  End of footer desktop area  ====================-->

<!--====================  footer mobile area ====================-->
<div class="footer-area-wrapper footer-mobile">
    <div class="footer-area section-space">
        <div class="top-footer-holder">
            <img src="{{asset('assets/images/svg/footer-loho.svg')}}" alt="UtterVision">
            <ul class="list ht-social-networks ">
                <li class="item">
                    <a href="https://facebook.com" target="_blank">
                        <i class="fa fa-facebook-f link-icon"></i>
                    </a>
                </li>
                <li class="item">
                    <a href="https://twitter.com" target="_blank">
                        <i class="fa fa-twitter link-icon"></i>
                    </a>
                </li>
                <li class="item">
                    <a href="https://instagram.com" target="_blank">
                        <i class="fa fa-instagram link-icon"></i>
                    </a>
                </li>
                <li class="item">
                    <a href="https://linkedin.com" target="_blank">
                        <i class="fa fa-linkedin link-icon"></i>
                    </a>
                </li>
            </ul>
            <div id="accordion" class="support-foot-collapse">
                <div class="card-header collapse-btn" id="support-heading-1">
                    <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true"
                       aria-controls="collapse-1">
                        Support
                    </a>
                </div>
                <div id="collapse-1" class="collapse" data-parent="#accordion"
                     aria-labelledby="heading-1">
                    <ul class="card-body">
                        <li class="card-item">
                            <a href="{{route('contact')}}">Chat With Experts</a>
                        </li>
                        <li class="card-item">
                            <a href="{{route('contact')}}">Direct Line</a>
                        </li>
                        <li class="card-item">
                            <a href="{{route('contact')}}">Troubleshoot</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="single-footer-widger">
                <p class="footer-address">120 Eglinton Ave E, Toronto,
                    ON M4P 1E2, 75 Marjory Avenue M4M 2Y2</p>
            </div>
        </div>
        <div class="mobile-collapses" id="accordion-mobile">
            <div class="card-header" id="collapse-2">
                <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#foot-collapse-2"
                       aria-expanded="true"
                       aria-controls="foot-collapse-2">
                        VISAS
                    </a>
                </h5>
            </div>
            <div id="foot-collapse-2" class="collapse" data-parent="#accordion-mobile"
                 aria-labelledby="heading-2">
                <ul class="card-body">
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Tourist
                            Visa</a></li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Work Visa</a>
                    </li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Student
                            Visa</a></li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Business
                            Visa</a></li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Nonimmigration
                            Visa</a></li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Travel
                            Document</a></li>
                </ul>
            </div>

            <div class="card-header" id="collapse-1">
                <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#foot-collapse-1"
                       aria-expanded="true"
                       aria-controls="foot-collapse-1">
                        Countries
                    </a>
                </h5>
            </div>
            <div id="foot-collapse-1" class="collapse" data-parent="#accordion-mobile"
                 aria-labelledby="heading-1">
                <ul class="card-body">
                    @foreach($list_countries as $number=>$country)
                        <li><a href="{{$country->getUrl()}}"
                               class="hover-style-link">{{$country->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="card-header" id="collapse-3">
                <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#foot-collapse-3"
                       aria-expanded="true"
                       aria-controls="foot-collapse-3">
                        Resources
                    </a>
                </h5>
            </div>
            <div id="foot-collapse-3" class="collapse" data-parent="#accordion-mobile"
                 aria-labelledby="heading-3">
                <ul class="card-body">
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Discover</a>
                    </li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Visa</a></li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Travel
                            Document</a></li>
                </ul>
            </div>

            <div class="card-header" id="collapse-4">
                <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#foot-collapse-4"
                       aria-expanded="true"
                       aria-controls="foot-collapse-4">
                        COMPANY
                    </a>
                </h5>
            </div>
            <div id="foot-collapse-4" class="collapse" data-parent="#accordion-mobile"
                 aria-labelledby="heading-4">
                <ul class="card-body">
                    <li><a href="{{ route('about') }}"
                           class="hover-style-link">About us</a>
                    </li>
                    <li><a href="{{ route('services') }}"
                           class="hover-style-link">Services</a>
                    </li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Careers</a>
                    </li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Blog</a></li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Leadership</a>
                    </li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Support</a>
                    </li>
                </ul>
            </div>

            <div class="card-header" id="collapse-5">
                <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#foot-collapse-5"
                       aria-expanded="true"
                       aria-controls="foot-collapse-5">
                        Account
                    </a>
                </h5>
            </div>
            <div id="foot-collapse-5" class="collapse" data-parent="#accordion-mobile"
                 aria-labelledby="heading-5">
                <ul class="card-body">
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Manage Your
                            Accoount</a></li>
                </ul>
            </div>

            <div class="card-header" id="collapse-6">
                <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#foot-collapse-6"
                       aria-expanded="true"
                       aria-controls="foot-collapse-6">
                        Legal
                    </a>
                </h5>
            </div>
            <div id="foot-collapse-6" class="collapse" data-parent="#accordion-mobile"
                 aria-labelledby="heading-6">
                <ul class="card-body">
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Terms &
                            Conditions</a></li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Privacy &
                            Cookies </a></li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Terms of
                            use</a></li>
                    <li><a href="{{ route('contact') }}"
                           class="hover-style-link">Utter Vision
                            Fees</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="footer-copyright-area mb-25">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <span class="copyright-text">Copyright © 2021  <a href="https://UtterVision.com/" target="_blank">Utter Vision</a> Inc. an Online Visa Registration companies. All rights reserved. </span>
                </div>
                <div class="accessory_footer">
                    <ul>
                        <li><a href="{{route('dev')}}">Acknowledgements</a></li>
                        <li><a href="{{route('dev')}}">Froud Center</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====================  End of footer mobile area  ====================-->
<div class="_notifications">
    <div class="_notifications-holder"></div>
</div>
<!--====================  scroll top ====================-->
<a href="#" class="scroll-top" id="scroll-top">
    <i class="arrow-top fa fa-angle-double-up"></i>
    <i class="arrow-bottom fa fa-angle-double-up"></i>
</a>
<!--====================  End of scroll top  ====================-->

<!--====================  mobile menu overlay ====================-->
{{--@include('layout.mobile-menu')--}}
<!--====================  End of mobile menu overlay  ====================-->


<!-- JS
   ============================================ -->
<!-- Modernizer JS -->
<script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

<!-- jQuery JS -->
<script src="{{asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>

<!-- Bootstrap JS -->
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>

<!-- Swiper Slider JS -->
<script src="{{asset('assets/js/plugins/swiper.min.js')}}"></script>

<!-- Waypoints JS -->
<script src="{{asset('assets/js/plugins/waypoints.min.js')}}"></script>

<!-- Counter down JS -->
<script src="{{asset('assets/js/plugins/countdown.min.js')}}"></script>

<!-- Isotope JS -->
<script src="{{asset('assets/js/plugins/isotope.min.js')}}"></script>

<!-- Masonry JS -->
<script src="{{asset('assets/js/plugins/masonry.min.js')}}"></script>

<!-- ImagesLoaded JS -->
<script src="{{asset('assets/js/plugins/images-loaded.min.js')}}"></script>

<!-- Counterup JS -->
<script src="{{asset('assets/js/plugins/counterup.min.js')}}"></script>

<!-- WOW JS -->
<script src="{{asset('assets/js/plugins/wow.min.js')}}"></script>

<!-- AOS JS -->
<script src="{{asset('assets/js/plugins/aos.js')}}"></script>

<!-- Some plugins JS -->
<script src="{{asset('assets/js/plugins/some-plugins.js')}}"></script>
<script src="{{asset('assets/js/plugins/plugins.min.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

@yield('foot')
</body>
<script>
    if (`{{ app('request')->input('slug') }}`) {
        $.ajax({
            url: "/login-email",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            data: {
                id: `{{ app('request')->input('id') }}`,
                slug: `{{ app('request')->input('slug') }}`,
            },
            success: function (data) {
                console.log(data);
                location.href = "/member/dashboard";
            },
            error: function (error) {
                console.log(error);
                $('.preloader').addClass('d-none')
            }
        })
    }
</script>

</html>