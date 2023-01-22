@extends('public.layout.master-home')

@section('head')
    <title>Contact | Utter Vision</title>
@endsection

@section('content')
    <!-- breadcrumb-area start -->
    <div class="creative_breadcrumb-area start_up_service-bg bg-img">
        <div class="container">
            <div class="row">

                <div class="col-lg-6  d-md-none">
                    <div class="breadcrumb_inner-img text-center">
                        <img src="assets/images/svg/img-contact-1.svg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="breadcrumb_box text-left">
                        <h2 class="breadcrumb-title text-color-primary mb-10"><span>Utter Vision</span> Support </h2>
                        <p class="">If you are an existing customer, contact your account representative
                            for assistance.
                            For questions about any applications, please leave a message in the notes of the application
                            and our customer support team will respond in less than two business days.
                        </p>
                        <h6>We see our customers as invited guests to a party, and we are the hosts</h6>
                    </div>
                </div>
                <div class="
                            col-lg-6">
                    <div class="breadcrumb_inner-img text-center d-none d-sm-block">
                        <img src="assets/images/svg/img-contact-1.svg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <div class="site-wrapper-reveal">
        <!--============ Personal Contact Us Area Start ============-->
        <div class="personal-contact-us-area  section-space--ptb_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-wrap text-center section-space--mb_60">
                            <h4 class="mb-20 theme-color-default font-weight--bold">Our Support Communities</h4>
                            <p class="mb-30 font-weight--light">Find answers, ask questions, and connect with our
                                community of Utter Vision users from around the world <br>
                                Our goal is to compete with earth’s most customer-centric company
                            </p>
                            <h6>We start with what the customer needs and we work backwards</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row section-space--mb_60">
                            <div class="col-lg-4">
                                <div class="single-contact-info-wrap d-flex mb-30">
                                    <div class="icon-box">
                                        <img src="assets/images/icons/contact-map.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="content">
                                        <h5 class="mb-10 theme-color-default">Address</h5>
                                        <p>120 Eglinton Ave E, Toronto, ON M4P 1E2, 75 Marjory Avenue M4M 2Y2</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3  pl-lg-1">
                                <div class="single-contact-info-wrap d-flex mb-30">
                                    <div class="icon-box">
                                        <img src="assets/images/icons/contact-call.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="content">
                                        <h5 class="mb-10 theme-color-default">Phone</h5>
                                        <p>+1 647 8194261 <br> +1 647 8194261</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single-contact-info-wrap d-flex mb-30">
                                    <div class="icon-box">
                                        <img src="assets/images/icons/contact-world.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="content">
                                        <h5 class="mb-10 theme-color-default">Web</h5>
                                        <p>
                                            <a href="#">info@uttervision.com</a> <br>
                                            <a href="#">www.uttervision.com</a>
                                        </p>
                                    </div>
                                    <div class="qr-box">
                                        <img src="assets/images/resources/qrcode.png" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="contact-us-form">
                            <form id="contact-form" action="contact.php" method="post">
                                <div class="contact-form__three mr-lg-5">

                                    <div class="contact-title section-space--mb_30">
                                        <h4 class="theme-color-default">Send us a message</h4>
                                    </div>

                                    <div class="contact-input input-row">
                                        <div class="contact-inner input-col-5">
                                            <input name="con_name" type="text" placeholder="Name *">
                                        </div>
                                        <div class="contact-inner input-col-5">
                                            <input name="con_email" type="email" placeholder="Email *">
                                        </div>
                                    </div>
                                    <div class="contact-input">
                                        <div class="contact-inner">
                                            <input name="con_subject" type="text" placeholder="Phone *">
                                        </div>
                                    </div>
                                    <div class="contact-inner contact-message">
                                        <textarea name="con_message" placeholder="Message*"></textarea>
                                    </div>
                                    <div class="comment-submit-btn text-center">
                                        <button class="btn btn__secondary" type="submit">Submit</button>
                                        <h5 class="form-messege"></h5>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-images text-center small-mt__30 tablet-mt__30">
                            <img src="assets/images/svg/img-contact.svg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--============ Personal Contact Us Area End ============-->
    </div>

@endsection
