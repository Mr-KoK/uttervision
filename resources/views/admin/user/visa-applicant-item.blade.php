<div class="list-form">
    <div class="_spinner"></div>
    <div class="flex f-warp align-center">
        @forelse ($forms as $form)
            <div class="dash-card c-23 form-item">
                <div class="member-img t-center">
                    <img width="98" height="98" src="{{$form->user->getAvatar()}}" alt="avater">
                </div>
                <div class="information-form">
                    <div class="top-information">
                        <p class="flex">
                            <span>{{$form->country->name}}</span>
                            <small style="margin-left: auto">{{$form->created_at->format('d M Y') }}</small>
                        </p>
                    </div>
                    <h3>{{$form->user->name}}</h3>
                    <p>{{$form->user->pass_id ?: 'No Number'}}</p>
                    <div class="actions t-center">
                        <a class="btn-round green-btn" href="{{route('user-applicant-profile',$form->id)}}">view
                            more</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="py-2 t-center dash-card ">
                <h1>Ops!</h1>
                <p>Sry</p>
                <p>Forms Is Empty</p>
            </div>
        @endforelse
    </div>

</div>
@if(!empty($forms->links()))
    <div class="pagination-holder">
        {{$forms->links()}}
    </div>
@endif