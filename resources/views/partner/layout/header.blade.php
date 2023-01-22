{{--<div>--}}
{{--    <img src="" alt="">--}}
{{--    <ul class="system-notifications">--}}
{{--        @if(count($partner->unreadNotifications) > 0)--}}
{{--            @foreach($partner->unreadNotifications as $notification)--}}
{{--                <li><p>{{$notification->data['message']}}</p></li>--}}
{{--            @endforeach--}}
{{--        @else--}}
{{--            <p>No Notification!</p>--}}
{{--        @endif--}}
{{--    </ul>--}}
{{--</div>--}}

<div class="main-header">
    <div class="header-container">
        <div class="d-flex">
            <div class="mobile-toggle" id="mobile-toggle">
                <img src="{{asset('assets/images/member/svg/logo-shape.svg')}}" alt="UtterVision">
            </div>
            <div class="main-title"></div>
        </div>

        <div class="d-flex align-items-center">
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search"> <span class="bx bx-search-alt"></span>
                </div>
            </form>
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bx-search-alt'></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                       aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary h-100" type="submit"><i class='bx bx-search-alt'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="d-flex">
            <div class="boxicons card-box">
                <div class="icon-box">
                    <div class="icon bg-icon-13">
                        <i class="bx bxs-bell bx-tada bx-tada"></i>
                    </div>

                    <span class="pulse-css">
                        <strong>{{count($partner->unreadNotifications)}}</strong>
                    </span>
                    <div class="notification-list card">
                        <div class="top box-header">
                            <h5>Notification</h5>

                        </div>
                        <div class="pd-1r">
                            <div class="divider"></div>
                        </div>
                        <div class="box-body">
                            <ul class="list">
                                @if(count($partner->unreadNotifications) > 0)
                                    @foreach($partner->unreadNotifications as $notification)
                                        <li class="d-flex">
                                            @if(isset($notification->data['img']))
                                                <div class="img-mess">
                                                    <img class="mr-14"
                                                         src="{{asset('assets/images/member/avatar/avt-1.png')}}"
                                                         alt="avt">
                                                </div>
                                            @endif
                                            <div class="info">
                                                {{--                                            <a href="#" class="font-w600 mb-0 color-primary">Elizabeth Holland</a>--}}
                                                <p class="pb-0 mb-0 line-h5 mt-6">{{$notification->data['message']}}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="d-flex">
                                        <div class="info">
                                            <p class="pb-0 mb-0 line-h14 mt-6">No Notification!</p>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                            <div class="btn-view">
                                <a class="font-w600 h6" href="-/message.html">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end w-50">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img width="53" height="53" class="rounded-circle header-profile-user img-user-avatar mr-5"
                         src="{{$partner->img ?: asset('assets/images/admin/icons/avatar-placeholder.png') }}" alt="User Avatar"> <span class="pulse-css"></span>
                    <span class="info d-xl-inline-block  color-span">
								<span class="d-block fs-20 font-w600">{{$partner->name}}</span>
								<span class="d-block fs-14">Partner</span>
							</span>

                    <i class='bx bx-caret-down ml-10'></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" style="font-size: 16px">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('member.profile')}}">
                        <i class="bx bx-user font-size-16 align-middle me-1"></i>
                        <span class="badge bg-success float-end">11</span>
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="bx bx-wallet font-size-16 align-middle me-1">
                        </i> <span>My Wallet</span>
                    </a>
                    <a data-toggle="modal" data-target="#change-password" class="dropdown-item d-block" href="javascript:void(0)">
                        <i class="bx bx-lock-open font-size-16 align-middle me-1"></i>
                        <span>Change Password</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger logout" href="">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
