<div class="sidebar">
    <div class="sidebar-logo">
        <a href="javascript:void(0)" id="sidebar-close"> <img src="{{asset('assets/images/member/svg/logo.svg')}}" alt="UtterVision"> </a>
    </div>
    <!-- SIDEBAR MENU -->
    <div class="simlebar-sc" data-simplebar>
        <ul class="sidebar-menu tf">

            <li class="sidebar-submenu">
                <a href="{{route('member.dashboard')}}" class="{{(request()->is('member/dashboard')) ? 'active' : '' }}">
                    <i class='bx bxs-home'></i>
                    <span>Dashboard</span> </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="{{route('member.dashboard')}}"> Dashboard </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="{{str_contains(url()->current(), 'application')? 'active' : '' }}" href="{{ isset($user->forms[0]) ? $user->forms[0]->getUserApplicantUrl()  : "javascript:void(0)"}}">
                    <i class='bx bxs-bolt'></i>
                    <span>My Application</span> </a>
            </li>

            <li>
                <a href="{{route('member.profile')}}" class="{{(request()->is('member/profile')) ? 'active' : '' }}"> <i class='bx bxs-user'></i> <span>Profile</span> </a>
            </li>
            <li>
                <a href="{{route('member.payment')}}" class="{{(request()->is('member/payment')) ? 'active' : '' }}"> <i class='bx bxs-dashboard'></i> <span>Payment</span> </a>
            </li>
            <li>
                <a class="{{str_contains(url()->current(), 'inbox')? 'active' : '' }}" href="{{route('member.inbox')}}"> <i class='bx bx-calendar'></i> <span>Inbox</span> </a>
            </li>

            <li>
                <a href="javascript:void(0)"> <i class='bx bxs-message-rounded-detail'></i> <span>Approval Rate</span> </a>
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
                <a href="{{url('/')}}" class=""> <i class='bx bxs-component'></i>
                    <span>Go To Site</span>
                </a>
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
