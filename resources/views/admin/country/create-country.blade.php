@extends('admin.layout.master')


@section('head')
    <title>Create New Country - UtterVision</title>
    <script src="https://cdn.tiny.cloud/1/0qrafxldiipfkemz76cys6mtvr1u0imvi4h5n0pkz5g8wp7n/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('foot')
{{--    <script src="{{asset('assets/js/tinymce.min.js')}}"></script>--}}
    <script src="{{asset('assets/js/admin/admin-create-country.js')}}"></script>

@endsection

@section('content')
    <div class="container">
        <div class="header-section between flex f-warp">
            <h1>Create New Country</h1>
        </div>
        <div class="create-holder flex f-warp between">
            <div class="inputs-holder c-63 dash-card px-2 py-2 flex f-warp between align-center">

                <div class="input-holder c-47 my-1">
                    <label for="_admin-number">
                        <p>Name*</p>
                        <input class="required" id="_name" placeholder="Country Name"
                               type="text">
                        <small></small>
                    </label>
                </div>
                <div class="input-holder c-47 my-1">
                    <label for="_admin-number">
                        <p>Title*</p>
                        <input class="required" id="_title" placeholder="Country Seo Title"
                               type="text">
                        <small></small>
                    </label>
                </div>
                <div class="input-holder c-47 my-1">
                    <label for="_admin-number">
                        <p>Summery</p>
                        <input class="" id="_summery" placeholder="Summery About Country"
                               type="text">
                        <small></small>
                    </label>
                </div>
                <div class="input-holder c-47 my-1">
                    <label for="_admin-number">
                        <p>Meta Description</p>
                        <input class="" id="_description" placeholder="Country Seo Meta Description"
                               type="text">
                        <small></small>
                    </label>
                </div>
                <div class="input-holder c-47 my-1">
                    <label for="_admin-number">
                        <p>Select Country <span class="font-12"> ( if it`s a country )</span></p>

                        <select name="_countries" id="_short">
                            <option selected value="">Select Country</option>
                            @foreach($countries as $item)
                                <option continent="{{$item['continent']}}" flag="{{asset('assets/images/public/map-flags/'.$item['handle'].'.svg')}}" value="{{$item['code']}}">{{$item}} | {{$item['code']}}</option>
                            @endforeach
                        </select>
                        <small></small>
                    </label>
                </div>
                <div class="input-holder c-47 my-1">
                    <label for="_admin-number">
                        <p>Slug</p>
                        <input class="required" id="_slug" placeholder="Country Slug"
                               type="text">
                        <small></small>
                    </label>
                </div>
{{--                <div class="input-holder c-100">--}}
{{--                    <label for="_admin-number">--}}
{{--                        <p>Content</p>--}}
{{--                        <textarea class="c-100 tinymce-editor" rows="6" id="_body"></textarea>--}}
{{--                        <small></small>--}}
{{--                    </label>--}}
{{--                </div>--}}
                <div class="input-holder c-100">
                    <label for="_admin-number">
                        <p>Keywords</p>
                        <input type="text" class="c-100" id="_keywords" placeholder="Country Page Keywords">
                        <small></small>
                    </label>
                </div>
                <div class="input-holder c-47 my-1">
                    <label for="_admin-number">
                        <p>Admin</p>
                        <input readonly class="select-box" id="_admin"
                               admin-selected="{{Auth::guard('admin')->user()->id}}"
                               placeholder="{{Auth::guard('admin')->user()->name}}"
                               type="text">
                        <ul class="search-select-list hidden">
                            <input class="_search-input">
                            @foreach($admins as $admin)
                                <li class="_admin">{{$admin->name}}</li>
                            @endforeach
                        </ul>
                    </label>
                </div>

                <div class="input-holder c-47 my-1">
                    <label for="_step-group">
                        <p>Group Of Steps</p>
                        <select id="_step-group">
                            <option value="0">Select group steps</option>

                            @foreach($step_groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>

                    </label>
                </div>


            </div>

            <div class=" _summery c-32 ">

                <div class="summery-holder between f-warp flex dash-card ">
                    <div class="_spinner "></div>

                    <div class="input-holder c-100 my-1 flex">
                        <label for="_admin-number c-47">
                            <p>Points Map</p>
                            <input class="" id="_map" placeholder="Insert Point Map By X,Y"
                                   type="text">
                            <small></small>
                        </label>
                        <label for="_admin-number c-47">
                            <p>Show On Map</p>
                            <input class="" id="_show_on_map" type="checkbox">
                        </label>
                    </div>
                    <div class="input-holder mx-1 c-47">
                        <label for="_admin-number">
                            <p>Cover Image <span class="font-12 d-block">Desktop</span></p>
                            <img height="100" id="_cover-country-desktop" class="_cover-country-desktop _cover-img"
                                 src="{{asset('assets/images/admin/country/placeholder.png')}}"
                                 alt="cover image">
                        </label>
                    </div>
                    <div class="input-holder c-47">
                        <label for="_cover-country-mobile">
                            <p>Cover Image <span class="font-12 d-block">Mobile</span></p>
                            <img height="100" id="_cover-country-mobile" class="_cover-country-mobile _cover-img"
                                 src="{{asset('assets/images/admin/country/placeholder.png')}}"
                                 alt="cover image mobile">
                        </label>
                    </div>
                    <div class="input-holder c-47">
                        <label for="_admin-number">
                            <p>Flag Image</p>
                            <img width="100" class="_flag _cover-img" id="_flag"
                                 src="{{asset('assets/images/admin/country/question.png')}}"
                                 alt="flag image">
                        </label>
                    </div>
                    <div class="input-holder c-100 select-video">
                        <label for="_admin-number">
                            <p>Country Video</p>
                            <div class="video-base _video" id="_video">
                                <button>Upload Video</button>
                                <input type="text" class="src-video">
                            </div>
                        </label>
                    </div>
                    <div class="input-holder c-100">
                        <button class="_btn _btn-success" id="save-btn">
                            Add
                        </button>
                    </div>

                </div>

            </div>

        </div>
        <a title="Add More Country" class="btn-add absolute-btn" href="{{route('create-country')}}">+</a>

    </div>
@endsection