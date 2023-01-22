<div class="sidebar">

    <a href="/">
        <img class="sidebar-logo" src="{{asset('/assets/images/admin/main-logo.svg')}}" alt="logo">
    </a>
    <ul class="_main-items-holder">
        <li>
            <a href="/admin" class="{{ (request()->is('admin')) ? 'active' : '' }}">
                <div class="dashboard-btn flex">
                    <img src="{{asset('/assets/images/admin/sidebar-icon/dashboard-icon.svg')}}" alt="dashboard icon">
                    <p>
                        Dashboard
                    </p>
                </div>
            </a>
        </li>
        <li class="collapse {{ (request()->is('admin/administrators')) ? 'active' : '' }}">
            <div class="dashboard-btn collapse-btn flex">
                <img src="{{asset('/assets/images/admin/sidebar-icon/team-icon.svg')}}" alt="team icon">
                <p class="">Team</p>
            </div>
            <ul class="collapse-body _items-holder">
                <li class="_item"><a href="">Super Admin</a></li>
                <li class="_item"><a class="{{ (request()->is('admin/administrators')) ? 'active' : '' }}" href="/admin/administrators">Co-Partner</a></li>
                <li class="_item"><a class=""
                                     href="">Staff</a></li>

            </ul>
        </li>

        <li class="collapse {{ (request()->is('admin/country/*')) ? 'active' : '' }}">
            <div class="dashboard-btn collapse-btn flex">
                <img src="{{asset('/assets/images/admin/sidebar-icon/country-icon.svg')}}" alt="team icon">
                <p class="">Country</p>
            </div>
            <ul class="collapse-body _items-holder">
                <li class="_item"><a class="{{ (request()->is('admin/country/list')) ? 'active' : '' }}"
                                     href="/admin/country/list">All Countries</a></li>
                <li><a href="{{route('admin-steps')}}" class="{{(request()->is('admin/country/step')) ? 'active' : '' }}">Steps</a></li>
                <li><a href="{{route('admin-question')}}" class="{{(request()->is('admin/country/question')) ? 'active' : '' }}">Questions And Answers</a></li>

            </ul>
        </li>
        <li class="collapse {{ (request()->is('admin/user/*')) ? 'active' : '' }}">
            <div class="dashboard-btn collapse-btn flex">
                <img src="{{asset('/assets/images/admin/sidebar-icon/user-icon.svg')}}" alt="user icon">
                <p class="">
                    Users
                </p>
            </div>
            <ul class="collapse-body _items-holder">

                <li><a class="{{(request()->is('admin/user/visa-applicant')) ? 'active' : '' }}" href="{{route('user-visa-applicant')}}">Visa Applicant</a></li>
                <li><a href="">Immigration Applicant</a></li>
                <li><a class="{{(request()->is('admin/user/list')) ? 'active' : '' }}" href="{{route('users-list')}}">List Users</a></li>

            </ul>
        </li>
        <li>
            <a href="" >
                <div class="dashboard-btn collapse-btn flex">
                    <img src="{{asset('/assets/images/admin/sidebar-icon/payment-icon.svg')}}" alt="user icon">
                    <p>Payment</p>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="dashboard-btn collapse-btn flex">
                    <img src="{{asset('/assets/images/admin/sidebar-icon/blog-icon.svg')}}" alt="user icon">
                    <p>Blog</p>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="dashboard-btn collapse-btn flex">
                    <img src="{{asset('/assets/images/admin/sidebar-icon/servise-icon.svg')}}" alt="user icon">
                    <p>Services</p>
                </div>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" class="btn-logout">
                <div class="dashboard-btn flex">
                    <img src="{{asset('/assets/images/admin/sidebar-icon/logout-icon.svg')}}" alt="user icon">
                    <p>Logout</p>
                </div>

            </a>
        </li>
    </ul>
</div>
