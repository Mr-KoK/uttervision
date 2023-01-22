<div class="countries-holder">
    <div class="_spinner"></div>
    @forelse ($countries as $country)
        <div class="dash-card flex align-center">
            <img class="_flag-img " width="40" height="40" src="{{$country->img}}" alt="{{$country->title}}">
            <div class="country-summery c-75">
                <h2>
                    {{$country->name}}
                </h2>
                <p>
                     {{$country->abstract}}
                </p>
            </div>
            <div class="_country-actions flex align-center between c-30 ">
                <a target="_blank" title="show country page" href="{{$country->getUrl()}}"><img width="40"
                                                           src="{{asset('/assets/images/admin/icons/show.png')}}"
                                                           alt="show-page"></a>
                <a  title="edit country" href="{{$country->editUrl()}}"><img width="40" src="{{asset('/assets/images/admin/icons/edit.png')}}"
                                                      alt="edit-page"></a>
                <a class="_delete-country" country-id="{{$country->id}}" title="delete country" href="#"><img width="40"
                                                                                src="{{asset('/assets/images/admin/icons/delete.png')}}"
                                                                                alt="delete-page"></a>
                <label for="_admin-number c-47">
                    <p class="t-center">Map</p>
                    <input {{$country->show_on_map ? 'checked' : ''}} country-id="{{$country->id}}" class="_show_on_map"  type="checkbox">
                </label>
            </div>

        </div>
    @empty
        <div class="py-2 t-center dash-card ">
            <h1>Ops!</h1>
            <p>Sry</p>
            <p>no Country is there</p>
            <a class="d-inline-block _btn _btn-success" href="{{route('create-country')}}">Add Your First Country</a>
            <div>
                <img src="{{asset('assets/images/admin/icons/no-item.png')}}" alt="">
            </div>
        </div>
    @endforelse

</div>
@if(!empty($countries->links()))
    <div class="pagination-holder">
       {{$countries->links()}}
    </div>
@endif





