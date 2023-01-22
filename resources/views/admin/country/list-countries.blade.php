@extends('admin.layout.master')

@section('head')
    <title>UtterVision Countries</title>
    <link rel="stylesheet" href="{{asset('assets/css/cpp/admin/all-countries.min.css')}}">
@endsection

@section('foot')
    <script src="{{asset('assets/js/admin/all-countries.js')}}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="header-section between my-2 flex f-warp">
            <h1>Countries</h1>
        </div>
        <div class="_countries">
            @include('admin.country.load')
        </div>
        <a title="Add More Country" class="btn-add d-inline-block" href="{{route('create-country')}}">+</a>

    </div>


    </div>
@endsection