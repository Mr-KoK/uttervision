@extends('admin.layout.master')


@section('head')
    <link rel="stylesheet" href='{{asset('assets/css/cpp/admin/profile-application.min.css')}}'>
    <title>Users List - UtterVision</title>
@endsection

@section('foot')
    <script src="{{asset('assets/js/admin/list-users.js')}}"></script>
@endsection()

@section('content')
    <h1>List Users</h1>
    <div class="container dash-card">
        <div class=" c-90 mauto">
            <table class="c-100 t-left">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Family</th>
                    <th>Country</th>
                    <th>Visas</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="" style="border-bottom: 1px dashed #ccc">
                        <td>{{$user->name}}</td>
                        <td>{{$user->family}}</td>
                        <td>{{$user->country}}</td>
                        <td>{{count($user->forms)}}</td>
                        <td>
                            <div class="actions flex align-center">
                                <button user-id="{{$user->id}}" title="Promote To Partner" style="padding: 4px 16px;margin-right: 5px" class="make-partner">PtP</button>
                                <img width="25" src="{{asset('assets/images/delete.svg')}}" alt="">
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection()
