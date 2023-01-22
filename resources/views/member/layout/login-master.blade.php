<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custome.css') }}">
    @yield('head')
</head>

<body>
<div class="right-component">
    <div class="text-center">
        <img src="{{ asset('assets/images/Bitmap.svg') }}" alt="">
        <p>
            Invite your Firends and start collaboration
        </p>
        <button class="btn-under-bit">
            Invite
        </button>
    </div>
</div>

@yield('content')

<div class="modal fade" tabindex="-1" role="dialog" id="modal-after-social">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add information</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" name="form-social" onsubmit="return false">
                    <div class="form-group">
                        <input name="email-communicational-social" type="text" class="form-control"
                               placeholder="Enter communicational Email">
                    </div>
                    <div class="form-group">
                        <input name="phonnumber-login" type="text" class="form-control"
                               placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                            <span class="text-error-login" style="color: red;font-weight: bold;font-size: 14px">

                            </span>
                    </div>
                    <div class="text-right">
                        <button style="background-color: rgb(172, 205, 2)" type="submit"
                                class="btn btn-success p-1">Save
                        </button>
                        <button type="button" class="btn btn-danger p-1" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="copy-notification">
    Url copied
</div>
<div class="_notifications">
    <div class="_notifications-holder"></div>
</div>
</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/public/main-public.js') }}" type="text/javascript"></script>
@yield('foot')
</html>