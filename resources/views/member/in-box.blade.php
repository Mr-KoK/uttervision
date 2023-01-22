@extends('member.layout.master')


@section('head')
    <title>Member in Box | UtterVision</title>
    <link rel="stylesheet" href="{{asset('assets/css/cpp/member/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/public/member-register.min.css')}}">
@endsection

@section('content')
    <div class="main-content message">
        <div class="row">
            <div class="col-4 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-info-messager">
                                <div class="box-body pd-0 d-flex align-items-start">
                                    <div class="left w-90">
                                        <div class="message-pic big">
                                            <img class="img-user-main" width="75" height="75" src="{{$user->img ?: asset('assets/images/admin/icons/avatar-placeholder.png')}}" alt="">
                                            <div class="pulse-css"></div>
                                        </div>
                                        <div class="content">
                                            <div class="username">
                                                <h5 class="fs-18">{{$user->name}}</h5>
                                            </div>
                                            <div class="text">
                                                <p class="pb-5 mt-0 mb-0">UtterVision Member</p>
                                            </div>
                                            <div class="checkbox  mt-5">
                                                <input type="checkbox" value="checkbox" name="check" checked>
                                                <span class="ml-10">Active</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="dropdown ml-14">
                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-cog color-text"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-0">
                        <div class="box box-message">
                            <div class="input-group search-area">
                                <span class="input-group-text"><a href="javascript:void(0)"><i class="bx bx-search"></i></a></span>
                                <input type="text" class="form-control pl-10" placeholder="Search">

                            </div>
                            <div class="box-header">
                                <h4 class="card-title">Recent Message</h4>
                                <div class="dropdown ml-14">
                                    <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-content">
                                <ul class="message-list">
                                    <li class="waves-effect waves-teal active">
                                        <div class="left d-flex">
                                            <div class="avatar">
                                                <img src="{{asset('assets/images/member/avatar/message-1.png')}}" alt="">
                                                <div class="pulse-css-1"></div>
                                            </div>
                                            <div class="content">
                                                <div class="username">
                                                    <div class="name h6">
                                                        Elizabeth Holland
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <p>Hi, Did you check the file?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.left -->

                                        <div class="clearfix"></div>
                                    </li>
                                    <!-- /li.waves-effect -->
                                    <li class="waves-effect waves-teal">
                                        <div class="left d-flex">
                                            <div class="avatar">
                                                <img src="{{asset('assets/images/member/avatar/message-3.png')}}" alt="">
                                                <div class="pulse-css-1"></div>
                                            </div>
                                            <div class="content">
                                                <div class="username">
                                                    <div class="name h6">
                                                        Bobby Mendez
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <p>Hi, When we will start the meeting?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.left -->
                                        <div class="clearfix"></div>
                                    </li>
                                    <!-- /li.waves-effect -->
                                    <li class="waves-effect waves-teal">
                                        <div class="left d-flex">
                                            <div class="avatar">
                                                <img src="{{asset('assets/images/member/avatar/message-4.png')}}" alt="">
                                                <div class="pulse-css-1"></div>
                                            </div>
                                            <div class="content">
                                                <div class="username">
                                                    <div class="name h6">
                                                        Andreea Wade
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <p>Please let me check it.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.left -->
                                        <div class="clearfix"></div>
                                    </li>
                                    <!-- /li.waves-effect -->
                                    <li class="waves-effect waves-teal">
                                        <div class="left d-flex">
                                            <div class="avatar">
                                                <img src="{{asset('assets/images/member/avatar/message-5.png')}}" alt="">
                                                <div class="pulse-css-1"></div>
                                            </div>
                                            <div class="content">
                                                <div class="username">
                                                    <div class="name h6">
                                                        Tom Schneider
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <p>What's new about the new project?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.left -->

                                        <div class="clearfix"></div>
                                    </li>
                                    <!-- /li.waves-effect -->
                                    <li class="waves-effect waves-teal">
                                        <div class="left d-flex">
                                            <div class="avatar">
                                                <img src="{{asset('assets/images/member/avatar/message-6.png')}}" alt="">
                                                <div class="pulse-css-1"></div>
                                            </div>
                                            <div class="content">
                                                <div class="username">
                                                    <div class="name h6">
                                                        Bobby Mendez
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <p>I will check it tonight</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.left -->
                                        <div class="clearfix"></div>
                                    </li>
                                    <!-- /li.waves-effect -->
                                    <li class="waves-effect waves-teal">
                                        <div class="left d-flex">
                                            <div class="avatar">
                                                <img src="{{asset('assets/images/member/avatar/message-7.png')}}" alt="">
                                                <div class="pulse-css-1"></div>
                                            </div>
                                            <div class="content">
                                                <div class="username">
                                                    <div class="name h6">
                                                        Andreea Wade
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <p>Looks great. Let's finished it.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.left -->
                                        <div class="clearfix"></div>
                                    </li>
                                    <!-- /li.waves-effect -->
                                </ul>
                                <!-- /.message-list scroll -->
                            </div>
                            <!-- /.box-content -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 col-md-12">
                <div class="box message-info">
                    <div class="box-info-messager">
                        <div class="message-pic">
                            <img class="img-user-chat" src="{{asset('assets/images/member/avatar/message-1.png')}}" alt="">
                            <div class="pulse-css"></div>
                        </div>
                        <div class="content">
                            <div class="username">
                                <h5 class="fs-18">Elizabeth Holland</h5>
                            </div>
                            <div class="text">
                                <p class="fs-14">Hi, Did you check the file?</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-info-messager -->
                    <div class="divider"></div>

                    <div class="message-box">
                        <div class="message-in">
                            <div class="message-pic">
                                <img class="img-user-chat" src="{{asset('assets/images/member/avatar/message-1.png')}}" alt="">
                                <div class="pulse-css-1"></div>
                            </div>
                            <div class="message-body">
                                <div class="message-text">
                                    <p>Proin ac quam et lectus vestibulum blandit. Nunc maximus nibh at placerat tincidunt. Nam sem lacus, ornare non ante sed, ultricies fringilla massa. Ut congue, elit non tempus elementum, sem risus tincidunt diam.</p>
                                </div>
                                <div class="message-meta">
                                    <p class="mt-10">Sunday, march 17, 2021 at 2:39 PM</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.message-in -->
                        <div class="clearfix"></div>
                        <div class="message-out">
                            <div class="message-pic">
                                <img class="img-user-chat" width="60" height="60" src="{{$user->img ?: asset('assets/images/admin/icons/avatar-placeholder.png') }}" alt="">
                                <div class="pulse-css-1"></div>
                            </div>
                            <div class="message-body">
                                <div class="message-text">
                                    <p>Cras eu elit congue, placerat dui ut, tincidunt nisl. </p>
                                    <p>Duis mauris augue, efficitur eu arcu sit amet, posuere dignissim neque. Aenean enim sem, pharetra et magna sit amet, luctus</p>
                                </div>
                                <div class="message-meta">
                                    <p class="mt-10">Sunday, march 17, 2021 at 2:45 PM</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.message-out -->
                        <div class="clearfix"></div>
                        <div class="message-in">
                            <div class="message-pic">
                                <img class="img-user-chat" src="{{asset('assets/images/member/avatar/message-1.png')}}" alt="">
                                <div class="pulse-css-1"></div>
                            </div>
                            <div class="message-body">
                                <div class="message-text">
                                    <p>Proin ac quam et lectus vestibulum blandit. Nunc maximus nibh at placerat tincidunt. Nam sem lacus, ornare non ante sed.</p>
                                    <p>Proin ac quam et lectus vestibulum </p>
                                </div>
                                <div class="message-meta">
                                    <p class="mt-10">Sunday, march 17, 2021 at 2:52 PM</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="message-in">
                            <div class="message-pic">
                                <img class="img-user-chat" src="{{asset('assets/images/member/avatar/message-1.png')}}" alt="">
                                <div class="pulse-css-1"></div>
                            </div>
                            <div class="message-body">
                                <div class="message-text">
                                    <p>Proin ac quam et lectus vestibulum blandit. Nunc maximus nibh at placerat tincidunt. Nam sem lacus, ornare non ante sed.</p>
                                    <p>Proin ac quam et lectus vestibulum </p>
                                </div>
                                <div class="message-meta">
                                    <p class="mt-10">Sunday, march 17, 2021 at 2:52 PM</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                    <div class="form-chat">
                        <form action="#" method="get" accept-charset="utf-8">
                            <div class="message-form-chat">
                                <!-- /.pin -->
                                <span class="message-text">
                                        <textarea name="message" placeholder="Type your message..." required="required"></textarea>
                                    </span>
                                <!-- /.message-text -->
                                <span class="camera">
                                        <a href="#" title="">
                                            <i class="fas fa-smile"></i>
                                        </a>
                                    </span>
                                <!-- /.camera -->
                                <span class="icon-message">
                                        <a href="#" title="">
                                            <i class="fas fa-paperclip"></i>
                                        </a>
                                    </span>
                                <!-- /.icon-right -->
                                <!-- <div class="icon-mobile">
                                    <ul>
                                        <li>
                                            <a href="#" title=""><i class="fas fa-smile"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" title=""><i class="fas fa-paperclip"></i></a>
                                        </li>
                                    </ul>
                                </div> -->
                                <!-- /.icon-right -->
                                <span class="btn-send">
                                        <button class="waves-effect" type="submit">Send <i class="fas fa-paper-plane"></i></button>
                                    </span>
                                <!-- /.btn-send -->

                            </div>
                            <!-- /.message-form-chat -->
                            <div class="clearfix"></div>
                        </form>
                        <!-- /form -->
                    </div>
                </div>
            </div>
        </div>

        <div id="add_project" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Project Name</label>
                                        <input class="form-control" value="" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Client</label>
                                        <select class="select">
                                            <option>Client 1</option>
                                            <option>Client 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control " type="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control " type="date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Rate</label>
                                        <input placeholder="$50" class="form-control" value="" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <select class="select">
                                            <option>Hourly</option>
                                            <option selected>Fixed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Priority</label>
                                        <select class="select">
                                            <option selected>High</option>
                                            <option>Medium</option>
                                            <option>Low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Files</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection