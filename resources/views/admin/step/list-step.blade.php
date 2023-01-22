@extends('admin.layout.master')

@section('head')
    <title>List Steps - UtterVision</title>
    <link rel="stylesheet" href="{{asset('assets/lib/juqery/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/admin/all-steps.min.css')}}">
@endsection

@section('foot')
    <script src="{{asset('assets/js/vendor/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/admin/list-steps.js')}}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="header-section between flex f-warp">
            <h1>Steps</h1>
        </div>
        <div class="select-group-holder c-23">
            <label  for="group_step">
                <span class="info">Select Group For Step:</span>
                <input placeholder="Search group name then select" type="text" name="steps_group" id="group_step"/>
                <span class="add_step_group" id="add_group">+</span>
            </label>

            <div class="g-list">
                <div class="_spinner"></div>
                <ul id="group_step_list">
                </ul>
            </div>


        </div>

        <div class="_steps">
            <div class="ajax-place">
                <div class="steps-holder">
                    <div class="_spinner" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection