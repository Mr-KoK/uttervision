@extends('admin.layout.master')

@section('head')
    <link rel="stylesheet" href='/assets/css/cpp/admin/admin-administrators.min.css'>
    <title>Admins</title>
@endsection

@section('foot')
    <script src="/assets/js/admin/admin-administrator.js"></script>
@endsection()
@section('content')
    <h1>UtterVision Admins</h1>
    <div class="container">
        <div class="flex f-warp between">
            <div class="_admins-list dash-card c-63">
                <h2>Setting</h2>
                <div class="_btn-holder">
                    <button class="_add-new">
                        Add New Admin
                    </button>
                    <button class="_remove-admin">
                        Remove an Admin
                    </button>
                </div>
                <div class="f-left">
                    <input autocomplete="off" placeholder="Search in Admins ..." class="_search-admin" type="text">
                </div>
                <div class="clearfix"></div>
                <div class="list-admins-holder">
                    <div class="_spinner"></div>
                    <ul class="list-admins flex f-warp">
                        @foreach($admins as $admin)
                            <li class="green-card _admin-card">
                                <div class="_spinner"></div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="dash-card _admin-actions c-32">
                <h2>Profile</h2>
                <div class="_cover">
                    <div class="_img-holder">
                        <div class="_cover-img-holder">
                            <i class="fa fa-close remove-image-btn"></i>
                            <img class="_cover-img" src="{{asset('assets/images/admin/icons/avatar-placeholder.png')}}"
                                 alt="profile cover">
                            <img class="img-icon" src="{{asset('assets/images/admin/icons/camera-icon.svg')}}"
                                 alt="icon-camera">
                        </div>

                    </div>
                    <input id="_admin-id" type="hidden">
                </div>

                <div class="_inputs-admin flex center between f-warp">
                    <div class="input-holder c-100">
                        <label for="_admin-name">
                            <p>Name</p>
                            <input class="required" id="_admin-name" placeholder="insert admin Name" type="text">
                            <small></small>
                        </label>
                    </div>
                    <div class="input-holder c-100">
                        <label for="_admin-email">
                            <p>Email</p>
                            <input name="new_email" autocomplete="new_email" class="required" id="_admin-email"
                                   placeholder="insert admin Email" type="email">
                            <small></small>
                        </label>
                    </div>
                    <div class="input-holder password_input c-100">
                        <label for="_admin-email">
                            <p>Password</p>
                            <input autocomplete="off" placeholder="Password ..." name="password" class="required"
                                   id="_admin-password"
                                   type="text">
                            <span class="show-password"><img src=""></span>
                            <small></small>
                        </label>
                    </div>
                    <div class="input-holder c-100">
                        <label for="_admin-number">
                            <p>Contact Number</p>
                            <input class="required" id="_admin-number" placeholder="insert admin phone"
                                   type="number">
                            <small></small>
                        </label>
                    </div>
                    <div class="input-holder c-100">
                        <label for="_admin-role">
                            <p>Position | Role</p>
                            <select class="required" name="_admin-role" id="_admin-role">
                                <option value="">Select One</option>
                                <option value="1">Head</option>
                                <option value="2">Partner</option>
                                <option value="3">User</option>
                            </select>
                            <small></small>
                        </label>
                    </div>


                    <button class="_btn _btn-success _add-new-admin" type="submit">
                        Add
                    </button>
                    <button class="_btn _btn-primary _edit-admin" type="submit">
                        Edit
                    </button>

                </div>

            </div>

            <div class="dash-card _users-list c-63">
                <h2>Last Online</h2>
                <ul class="_users ovi-scroll _list">
                    @foreach($admins as $admin)
                        <li class="green-card flex f-warp between align-center">
                            <div class="user-info flex align-center">
                                <img src="{{$admin->img}}" alt="{{$admin->name}}">
                                <p>{{$admin->name}}</p>
                            </div>
                            <p class="_last_seen">
                                {{$admin->last_seen ? \Carbon\Carbon::parse($admin->last_seen)->format('h:m l') : ''}}
                            </p>
                            <input admin-id="{{$admin->id}}" admin-email="{{$admin->email}}"
                                   admin-role="{{$admin->role}}" type="hidden">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="dash-card _users-list c-32">
                <h2>Recent Change</h2>
                <ul class="_last-activities _list">
                    <li><p>Edit Name</p></li>
                    <li><p>Add new Admin</p></li>
                    <li><p>Delete an Admin</p></li>
                    <li><p>Edit Admin</p></li>
                </ul>


            </div>
@endsection