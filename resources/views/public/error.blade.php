@extends('public.layout.master-home')

@section('head')
    <title>An Error Occurred - Utter Vision</title>
@endsection

@section('foot')

@endsection


@section('content')
    <div class="site-wrapper-reveal">
        <!--============ Personal Contact Us Area Start ============-->
        <div class="personal-contact-us-area  section-space--ptb_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-wrap text-center section-space--mb_60">
                            <h1 class="mb-20 theme-color-default font-weight--bold">THE PAGE NOT FOUND</h1>
                            <p class="mb-30 font-weight--light">
                                Sorry. the page that your entered and looking for is currently <br>
                                Unavailable or not accessible.<br>
                                please click the botton belew to got back to our home page
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="contact-images text-center small-mt__30 tablet-mt__30">
                            <img src="{{asset('assets/images/public/404/404.png')}}" class="img-fluid" alt="">
                        </div>
                        <div class="button-block text-center pt-5">
                            <a class="btn btn__secondary" href="{{route('home')}}" target="_blank">get me back to home page</a>

                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!--============ Personal Contact Us Area End ============-->
    </div>
@endsection



