@extends('member.layout.master')


@section('head')
    <title>Member Profile | UtterVision</title>
    <link rel="stylesheet" href="{{asset('assets/css/cpp/member/lib/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/member/lib/datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/member/icons.min.css')}}">

@endsection

@section('foot')
    <script src="{{asset('assets/js/member/theme/pages/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/member/profile.js')}}"></script>
@endsection

@section('modal')

    <div class="modal fade" id="profile_picture" tabindex="-1" role="dialog" aria-labelledby="Profile picture"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="modal-avatar">
                        <p>Click On Avatar For Select Your Profile Avatar Then Click In Change</p>
                        <label class="overflow-hidden avatar-holder"
                               style="position:relative;cursor: pointer;border-radius: 100%" for="_avatar">
                            <span style="left:0;top:0;width:100%;text-align:center;color: #fff;background-color: #000;position: absolute;padding: 5px;">
                                Avatar
                            </span>
                            <input class="_avatar" hidden id="_avatar" type="file">
                            <img
                                    width="150"
                                    height="150"
                                    id="imgPreview"
                                    src="{{ $user->img ?: asset('assets/images/admin/icons/avatar-placeholder.png')}}"
                                    data-placement="{{asset('assets/images/admin/icons/avatar-placeholder.png')}}"
                                    alt="{{$user->name}}">
                        </label>

                    </div>
                </div>
                <div class="modal-footer">
                    {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="button" class="btn btn-primary remove-avatar">Remove <i class="fa fa-trash"></i><i
                                class="_spinner"></i></button>
                    <button type="button" class="btn btn-primary edit-avatar-btn">Change <i class="fa fa-edit"></i><i
                                class="_spinner"></i></button>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="main-content">
        <div class="row mb-0">
            <div class="col-8 col-sm-12 mb-10">
                <div class="project">
                    <div class="box">
                        <div class="box-header">
                            <div class="me-auto">
                                <h4 class="card-title m-0 fs-18 fw-normal">Your Applications <span class="color-9">Summery</span>
                                </h4>
                                <p class="fs-12">Number of Your Applications!</p>
                            </div>
                        </div>
                        <div class="boxy card-box pt-0">
                            <div class="icon-box bg-color-15">
                                <div class="content text-center color-15">
                                    <h5 class="title-boxy fs-15 font-w300">Total Visa </h5>
                                    <div class="themesflat-counter fs-46 font-w500">
                                        <span class="number" data-from="0" data-to="309" data-speed="5"
                                              data-inviewport="yes">{{count($user->forms)}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box bg-color-16">
                                <div class="content text-center color-16">
                                    <h5 class="title-boxy fs-14 font-w300">Pending Visa </h5>
                                    <div class="themesflat-counter fs-46 font-w500">
                                        <span class="number" data-from="0" data-to="309" data-speed="5"
                                              data-inviewport="yes">{{count($user->forms)}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box bg-color-17">
                                <div class="content text-center color-17">
                                    <h5 class="title-boxy fs-13 font-w300">Countries Applied </h5>
                                    <div class="themesflat-counter fs-46 font-w500">
                                        <span class="number" data-from="0" data-to="309" data-speed="5"
                                              data-inviewport="yes">{{count($user->forms)}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box bg-color-18">
                                <div class="content text-center color-18">
                                    <h5 class="title-boxy fs-14 font-w300">Accepted Visa </h5>
                                    <div class="themesflat-counter fs-46 font-w500">
                                        <span class="number" data-from="0" data-to="309" data-speed="5"
                                              data-inviewport="yes">{{$user->getCountVisaAccepted()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mt-15 box-information position-relative">
                    <div class="_spinner-holder">
                        <div class="_spinner"></div>
                    </div>
                    <div id="families">
                        @include('member.profile.load-families')
                    </div>
                </div>

            </div>
            <div class="col-4 col-sm-12 mb-10">
                <div class="row">
                    <div class="box pb-40">
                        <div class="row flex-wrap flex-lg-nowrap d-flex ">
                            <div class="d-flex flex-grow-1 flex-fill">
                                <div class="box-header p-0 d-block">
                                    <div class="me-auto">
                                        <h4 class="card-title m-0 fs-18 fw-normal">Hello <span
                                                    class="color-5 d-block font-wb">{{$user->name}}</span></h4>
                                        <p class="fs-11">Copy your bio link and paste it in your profile to let people
                                            find you.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="justify-content-end w-40">
                                <div class="justify-content-center d-flex position-relative">
                                    <img
                                            width="90"
                                            height="90"
                                            class="rounded-circle header-profile-user img-user-avatar mr-5"
                                         src="{{$user->img ?: asset('assets/images/admin/icons/avatar-placeholder.png')}}"
                                         alt="User Avatar">
                                    <i data-toggle="modal" data-target="#profile_picture"
                                       class="user-avatar-btn fa fa-camera position-absolute"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row pl-0 ml-0">
                            <div class="mt-10 d-flex">
                                <div class="col-8 mb-0 mr-0 pr-2 pl-0 ml-0">
                                    <input id="name-value"  disabled class="form-control text-secondary" placeholder="{{$user->name}}">
                                </div>
                                <div class="col-4 mb-0 ml-0 pl-2">
                                    <div class="btn-placer-right mt-0">
                                        <a href="javascript:void(0)" class="add rounded-pill fs-10 just-tow de-gray-input">
                                            edit name
                                        </a>
                                        <a href="javascript:void(0)" class="add rounded-pill fs-10 hide-btn just-tow btn-action save-name">
                                            save
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10 d-flex">
                                <div class="col-8 mb-0 mr-0 pr-2 pl-0 ml-0">
                                    <input id="phone-number-value" disabled class="form-control text-secondary phone-number-value"
                                           placeholder="{{$user->phone ?: 'Your Phone Number'}}">
                                </div>
                                <div class="col-4 mb-0 ml-0 pl-2">
                                    <div class="btn-placer-right mt-0">
                                        <a href="javascript:void(0)" class="add rounded-pill fs-10 just-tow de-gray-input">
                                            edit phone
                                        </a>

                                        <a href="javascript:void(0)" class="add rounded-pill fs-10 hide-btn just-tow btn-action save-phone">
                                            save
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 m-auto pl-2">
                            <div class="btn-placer mt-0">
                                <a data-toggle="modal" data-target="#change-password" href="javascript:void(0)" class="add rounded-pill fs-10 just-tow toggle-password-box">
                                    Change Password
                                </a>
                            </div>
                        </div>
                        @if(!$user->isVerify())
                            <div class="boxy text-center card-box pt-0 my-4">
                                <div class="icon-box color-17 bg-color-15 justify-content-center d-flex w-100">
                                    <div class="m-auto  p-10">
                                        <h4 class="card-title m-0 fs-18 fw-normal pt-10 mb-10">Verify<span
                                                    class="font-wb"> Account!</span></h4>
                                        <p class="fs-11 color-17">Your Account isn`t Verify!<br/>For continue please Verify Your Account Now!</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="boxy card-box pt-0 my-0">
                            <div class="icon-box bg-color-16 d-flex w-100">
                                <div class="content text-center color-17">
                                    <div class="me-auto left mr-14 p-10">
                                        <h4 class="card-title m-0 fs-18 fw-normal pt-10 mb-10">Get <span
                                                    class="color-5 font-wb">Premium!</span></h4>
                                        <p class="fs-11">Copy your bio link and paste it in your profile to let people
                                            find you.</p>
                                    </div>
                                    <div class=" w-100">
                                        <img width="20"
                                             style="background-color: #DF88D9;padding: 8px;border-radius: 15px;"
                                             src="{{asset('assets/images/member/svg/ico-crown.svg')}}"
                                             alt="UtterVision" class="align-middle float-lg-end w-80">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2 project">
                            <div class="box-header pt-0">
                                <div class="me-auto">
                                    <h4 class="card-title mb-0 fs-22">Reminders</h4>
                                </div>
                                <div class="card-options pr-3">
                                    <div class="dropdown"><a href="#"
                                                             class="btn ripple btn-outline-light dropdown-toggle fs-12 rounded-pill"
                                                             data-bs-toggle="dropdown" aria-expanded="false"> See All <i
                                                    class="feather feather-chevron-down"></i> </a>
                                        <ul class="dropdown-menu dropdown-menu-end" role="menu" style="">
                                            <li><a href="#">Monthly</a></li>
                                            <li><a href="#">Yearly</a></li>
                                            <li><a href="#">Weekly</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="d-flex mb-3 mb-md-0">
                                    <div class="mt-5"><img
                                                src="{{asset('assets/images/member/svg/ico-exclamation-box.svg')}}"
                                                alt="user"></div>
                                    <div class="ml-19">
                                        <div class="me-auto left">
                                            <h4 class="card-title fs-12 fw-bold pt-10 mb-5">Did You Verify Your Account?</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider-dooted w-100"></div>
                                <div class="d-flex mb-3 mb-md-0">
                                    <div class="mt-5"><img src="{{asset('assets/images/member/svg/ico-exclamation-box.svg')}}"
                                                           alt="user"></div>
                                    <div class="ml-19">
                                        <div class="me-auto left">
                                            <h4 class="card-title fs-12 fw-bold pt-10 mb-5">Did You Complete Your Profile?</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider-dooted w-100"></div>
                                <div class="d-flex mb-3 mb-md-0">
                                    <div class="mt-5"><img
                                                src="{{asset('assets/images/member/svg/ico-exclamation-box.svg')}}"
                                                alt="user"></div>
                                    <div class="ml-19">
                                        <div class="me-auto left">
                                            <h4 class="card-title fs-12 fw-bold pt-10 mb-5">Did You Add Your Families?</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider-dooted w-100"></div>
                                <div class="d-flex mb-3 mb-md-0">
                                    <div class="mt-5"><img
                                                src="{{asset('assets/images/member/svg/ico-exclamation-box.svg')}}"
                                                alt="user"></div>
                                    <div class="ml-19">
                                        <div class="me-auto left">
                                            <h4 class="card-title fs-12 fw-bold pt-10 mb-5">Did You Apply For Any Visa?</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection