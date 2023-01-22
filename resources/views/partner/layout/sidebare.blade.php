<div class="sidebar">
    <div class="sidebar-logo">
        <a href="javascript:void(0)" id="sidebar-close"> <img src="{{asset('assets/images/member/svg/logo.svg')}}"
                                                              alt="UtterVision"> </a>
    </div>
    <!-- SIDEBAR MENU -->
    <div class="simlebar-sc" data-simplebar>
        <ul class="sidebar-menu tf">

            <li>
                <a href="{{url('/')}}" class=""> <i class='bx bxs-component'></i>
                    <span>Go To Site</span>
                </a>
            </li>

            <div class="divider-dooted"></div>

            <li>
                <a href="{{route('member.dashboard')}}" class="{{(request()->is('partner/dashboard')) ? 'active' : '' }}">
                    <i class='bx bxs-home'></i>
                    <span>Dashboard</span> </a> </a>
            </li>


            {{--            <li class="sidebar-submenu">--}}
            {{--                <a href="javascript:void(0)" class="sidebar-menu-dropdown"> <i class='bx bxs-component'></i> <span>Setting</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}

            <div class="divider-dooted"></div>

            <li>
                <a href="javascript:void(0)"> <i class='bx bxs-dashboard'></i> <span>Help</span> </a>
            </li>

            <li>
                <a href="javascript:void(0)" class="logout"> <i class='bx bx-calendar'></i> <span>Logout</span> </a>
            </li>


            <div class="divider-dooted"></div>
            <div class="mt-30 text-center">
                <h5 class="mb-2 fs-12 color-primary fw-light"> Visitor Visa For Canada </h5>
                <a href="javascript:void(0)" class="chat-btn color-white">Continue</a>
            </div>
        </ul>
    </div>

    <!-- END SIDEBAR MENU -->
</div>
