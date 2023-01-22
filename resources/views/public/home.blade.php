@extends('public.layout.master-home')

@section('head')
    <link rel="stylesheet" href="/assets/css/cpp/public/home.min.css?v=1.4">
    <title>UtterVision - Invent Your Way</title>
@endsection

@section('content')

    <div class="site-wrapper-reveal overflow-hiden">

        <!--============ Hero Start ============-->
        <div class="hero-slider-wrap start-up-hero-wrap static-banner-one">
            <!-- <img src="assets/images/svg/header-bg.svg" class="static-banner-one__moc" alt="" /> -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="start-up-hero height-vh mgt-60">
                            <video class="bg-image cover-bg dsn-video d-none d-sm-block"
                                   style="width: 100%;height: auto;" preload="auto" autoplay loop muted playsinline>
                                <source src="assets/videos/intros.mp4" type="video/mp4">
                            </video>
                            <video class="bg-image cover-bg dsn-video d-md-none" style="width: 100%;height: auto;"
                                   preload="auto" autoplay loop muted playsinline>
                                <source src="assets/videos/intro-mobiles.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============ Hero End ============-->

        <!--========== Pane Area Start ============-->
        <div class="cta-image-area_pane mb-40">
            <div class="container">
                <div class="col" data-overlay="9"></div>
            </div>
        </div>
        <!--========== Pane Area End ============-->

        <section id="map-selector" class="map-style-one">
            <img src="assets/images/resources/map-shape-1-1.png" alt="" class="map-shape-1-1"/>

            <img src="assets/images/resources/map-shape-1-2.png" alt="" class="map-shape-1-2"/>
            <img src="assets/images/resources/map-shape-1-3.png" alt="" class="map-shape-1-3"/>
            <img src="assets/images/resources/map-shape-1-4.png" alt="" class="map-shape-1-4"/>
            <img src="assets/images/resources/map-shape-1-5.png" alt="" class="map-shape-1-5"/>
            <img src="assets/images/svg/location-gray.svg" alt="" class="map-location"/>

            <div class="container text-center">
                <div class="sec-title text-center mb-40">
                    <div class="about-us-content position-relative x-index-1 small-mt__10 tablet-mt__10 mt-0">
                        <div class="section-title-wrap mb-30">
                            <h3 class="mb-20 section-title text-capitalize">We Insist To Make The <span class="un-bdr">Visa</span>
                                Process, <br>Simple, Fast and Accessible For <strong>Everyone From Everywhere</strong>
                            </h3>
                            <h6 class="mb-10 section-title text-capitalize"><strong class="unp-bdr">Now You Can Apply
                                    For</strong> <br class=" d-md-none">
                                <span>
									<strong>United States <img src="assets/images/svg/flag-usa.svg"
                                                               class="img-fluid flags" alt=""></strong> ,
									<strong>Schengen <img src="assets/images/svg/flag-schengen.svg"
                                                          class="img-fluid flags" alt=""></strong> ,
									<strong>Canada <img src="assets/images/svg/flag-canada.svg" class="img-fluid flags"
                                                        alt=""></strong> <strong class=" d-md-none">,</strong>
									<strong>Russia <img src="assets/images/svg/flag-russia.svg" class="img-fluid flags"
                                                        alt=""></strong> ,
									<strong>India <img src="assets/images/svg/flag-india.svg" class="img-fluid flags"
                                                       alt=""></strong> ,
									<strong>Brazil <img src="assets/images/svg/flag-brazil.svg" class="img-fluid flags"
                                                        alt=""></strong> ,
									<strong>Australia <img src="assets/images/svg/flag-australia.svg"
                                                           class="img-fluid flags" alt=""></strong>
								</span>
                            </h6>
                        </div>
                    </div>
                    <span class="line-block "></span>
                </div><!-- /.sec-title -->

                <div class="map-blocks text-center">
                    <div class="section-title-wrap align-items-end">
                        <h6 class="mb-20 section-title text-capitalize op-map">Please select your destination
                            country.</h6>
                    </div>
                </div>
                <div class="map-blocks text-center desktop-map">


                    <img src="assets/images/resources/map-1-1.png" class="map-image" alt="world map"/>

                    @forelse($map_countries as $country)
                        @php
                            if (isset($country->points_map)){
                                $x = explode(',',$country->points_map)[0] ? explode(',',$country->points_map)[0] : 0 ;
                                $y = explode(',',$country->points_map)[1] ? explode(',',$country->points_map)[1] : 0;
                             }
                             else{
                                 $x =' 0' ;
                                 $y = '0';
                             }

                        @endphp
                        <div style="top:{{$x}}%;left:{{$y}}%" title="{{$country->title}}"
                             country-id="{{$country->id}}" class="map-person-1 _pointer">
                            <div class="position-relative">
                                <img src="assets/images/svg/map-point.svg" class="map-point pulse" alt=""/>
                                <div class="_point-info position-absolute">
                                    <div class="_top-info">
                                        <img class="_location"
                                             src="{{asset('assets/images/public/home/location-point.svg')}}"
                                             alt="{{$country->title}}">
                                        <img class="_flag" src="{{$country->img}}"
                                             alt="{{$country->title}}">
                                    </div>
                                    <div class="_bottom-info">
                                        <a href="{{$country->getUrl()}}" country-id="{{$country->id}}"
                                           class="btn-s _get-start">
                                            Get Started
                                        </a>
                                        <button country-id="{{$country->id}}" class="btn-l _get-learn">
                                            Learn More
                                        </button>
                                        <div class="_learn-more">
                                            <p class="one">{{$country->short_name}}</p>
                                            <p class="two">{{$country->abstract}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.map-person person-1 -->
                    @empty
                        <div title="Canada" country-id="1" class="map-person-1 _pointer">
                            <div class="position-relative">
                                <img src="assets/images/svg/map-point.svg" class="map-point pulse" alt=""/>
                                <div class="_point-info position-absolute">
                                    <div class="_top-info">
                                        <img class="_location" src="/assets/images/public/home/ca-location.svg"
                                             alt="canada">
                                    </div>
                                    <div class="_bottom-info">
                                        <button country-id="2" class="btn-s _get-start">
                                            Get Start
                                        </button>
                                        <button country-id="2" class="btn-l _get-learn">
                                            Learn More
                                        </button>
                                        <div class="_learn-more">
                                            <p class="one">more about travel</p>
                                            <p class="two">to this country</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.map-person person-1 -->
                        <div title="GreenLand" country-id="2" class="map-person-2 _pointer">
                            <div class="position-relative">
                                <img src="assets/images/svg/map-point.svg" class="map-point" alt=""/>
                                <div class="_point-info position-absolute">
                                    <div class="_top-info">
                                        <img class="_location" src="/assets/images/public/home/gl-location.svg"
                                             alt="canada">
                                    </div>
                                    <div class="_bottom-info">
                                        <button country-id="2" class=" btn-s _get-start">
                                            Get Start
                                        </button>
                                        <button country-id="2" class=" btn-l _get-learn">
                                            Learn More
                                        </button>
                                        <div class="_learn-more">
                                            <p class="one">more about travel</p>
                                            <p class="two">to this country</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.map-person person-1 -->
                        <div title="India" country-id="3" class="map-person-3 _pointer">
                            <div class="position-relative">
                                <img src="assets/images/svg/map-point.svg" class="map-point" alt="india visa"/>
                                <div class="_point-info position-absolute">
                                    <div class="_top-info">
                                        <img class="_location" src="/assets/images/public/home/in-location.svg"
                                             alt="canada">
                                    </div>
                                    <div class="_bottom-info">
                                        <button country-id="2" class=" btn-s _get-start">
                                            Get Start
                                        </button>
                                        <button country-id="2" class=" btn-l _get-learn">
                                            Learn More
                                        </button>
                                        <div class="_learn-more">
                                            <p class="one">more about travel</p>
                                            <p class="two">to this country</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.map-person person-1 -->
                        <div title="russian" country-id="4" class="map-person-4 _pointer">
                            <div class="position-relative">
                                <img src="assets/images/svg/map-point.svg" class="map-point" alt="russian visa"/>
                                <div class="_point-info position-absolute">
                                    <div class="_top-info">
                                        <img class="_location" src="/assets/images/public/home/ru-location.svg"
                                             alt="Russian Visa">
                                    </div>
                                    <div class="_bottom-info">
                                        <button country-id="2" class=" btn-s _get-start">
                                            Get Start
                                        </button>
                                        <button country-id="2" class=" btn-l _get-learn">
                                            Learn More
                                        </button>
                                        <div class="_learn-more">
                                            <p class="one">more about travel</p>
                                            <p class="two">to this country</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.map-person person-1 -->
                        <div title="Brazil" country-id="5" class="map-person-5 _pointer">
                            <div class="position-relative">
                                <img src="assets/images/svg/map-point.svg" class="map-point" alt=""/>
                                <div class="_point-info position-absolute">
                                    <div class="_top-info">
                                        <img class="_location" src="/assets/images/public/home/bz-location.svg"
                                             alt="canada">
                                    </div>
                                    <div class="_bottom-info">
                                        <button country-id="2" class=" btn-s _get-start">
                                            Get Start
                                        </button>
                                        <button country-id="2" class=" btn-l _get-learn">
                                            Learn More
                                        </button>
                                        <div class="_learn-more">
                                            <p class="one">more about travel</p>
                                            <p class="two">to this country</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.map-person person-1 -->
                        <div title="Sudan" country-id="6" class="map-person-6 _pointer">
                            <div class="position-relative">
                                <img src="assets/images/svg/map-point.svg" class="map-point" alt="Sudan Visa"/>
                                <div class="_point-info position-absolute">
                                    <div class="_top-info">
                                        <img class="_location" src="/assets/images/public/home/su-location.svg"
                                             alt="canada">
                                    </div>
                                    <div class="_bottom-info">
                                        <button country-id="2" class=" btn-s _get-start">
                                            Get Start
                                        </button>
                                        <button country-id="2" class=" btn-l _get-learn">
                                            Learn More
                                        </button>
                                        <div class="_learn-more">
                                            <p class="one">more about travel</p>
                                            <p class="two">to this country</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.map-person person-1 -->
                        <div title="Schengen" country-id="7" class="map-person-7 _pointer">
                            <div class="position-relative">
                                <img src="assets/images/svg/map-point.svg" class="map-point" alt="Schengen Visa"/>
                                <div class="_point-info position-absolute">
                                    <div class="_top-info">
                                        <img class="_location" src="/assets/images/public/home/eu-location.svg"
                                             alt="canada">
                                    </div>
                                    <div class="_bottom-info">
                                        <button country-id="2" class=" btn-s _get-start">
                                            Get Start
                                        </button>
                                        <button country-id="2" class=" btn-l _get-learn">
                                            Learn More
                                        </button>
                                        <div class="_learn-more">
                                            <p class="one">more about travel</p>
                                            <p class="two">to this country</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.map-person person-1 -->
                        <div title="Australia" country-id="8" class="map-person-8 _pointer">
                            <div class="position-relative">
                                <img src="assets/images/svg/map-point.svg" class="map-point" alt=""/>
                                <div class="_point-info position-absolute">
                                    <div class="_top-info">
                                        <img class="_location" src="/assets/images/public/home/as-location.svg"
                                             alt="Australia Visa">
                                    </div>
                                    <div class="_bottom-info">
                                        <button country-id="2" class=" btn-s _get-start">
                                            Get Start
                                        </button>
                                        <button country-id="2" class=" btn-l _get-learn">
                                            Learn More
                                        </button>
                                        <div class="_learn-more">
                                            <p class="one">more about travel</p>
                                            <p class="two">to this country</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.map-person person-1 -->
                    @endforelse
                </div>

                <!-- /.map-blocks -->

                <div class="map-blocks text-center mobile-map">
                    <img src="assets/images/resources/map-1-1.png" class="map-image" alt="world map"/>

                    @if( count($north_america_countries) > 0)
                        <div style="top: 24%; left: 19%;" title="north-america"
                             class="_pointer map-person-1 north-america">
                            <div class="position-relative">
                                <label for="american-area">
                                    <span class="map-point pulse"></span>
                                </label>
                                <ul>
                                    @foreach($north_america_countries as $key=>$country)
                                        <li><a href="{{$country->getUrl()}}"><img src="{{$country->img}}"
                                                                                  alt="{{$country->name}}"><span>{{$country->name}}</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if( count($south_america_countries) > 0)
                        <div style="top: 60%; left: 30%;" title="south-america"
                             class="_pointer map-person-2 south-america">
                            <div class="position-relative">
                                <label for="american-area">
                                    <span class="map-point pulse"></span>
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
                        <div style="top: 24%; left: 53%;" title="europe" class="_pointer map-person-7 europe">
                            <div class="position-relative">
                                <label for="american-area">
                                    <span class="map-point pulse"></span>
                                </label>
                                <ul>
                                    @foreach($europe_countries as $key=>$country)
                                        <li><a href="{{$country->getUrl()}}"><img src="{{$country->img}}"
                                                                                  alt="{{$country->name}}"><span>{{$country->name}}</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if( count($asia_countries) > 0)
                        <div style="top: 21%; left: 75%;" title="asia" class="_pointer map-person-2 asia">
                            <div class="position-relative">
                                <label for="american-area">
                                    <span class="map-point pulse"></span>
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
                        <div style="top: 46%; left: 49%;" title="africa" class="_pointer map-person-5 africa">
                            <div class="position-relative">
                                <label for="american-area">
                                    <span class="map-point pulse"/>
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
                        <div style="top: 69%; left: 79%;" title="australasia" class="_pointer map-person-5 australasia">
                            <div class="position-relative">
                                <label for="american-area">
                                    <span class="map-point pulse"></span>
                                </label>
                                <ul>
                                    @foreach($australasia_countries as $key=>$country)
                                        <li><a href="{{$country->getUrl()}}"><img src="{{$country->img}}"
                                                                                  alt="{{$country->name}}"><span>{{$country->name}}</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>
                <!-- /.map-blocks -->
{{--                <div class="button-block text-center">--}}
{{--                    <a class="btn btn__secondary"--}}
{{--                       href="/steps"--}}
{{--                       target="_blank">How It Works</a>--}}
{{--                </div>--}}
                <!-- /.btn-block -->
            </div>
        </section>

        <!--========== Call to Action Area Start ============-->
        <div class="cta-image-area_one mb-40">
            <div class="container">
                <div class="col" data-overlay="9">
                    <div class="row align-items-center cta-holers">
                        <div class="col-xl-4 col-lg-4 small-mt__30">
                            <div class="cta-button-group--one text-center text-lg-right">
                                <a href="{{ url('https://uttervision.com/under-counstruction.html') }}"
                                   class="btn btn__thirdly">Register
                                    Now</a>
                                <a href="{{ url('https://uttervision.com/under-counstruction.html') }}"
                                   class="btn btn__secondary">Go to my
                                    account</a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="cta-content text-lg-left text-center">
                                <h5 class="mb-15">Want to process your application and see your eligibility?
                                    <br>
                                    Become a member and use our powerful platform to customize your options
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========== Call to Action Area End ============-->


    {{--    <div class="banner-lozi-shape d-none d-sm-block">--}}
    {{--        <img src="assets/images/svg/footer-bg.svg" class="banner-lozi-shape__footer" alt="" />--}}
    {{--    </div>--}}

    <!--============ Immigration Area Start ============-->
        <div class="banner-lozi-shape section-space--ptb_30 mt-40">
            <img src="assets/images/svg/content-bg.svg" class="banner-lozi-shape__lozi" alt=""/>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 dots-offset">
                        <div class="about-image" data-aos="fade-right">
                            <div class="inner-images text-center"><img src="assets/images/gif/travel.gif"
                                                                       class="img-fluid img-size-1" alt="Image"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 pl-lg-0">
                        <div class="about-us-content position-relative x-index-1 small-mt__40 tablet-mt__40">
                            <div class="section-title-wrap">
                                <div class="text-left section-title-srv mb-30">
                                    <h1 class="mb-20 section-title-srv__immigration">TOURIST <span>Visa</span></h1>
                                    <h6 class="section-sub-title text-right">TRAVELING SOON? <br>--PERFECT.</h6>
                                </div>

                                <p class="mb-20 font-weight--light">Apply for multiple countries' tourist visas <strong>ALL-BY-YOURSELF</strong>
                                    using a straightforward online platform just in <strong>a few minutes</strong>. </p>
                                <div class="about-us-btn-box text-center"><a href="#map-selector"
                                                                             class="btn btn__secondary">Apply Now</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============ Immigration Area End ============-->

        <!--============ School Area Start ============-->
        <div class="banner-lozi-shape section-space--ptb_30 mgt-80">
            <img src="assets/images/svg/content-bg.svg" class="banner-lozi-shape__lozy" alt=""/>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 dots-offset d-md-none">

                        <img src="assets/images/svg/svg-bg.svg" class="banner-img-shapes img-size-2" alt=""/>
                        <div class="about-image" data-aos="fade-left">
                            <div class="inner-images text-center"><img src="assets/images/gif/school.gif"
                                                                       class="img-fluid img-size-2" alt="Image"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 pl-lg-0">
                        <div class="about-us-content position-relative x-index-2 small-mt__40 tablet-mt__40">
                            <div class="cta-holers section-title-wrap">
                                <div class="text-left section-title-srv mb-30">
                                    <h1 class="mb-20 section-title-srv__student">Students <span>Visa</span></h1>
                                    <h6 class="section-sub-title">STUDYING ABROAD?! GET IT DONE.</h6>
                                </div>
                                <p class="mb-20 font-weight--light">Easily submit all your documents for your Student
                                    visa and make sure you'll have it before your school starts. </p>
                                <div class="about-us-btn-box text-center"><a href="#map-selector"
                                                                             class="btn btn__secondary">Apply Now</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 dots-offset d-none d-sm-block">
                        <img src="assets/images/svg/svg-bg.svg" class="banner-img-shapes img-size-2" alt=""/>
                        <div class="about-image" data-aos="fade-left">
                            <div class="inner-images text-right"><img src="assets/images/gif/school.gif"
                                                                      class="img-fluid img-size-2" alt="Image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============ School Area End ============-->

        <!--============ Travel Area Start ============-->
        <div class="banner-lozi-shape section-space--ptb_30 mgt-80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 dots-offset">
                        <img src="assets/images/svg/svg-bg.svg" class="banner-img-shapes img-size-2 m-auto" alt=""/>
                        <div class="about-image" data-aos="fade-right">
                            <div class="inner-images text-left"><img src="assets/images/gif/Immigrationi.gif"
                                                                     class="img-fluid img-size" alt="Image"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 pl-lg-0">
                        <div class="about-us-content position-relative x-index-1 small-mt__40 tablet-mt__40">
                            <div class="section-title-wrap">
                                <div class="text-left section-title-srv mb-30">
                                    <h1 class="mb-20 section-title-srv__transit">TRANSIT <span>Visa</span></h1>
                                    <h6 class="section-sub-title text-right text-capitalize">Do you need a Transit Visa
                                        for any of these countries?</h6>
                                </div>
                                <h4 class="mb-10 font-weight--ex-bold letter-space-2">VISA | TRAVEL DOCUMENT</h4>
                                <p class="mb-20 font-weight--light text-left">
                                    Utter Vision — a fast, easy and secure way
                                    to get the travel documents needed for
                                    international trips. Get the convenience you
                                    want and peace of mind knowing your
                                    travel documents are in order before your trip
                                </p>
                                <div class="about-us-btn-box text-center"><a href="#map-selector"
                                                                             class="btn btn__secondary">APPLY NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============ Travel Area End ============-->

        <!--============ Visas Area Start ============-->
        <div class="banner-lozi-shape section-space--ptb_30 mgt-80">
            <img src="assets/images/svg/content-bg.svg" class="banner-lozi-shape__lozy" alt=""/>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 dots-offset d-md-none">

                        <img src="assets/images/svg/svg-bg.svg" class="banner-img-shapes img-size-2" alt=""/>
                        <div class="about-image" data-aos="fade-left">
                            <div class="inner-images text-center"><img src="assets/images/gif/workii.gif"
                                                                       class="img-fluid img-size-2" alt="Image"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 pl-lg-0">
                        <div class="about-us-content position-relative x-index-2 small-mt__40 tablet-mt__40">
                            <div class="cta-holers section-title-wrap">
                                <div class="text-left section-title-srv mb-30">
                                    <h1 class="mb-20 section-title-srv__work">Other <span>Visas</span></h1>
                                    <h6 class="section-sub-title">For <strong style="font-size: 18px;">FAMILY VISIT,
                                            WORK, BUSINESS</strong></h6>
                                </div>
                                <p class="mb-20 font-weight--light">You can also apply and estimate your chance of
                                    approval for every Nonimmigrant visas that these countries provides. <br><strong>United
                                        States, Schengen, Canada, Russia, India, Brazil, Australia</strong></p>
                                <div class="about-us-btn-box text-center"><a href="#map-selector"
                                                                             class="btn btn__secondary">APPLY NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 dots-offset d-none d-sm-block">
                        <img src="assets/images/svg/svg-bg.svg" class="banner-img-shapes img-size-2" alt=""/>
                        <div class="about-image" data-aos="fade-left">
                            <div class="inner-images text-right"><img src="assets/images/gif/workii.gif"
                                                                      class="img-fluid img-size-1" alt="Image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============ Visas Area End ============-->

        <!--============ Service Area Start ============-->
        <div class="start-up-service-area mgt-110  position-relative zinde1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-wrap text-center section-space--mb_40">
                            <h3 class="section-title">WHY UTTER VISION?</h3>
                            <!--<h6 class="section-sub-title"> our principles</h6>-->
                        </div>
                    </div>
                </div>
                <div class="row row--35">
                    <!-- service-area Start -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="ht-service-box style-07">
                            <div class="service-icon">
                                <img src="assets/images/svg/img-discovering.svg" class="img-fluid zinde2" alt="">
                            </div>
                            <div class="service-content mt-n4">
                                <h4 class="section-title mb-10">Simple Pathway<br> Process</h4>
                                <p>Create a profile in minutes and apply for visas in seconds.</p>
                            </div>
                        </div>
                    </div>
                    <!-- service-area End -->
                    <!-- service-area Start -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="ht-service-box style-07">
                            <div class="service-icon">
                                <img src="assets/images/svg/img-expowers.svg" class="img-fluid zinde2" alt="">
                            </div>
                            <div class="service-content mt-n4">
                                <h4 class="section-title mb-10">ONLINE AUTOMATED GUIDANCE</h4>
                                <p>Every term is straightforward to understand and simple while applying process.</p>
                            </div>
                        </div>
                    </div>
                    <!-- service-area End -->
                    <!-- service-area Start -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="ht-service-box style-07">
                            <div class="service-icon">
                                <img width="340" style="width: 340px" src="assets/images/svg/img-language.svg"
                                     class="img-fluid zinde2" alt="">
                            </div>
                            <div class="service-content mt-n4">
                                <h4 class="section-title mb-10">MULTI-LANGUAGE ASSISTANCE </h4>
                                <p>Have a better understanding of each term and do the entire process by yourself </p>
                            </div>
                        </div>
                    </div>
                    <!-- service-area End -->
                </div>
            </div>
        </div>
        <!--============ Service Area End ============-->

        <!--================= Testimonial Area Start ====================-->
        <div class="banner-lozi-shape section-space--ptb_30 mgt-80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 dots-offset">
                        <div class="about-image" data-aos="fade-right">
                            <div class="inner-images text-left"><img src="assets/images/svg/hand-shake.svg"
                                                                     class="img-fluid img-size-1" alt="Image"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 pl-lg-0">
                        <div class="about-us-content position-relative x-index-1 small-mt__40 tablet-mt__40">
                            <div class="section-title-wrap">
                                <div class="text-right section-title-srv mb-30">
                                    <h1 class="mb-20 section-title-srv__pship">Partner<span>Ship</span></h1>
                                    <h6 class="section-sub-title">Become a partner and qualify your clients <br>--work
                                        with us</h6>
                                </div>
                                <h4 class="mb-10 font-weight--ex-bold letter-space-2">Recruitment Partners | Agencies
                                </h4>
                                <p class="mb-20 font-weight--light text-left">
                                    Our artificial intelligence (AI) powered platform helps you
                                    find all information that meet your clients' interests, apply to
                                    multiple programs that match their qualifications,
                                    and earn competitive commissions.
                                </p>
                                <div class="about-us-btn-box text-center"><a
                                            href="{{ url('https://uttervision.com/under-counstruction.html') }}"
                                            class="btn btn__secondary">Work
                                        With Us</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================= Testimonial Area End ====================-->

        <!--============= Brand Area Start ===============-->
    {{--        <div class="cta-image-area_one brand-slider section-space--pb_90 position-relative zinde1">--}}
    {{--            <div class="flexible-image-slider-wrap text-center">--}}
    {{--                <div class="swiper-container auto--right-slider">--}}
    {{--                    <div class="swiper-wrapper">--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/01.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/02.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/03.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/04.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/05.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/06.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/07.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/08.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/09.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/10.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/11.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/12.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/13.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/14.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/15.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/16.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/17.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/18.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/19.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/20.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/21.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/22.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/23.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/24.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/25.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/26.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/27.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/28.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/29.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/30.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/31.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/32.png" alt=""></a></div>--}}
    {{--                        <div class="swiper-slide"><a href="#"><img src="assets/images/flags/33.png" alt=""></a></div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    <!--============= Brand Area End ===============-->

    </div>
@endsection

@section('foot')
    <script src="/assets/js/public/home/home.js"></script>
    <script src="{{asset('assets/js/public/home/map.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
@endsection


