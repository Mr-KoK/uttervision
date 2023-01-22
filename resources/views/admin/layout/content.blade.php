<header class="header flex align-center between">
    <div class="_actions flex align-center">
        <div class="_date-holder">
            <span>{{now()->format('d M Y')}}</span>
        </div>
        <div class="Notifications collapse">
            <div class="_notification-btn collapse-btn">
                <span class="_notification-badge">{{count(Auth::guard('admin')->user()->unreadNotifications)}}</span>
                <img src="{{asset('assets/images/admin/icons/notification-icon.svg')}}" alt="notification icon">
            </div>
                <ul class="_notifications-list collapse-body">
            @if(count(Auth::guard('admin')->user()->unreadNotifications) > 0)
                    @foreach(Auth::guard('admin')->user()->unreadNotifications as $notification)
                        <li><p>{{$notification->data['message']}}</p></li>

                    @endforeach
            @else
                <p>You Don`t Have Any Notification</p>
            @endif
                </ul>

        </div>
    </div>
    <div class="_actions align-center flex">
        <div class="_account-holder collapse">
            <img title="{{Auth::guard('admin')->user()->name}}" class="collapse-btn"
                 src="{{Auth::guard('admin')->user()->img ? Auth::guard('admin')->user()->img : '/assets/images/admin/icons/avatar-placeholder.png'}}"
                 alt="user">
            <div class="collapse-body">
                <div class="current-admin-info">
                    <h4 class="admin-name">{{Auth::guard('admin')->user()->name}}</h4>
                </div>
                <div class="admin_actions">
                    <a href="#">
                        Change Password
                    </a>
                </div>
                <div><a href="">Setting</a></div>
            </div>
        </div>
    </div>
</header>
<div class="content-holder">
    @yield('content')
</div>

