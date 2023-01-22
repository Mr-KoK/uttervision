<div class="step-inf  dash-card">
    <div class="flex f-warp">
        <div class="c-47 ">
            <div class="group-text input-holder">
                <label><p>Group Name*</p><input class="group-name required" value="{{$s_group->name}}"
                                                type="text"><small></small></label>
            </div>
            <div class="group-text input-holder">
                <label><p>Group Description</p> <input class="group-description" value="{{$s_group->description}}"
                                                       type="text"><small></small></label>
            </div>
        </div>
        <div class="c-47 documents ">
            @if(count($s_group->documents) > 0)
                @foreach($s_group->documents as $key=>$document)
                    <label document-id="{{$document->id}}" for="i-{{$key}}">{{$document->name}}
                        <input checked document-id="{{$document->id}}" s_group_id={{$s_group->id}} class="document"
                               id="i-{{$key}}" type="checkbox" value="{{$document->name}}">
                    </label>
                @endforeach
            @else
                <label for="i-1"> passport
                    <input id="i-1" class="document" type="checkbox" value="passport">
                </label>

                <label for="i-2"> degree
                    <input id="i-2" class="document" type="checkbox" value="degree">
                </label>
            @endif
            <div class="flex align-center">
                <input type="text" class="new-document">
                <button s_group_id="{{$s_group->id}}" class="add-document _btn">Add More</button>
            </div>
        </div>

    </div>


    <div class="action-btns">
        <img g-id="{{$s_group->id}}" class="edit-group" src="{{asset('assets/images/admin/icons/edit-icon.svg')}}"
             alt="">
        <img g-id="{{$s_group->id}}" class="delete-group" src="{{asset('assets/images/admin/icons/delete.png')}}"
             alt="">
    </div>
</div>
<div class="flex f-warp relative _body_steps">

    <div class="_spinner show"></div>
    <div class="steps-holder c-50">

        @if(count($five_steps) > 0)
            <div class="dash-card bg-green t-center ">
                <p>5 Step Page</p>
            </div>
            @foreach($five_steps as $key=>$step)
                <div index="{{$step->index}}" step-id="{{$step->id}}"
                     class="dash-card collapse flex f-warp between align-center step draggable-item ui-sortable-handle">
                    <span class="c-32 text-over-dots" title="{{$step->name}}">{{$key+1}}- {{$step->name}}</span>
                    <p class="c-47 text-over-dots" title="{{$step->description}}">{{$step->description}}</p>
                    <img class="collapse-btn " step-id="{{$step->id}}"
                         width="32"
                         height="32"
                         src="{{asset('assets/images/admin/icons/edit-icon.svg')}}" alt=""/>

                    <div class="collapse-body  c-100">
                        <div class="flex between f-warp">
                            <div class="input-holder c-47 my-1">
                                <label for="_name">
                                    <p>Name</p>
                                    <input class="required _name" placeholder="Step Name"
                                           value="{{$step->name}}"
                                           type="text">
                                    <small></small>
                                </label>
                            </div>
                            <div class="input-holder c-47 my-1">
                                <label for="_name">
                                    <p>Description</p>
                                    <input class="required _description" placeholder="Step Name"
                                           value="{{$step->description}}"
                                           type="text">
                                    <small></small>
                                </label>
                            </div>
                            <div class="actions t-center c-100">
                                <img
                                        width="32"
                                        height="32"
                                        class="delete-step"
                                        step-id="{{$step->id}}" src="{{asset('assets/images/admin/icons/delete.png')}}"
                                        alt=""/>

                                <img
                                        width="32"
                                        height="32"
                                        class="update-step"
                                        step-id="{{$step->id}}"
                                        src="{{asset('assets/images/admin/icons/check.svg')}}"
                                        alt=""/>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if(count($five_steps)<=4)
                <div class="add-step">
                    +
                    <div class="step-information" id="add-holder-five-step">
                        <div class="input-holder c-100 my-1">
                            <label for="_name">
                                <p>Name</p>
                                <input class="required _name" id="_name" placeholder="Step Name"
                                       type="text">
                                <small></small>
                            </label>
                        </div>
                        <div class="input-holder c-100 my-1">
                            <label for="_description">
                                <p>Description</p>
                                <input class="_description" id="_description" placeholder="Step Description"
                                       type="text">
                                <small></small>
                            </label>
                        </div>
                        <div class="action-btns">
                            <button class="cancel-btn">
                                Cancel
                            </button>
                            <button position="0" group_id="{{$group_id}}" class="save-btn">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <div class="t-center">
                    <p>Capacity is complete</p>
                    <small>maximum number of steps is 5, delete or edit above steps</small>
                </div>
            @endif

        @else
            <div class="t-center">
                <h2>Any item isn't there!</h2>
                <div class="add-step">
                    +
                    <div class="step-information" id="add-holder-last-step">
                        <div class="input-holder c-100 my-1">
                            <label for="_name">
                                <p>Name*</p>
                                <input class="required _name" id="_name" placeholder="Step Name"
                                       type="text">
                                <small></small>
                            </label>
                        </div>
                        <div class="input-holder c-100 my-1">
                            <label for="_description">
                                <p>Description</p>
                                <input class="_description" id="_description" placeholder="Step Description "
                                       type="text">
                                <small></small>
                            </label>
                        </div>
                        <div class="action-btns">
                            <button class="cancel-btn">
                                Cancel
                            </button>
                            <button position="0" group_id="{{$group_id}}" class="save-btn">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    <div class="dashboard-user-step c-50">
        <div class="dash-card bg-green t-center ">
            <p>Last Step In Dashboard</p>
        </div>
        @foreach($last_step as $key=>$step)
            <div index="{{$step->index}}" step-id="{{$step->id}}"
                 class="dash-card collapse flex f-warp between align-center step draggable-item ui-sortable-handle">
                <span class="c-32 text-over-dots" title="{{$step->name}}">{{$key+1}}- {{$step->name}}</span>
                <p class="c-47 text-over-dots" title="{{$step->description}}">{{$step->description}}</p>
                <img class="collapse-btn " step-id="{{$step->id}}"
                     width="32"
                     height="32"
                     src="{{asset('assets/images/admin/icons/edit-icon.svg')}}" alt=""/>

                <div class="collapse-body  c-100">
                    <div class="flex between f-warp">
                        <div class="input-holder c-47 my-1">
                            <label for="_name">
                                <p>Name</p>
                                <input class="required _name" placeholder="Step Name"
                                       value="{{$step->name}}"
                                       type="text">
                                <small></small>
                            </label>
                        </div>
                        <div class="input-holder c-47 my-1">
                            <label for="_name">
                                <p>Description</p>
                                <input class="required _description" placeholder="Step Name"
                                       value="{{$step->description}}"
                                       type="text">
                                <small></small>
                            </label>
                        </div>
                        <div class="actions t-center c-100">
                            <img
                                    width="32"
                                    height="32"
                                    class="delete-step"
                                    step-id="{{$step->id}}" src="{{asset('assets/images/admin/icons/delete.png')}}"
                                    alt=""/>

                            <img
                                    width="32"
                                    height="32"
                                    class="update-step"
                                    step-id="{{$step->id}}"
                                    src="{{asset('assets/images/admin/icons/check.svg')}}"
                                    alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if(count($last_step)==0)
            <div class="add-step">
                +
                <div class="step-information">
                    <div class="input-holder c-100 my-1">
                        <label for="_name">
                            <p>Name</p>
                            <input class="required _name" id="_name" placeholder="Step Name"
                                   type="text">
                            <small></small>
                        </label>
                    </div>
                    <div class="input-holder c-100 my-1">
                        <label for="_description">
                            <p>Description</p>
                            <input class="_description" id="_description" placeholder="Step Description"
                                   type="text">
                            <small></small>
                        </label>
                    </div>
                    <div class="action-btns">
                        <button class="cancel-btn">
                            Cancel
                        </button>
                        <button position="1" group_id="{{$group_id}}" class="save-btn">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="t-center">
                <p>Capacity is complete</p>
                <small>maximum number of last step is 1, delete or edit above step</small>
            </div>
        @endif
    </div>
</div>
