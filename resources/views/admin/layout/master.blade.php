<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=5.0">
    <link rel="preload" href="{{asset('/assets/fonts/fontawesome-webfont.ttf')}}" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="{{asset('/assets/css/cpp/fonts.min.css')}}" as="style">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/assets/css/cpp/fonts.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/cpp/blubed.min.css')}}">
    <link rel="icon" href="{{asset('/assets/images/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/public/uttericon.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/cpp/admin/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/cpp/admin/modal.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/lib/sweet-alert/sweetalert2.min.css')}}">
    @yield('head')
</head>
<body>
<div class="master-layout">
    <div class="_back-drop"></div>
    <button class="menu-hamburger-icon">
        <i class="menu-lines"></i>
    </button>
    <div class="master-holder flex">
        <div class="_sidebar py-1">
            @include('admin.layout.sidebar')
        </div>
        <div class="_content px-1 py-1">
            @include('admin.layout.content')
        </div>
    </div>
</div>
{{--File Explore--}}
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="modal-explorer">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Explorer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="_spinner show"></div>
                <div class="container-fluid">
                    <div class=" row">
                        <div class="col-12">
                            <div class="parent-craete">
                                <div class="d-flex justify-content-between">
                                    <div class="flex align-center between">
                                        <div class="place-left">
                                            <button class="btn_backex">
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                            </button>
                                            <button class="btn-refresh">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="place-right">
                                            <a class="dropdown-item files-upload" href="#">Add file</a>
                                            <a class="dropdown-item folder-modal" href="#">Add folder</a>
                                            <input multiple type="file" class="upload-img d-none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-folders full-explorer">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success add-img-url">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>
{{--Create Folder--}}
<div class="modal fade" tabindex="-1" role="dialog" id="modal-add-folder">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mx-auto">
                                <input name="name" force type="text" class="form-control-me" placeholder="name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success create-folder">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>

@yield('modal')

<footer>
    <div class="_notifications">
        <div class="_notifications-holder"></div>
    </div>


</footer>

<script src="{{asset("assets/js/plugins/jquery.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/bluebed.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/sweetalert.js")}}"></script>
<script type="module" src="{{asset("assets/js/modal.js")}}"></script>
<script src="{{asset("assets/js/admin/main-admin.js")}}"></script>
<script src="{{asset("assets/js/admin/file-uploader.js")}}"></script>
<script src="{{asset("assets/lib/sweet-alert/sweetalert2.all.min.js")}}"></script>

@yield('foot')


</body>
</html>