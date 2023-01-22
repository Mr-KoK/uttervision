<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('assets/css/cpp/member/icons.min.css')}}">

    <!-- Plugin -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/lib/sweet-alert/sweetalert2.min.css')}}">

    <!-- APP CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/cpp/member/lib/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/member/grid.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/member/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/member/responsive.css')}}">

    @yield('head')
</head>

<body>

<body class="sidebar-expand">
@include('partner.layout.sidebare')
@include('partner.layout.header')
@include('partner.layout.main')



<div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="password"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="row pl-0 m-auto password-box">
                    <div class="col-12 m-auto p-2 ">
                        <input id="new_password" class="form-control text-secondary"
                               placeholder="New Password">
                    </div>
                    <div class="col-12 m-auto p-2 ">
                        <input class="form-control text-secondary confirm-password"
                               placeholder="Confirm New Password">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-password">Save <i class="fa fa-save"></i><i
                            class="_spinner"></i></button>
            </div>
        </div>
    </div>
</div>

@yield('modal')


<div class="overlay"></div>
<script src="{{asset('assets/js/plugins/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="{{asset('assets/js/member/theme/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/member/theme/jquery.peity.min.js')}}"></script>
<script src="{{asset('assets/js/member/theme/Chart.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/member/theme/apexcharts.js')}}"></script>
<script src="{{asset('assets/js/member/theme/simplebar.min.js')}}"></script>
<script src="{{asset('assets/js/member/theme/circle-progress.min.js')}}"></script>
<script src="{{asset('assets/js/member/theme/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script src="{{asset('assets/lib/sweet-alert/sweetalert2.all.min.js')}}"></script>

<!-- core js -->
<script src="{{asset('assets/js/member/theme/app.js')}}"></script>


<script src="{{asset('assets/js/member/theme/main.js')}}"></script>
<script src="{{asset('assets/js/member/main.js')}}"></script>
<script src="{{asset('assets/js/member/theme/dashboard.js')}}"></script>
<script src="{{asset('assets/js/member/theme/shortcode.js')}}"></script>

<script src="{{asset('assets/js/member/theme/pages/chart-circle.js')}}"></script>
<script src="{{asset('assets/js/member/theme/pages/dashboard.js')}}"></script>

<!-- maps -->
<script src="{{asset('assets/js/member/theme/maps/jquery-jvectormap-world-mill.js')}}"></script>
<script src="{{asset('assets/js/member/theme/maps/jquery-jvectormap-us-aea.js')}}"></script>
<script src="{{asset('assets/js/member/theme/maps/jquery-jvectormap-ca-lcc.js')}}"></script>
<script src="{{asset('assets/js/member/theme/maps/vector-map.js')}}"></script>

@yield('foot')
</body>

