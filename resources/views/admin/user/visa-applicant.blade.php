@extends('admin.layout.master')


@section('head')
    <link rel="stylesheet" href='/assets/css/cpp/admin/applicants.min.css'>
    <title>List Applicants</title>
@endsection

@section('foot')
    <script src="/assets/js/admin/applicants.js"></script>
@endsection()

@section('content')
    <h1>List Applicants</h1>

    <div class="forms-holder">
        <div class="ajax-forms">
            @include('admin.user.visa-applicant-item')
        </div>
    </div>
@endsection()
