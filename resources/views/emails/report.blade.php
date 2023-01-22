<html>

<head>
    <meta charset="utf-8"/>
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
{{--    @include('layout.head')--}}
</head>

<body>
<div class="container my-5">
    <div class="row">
        <div class="col-12" style="text-align: right">
            <div class="mb-4">
                <img width="150px" height="100px" src="{{asset('assets/images/svg/footer-loho.svg')}}" alt="">
            </div>
            <div>
                <p>
                    <?php
                    $mytime = Carbon\Carbon::now();
                    ?>
                    {{ $mytime->toDateTimeString() }} Report A Bug:
                </p>
            </div>
            <div>
                <p style="text-align: justify" dir="rtl">
                    {{$msg}}

                    <br>
                    {{$line}}
                </p>
            </div>
            <div class="mt-4">
                <h3>
                    Be Happy!
                    Mr Mehrdad
                </h3>
            </div>
        </div>
    </div>
</div>
</body>

</html>
