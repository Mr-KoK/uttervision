@extends('member.layout.master')


@section('head')
    <title>Member in Box | UtterVision</title>
    <link rel="stylesheet" href="{{asset('assets/css/cpp/member/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cpp/public/member-register.min.css')}}">
@endsection

@section('content')
    <div class="main-content client">
        <div class="box-body pl-15 pr-15 pb-20 activity mt-10">
            <div class="table-responsive">
                <div id="task-profile" role="grid">
                    <ul class="table-header align-items-center p-2 justify-content-between d-flex">

                        <li class="w-10 border-bottom-0 d-inline-block  sorting fs-14 font-w500"
                            tabindex="0" aria-controls="task-profile" rowspan="1"
                            colspan="1">PaymentID
                        </li>

                        <li class="w-10 border-bottom-0 d-inline-block sorting fs-14 font-w500"
                            tabindex="0">
                            ($)Amount
                        </li>


                        <li class="w-10 border-bottom-0 d-inline-block text-center sorting_disabled fs-14 font-w500"
                            rowspan="1" colspan="1">Payment Type
                        </li>

                        <li class="w-10 border-bottom-0 d-inline-block text-center sorting_disabled fs-14 font-w500"
                            rowspan="1" colspan="1">Due Date
                        </li>

                        <li class="w-10 border-bottom-0 d-inline-block text-center sorting_disabled fs-14 font-w500"
                            rowspan="1" colspan="1">Status
                        </li>


                    </ul>
                    <ul item-id="239"
                        class="p-2 position-relative table-row d-flex align-items-center justify-content-between flex-wrap overflow-hidden">

                        <li class="w-10">
                            <a href="#">#PAY-0298</a>
                        </li>

                        <li class="w-10">
                            <span class="font-weight-semibold">$298.00</span>
                        </li>

                        <li class="w-10 text-center">
                            Cash
                        </li>
                        <li class="w-10 text-center">
                            05-03-2021
                        </li>
                        <li class="w-10 text-center">
                            <span class="badge badge-danger-light">UnPaid</span>
                        </li>

                    </ul>
                    <ul item-id="239"
                        class="p-2 position-relative table-row d-flex align-items-center justify-content-between flex-wrap overflow-hidden">

                        <li class="w-10">
                            <a href="#">#PAY-0298</a>
                        </li>

                        <li class="w-10">
                            <span class="font-weight-semibold">$298.00</span>
                        </li>

                        <li class="w-10 text-center">
                            Cash
                        </li>
                        <li class="w-10 text-center">
                            05-03-2021
                        </li>
                        <li class="w-10 text-center">
                            <span class="badge badge-danger-light">UnPaid</span>
                        </li>

                    </ul>
                    <ul item-id="239"
                        class="p-2 position-relative table-row d-flex align-items-center justify-content-between flex-wrap overflow-hidden">

                        <li class="w-10">
                            <a href="#">#PAY-0298</a>
                        </li>

                        <li class="w-10">
                            <span class="font-weight-semibold">$298.00</span>
                        </li>

                        <li class="w-10 text-center">
                            Cash
                        </li>
                        <li class="w-10 text-center">
                            05-03-2021
                        </li>
                        <li class="w-10 text-center">
                            <span class="badge badge-danger-light">UnPaid</span>
                        </li>

                    </ul>
                    <ul item-id="239"
                        class="p-2 position-relative table-row d-flex align-items-center justify-content-between flex-wrap overflow-hidden">

                        <li class="w-10">
                            <a href="#">#PAY-0298</a>
                        </li>

                        <li class="w-10">
                            <span class="font-weight-semibold">$298.00</span>
                        </li>

                        <li class="w-10 text-center">
                            Cash
                        </li>
                        <li class="w-10 text-center">
                            05-03-2021
                        </li>
                        <li class="w-10 text-center">
                            <span class="badge badge-danger-light">UnPaid</span>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection