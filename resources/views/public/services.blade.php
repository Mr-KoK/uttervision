@extends('public.layout.master-home')

@section('head')
    <title>UtterVision Services</title>
    <link rel="stylesheet" href="{{asset('assets/css/cpp/public/services.min.css')}}">
    <meta name="description" content="Our Services in UtterVision">
@endsection

@section('content')
    <section class="top_introduction">
        <div class="top_introduction-holder row align-items-center container m-auto">
            <div class="col-lg-6 img-holder">
                <img class="img-fluid" src="{{asset('assets/images/public/services/earth-icon.png')}}"
                     alt="UtterVision Services">
            </div>
            <div class="col-lg-6 text-holder">
                <h2 class='_title'>
                    Utter Vision
                </h2>
                <p class="middle-text">
                    Apply For Multiple Countries'
                    Visas <span class="d-block d-lg-inline">ALL-BY-YOURSELF</span> Using A Straightforward Online
                    Platform Only In A Few Minutes.
                </p>
                <p class="after-text">
                    we're simplifying the rules and streamlining the process.
                    To help our users and recruiter partners to have the
                    advantage of using multi immigration services in one platform.
                </p>
            </div>
        </div>
    </section>

    <section class="empowering">
        <div class="empowering-holder container">
            <div class="_title-section text-center">
                <h2>We Empowering the world to <span>exodus</span></h2>
                <p>Utter Vision it's an online tool with a mission to empower everyone
                    in the world to do their visa process from anywhere.</p>
            </div>
            <div class="row align-items-center container m-auto flex-wrap">
                <div class="col-lg-4 col-md-6 _item text-center col-12">
                    <div class="item-icon">
                        <div class="icon-holder">
                            <img class="img-fluid d-block m-auto" src="/assets/images/public/services/icons/finger.png"
                                 alt="MULTI-LANGUAGE ASSISTANCE">
                        </div>
                    </div>
                    <h3>MULTI-LANGUAGE ASSISTANCE</h3>
                    <p>Have a better understanding of each term and do the entire process by yourself</p>
                </div>
                <div class="col-lg-4 col-md-6 _item text-center col-12">
                    <div class="item-icon">
                        <div class="icon-holder">
                            <img class="img-fluid d-block m-auto" src="/assets/images/public/services/icons/clock.png"
                                 alt="MULTI-LANGUAGE ASSISTANCE">
                        </div>
                    </div>
                    <h3>SIMPLE PROCESS</h3>
                    <p>Create a profile in minutes and apply for visas in seconds</p>
                </div>
                <div class="col-lg-4 col-md-12 _item text-center col-12">
                    <div class="item-icon">
                        <div class="icon-holder">
                            <img class="img-fluid d-block m-auto" src="/assets/images/public/services/icons/shield.png"
                                 alt="MULTI-LANGUAGE ASSISTANCE">
                        </div>
                    </div>
                    <h3>ONLINE AUTOMATED GUIDANCE</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua</p>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-news">
        <div class="container m-auto last-news-holder row align-items-center">
            <div class="col-lg-6 col-12 last-news-text">
                <h2>Up To Date Requirements<br/>
                    <span>And Latest News</span></h2>
                <p class="text-top"> <strong></strong>  is dedicated to providing customers with a simple, fast, and reliable
                    way
                    to get travel documentation for their journey. Our online application process makes getting visas,
                    from your home. As a leading independent company in the travel documentation industry,
                    we are proud to make global travel more accessible for everyone.
                </p>
                <div class="text-button">
                    <p>Getting your travel documents is simple,</p>
                    <p class="text-right pr-2">reliable, and stress-free</p>
                    <p class="text-right">with <strong>Utter Vision</strong></p>
                </div>
                <a class="_more-services green-btn" href="#">More Services</a>
            </div>
            <div class="col-lg-6 col-12 d-none d-lg-block last-news-img">
                <img class="img-fluid" src="/assets/images/public/services/locations-news.png"
                     alt="Up To Date Requirements">
            </div>
        </div>
    </section>

    <section class="static">
        <div class="static-holder container m-auto row align-items-center">
            <div class="col-lg-8 col-12 text-holder">
                <p>
                    Want to process your application and see your eligibility?<br/>
                    Become a member and use our powerful platform to customize your options
                </p>
            </div>
            <div class="col-lg-4 col-12 btn-holder">
                <a class="account-btn green-btn" href="/">Go to my account</a>
                <a class="register-btn transparent-btn" href="/">Register Now</a>
            </div>

        </div>
    </section>

    <section class="_pathway">
        <div class="pathway-holder container m-auto">
            <div class="_title-section text-center">
                <h2 class="mb-2">Empowering others for <span>Inventing</span> their pathway</h2>
                <p>At utter vision, we believe birth certificates must not be a privilege. And Immigration is a right
                    for everyone all around the world.
                    We're here to empower users by simplifying Visa pathways that align with backgrounds and interests.
                </p>
            </div>
            <div class="_section-parts align-items-center row">
                <div class="part-item col-lg-6 col-12 part-img-1">
                    <img class="img-fluid" src="assets/images/public/services/complexity-img-1.png"
                         alt="Complexity of Immigration">
                </div>
                <div class="part-item col-lg-4 m-auto col-12 part-text-1">
                    <h3>Our <span>Tools</span></h3>
                    <small>WE Supports You End-to-End</small>
                    <p>Our Tools Will Supply You To APPLY And Estimate Your Chance Of Approval For Any Nonimmigrant
                        Visas Provided By The Most Popular Countries.</p>
                </div>
                <div class="_dots-holder d-none d-lg-block col-lg-12 col-12 position-relative">
                    <img  class="img-fluid d-none m-auto d-lg-block" src="/assets/images/public/services/dots-line.png" alt="Empowering others">
                </div>
                <div class="part-item col-lg-4 m-auto col-12 part-text-2">
                    <h3>Complexity of <span>Immigration</span></h3>
                    <small>GET YOUR STUDENT VISA AND DOCUMENT HERE</small>
                    <p>Utter Vision team simplified the student
                        visa and study permit process all around the world
                        to empowering users by having access to
                        all the information gathered in one place
                        and bringing convenience to every applicants </p>

                </div>
                <div class="part-item col-lg-6 col-12 part-img-2">
                    <img class="img-fluid" src="assets/images/public/services/complexity-img-2.png"
                         alt="Complexity of Immigration">
                </div>

            </div>
        </div>
    </section>
@endsection