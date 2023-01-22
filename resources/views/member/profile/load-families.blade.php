<div class="box">
    <div class="box-header d-flex">
        <div class="me-auto">
            <h4 class="card-title m-0 fs-18 fw-normal">Your <span class="color-9">Information</span></h4>
            <p class="fs-12">Select and inset Your and Your Family Information</p>
        </div>
        <div class="box-right d-flex">
            <div class="sm-f-wrap d-flex justify-content-between">
                <ul class="user-list">
                    <li class="main-user active">
                        <img
                                src="{{$user->img ?: asset('assets/images/admin/icons/avatar-placeholder.png')}}"
                                class="img-user-avatar"
                                alt="user">
                    </li>
                    @foreach($user->families as $key=>$family)
                        <li index="family-{{$key}}" class="family-user"><img
                                    src="{{$family->img ?: asset('assets/images/admin/icons/avatar-placeholder.png')}}" alt="user"></li>
                    @endforeach
                    <li class="add-new-user">
                        <button title="add new family" class="icon-add-new bg-color-14 add-new-family">
                            <i class="bx bx-plus color-white"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bodies">
        <div class="profile-body main-body active">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group">
                            <label class="form-label">First Name*</label>
                            <input id="name" value="{{$user->name}}" class="form-control required" placeholder="your name">
                            <span class="m-error"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group">
                            <label class="form-label">Last Name*</label>
                            <input id="family" value="{{$user->family}}" class="form-control required" placeholder="your family">
                            <span class="m-error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group"><label class="form-label">Country*:</label>
                            <select
                                    id="country"
                                    name="attendance"
                                    class="form-control required custom-select select2 select2-hidden-accessible"
                                    data-placeholder="Select Department" tabindex="-1" aria-hidden="true"
                                    data-select2-id="select2-data-22-9i9m">
                                <option data-select2-id="select2-data-24-ktnv">Select Country</option>
                                @foreach($countries as $key=>$country)
                                    <option {{$user->country == $country['handle'] ? 'selected' : '' }} value="{{$country['handle']}}">{{$country['handle']}}</option>
                                @endforeach
                            </select>
                            <span class="select2 select2-container select2-container--default" dir="ltr"
                                  data-select2-id="select2-data-23-72at" style="width: 100%;">
                                <span class="selection">
                                    <span class="select2-selection select2-selection--single" role="combobox"
                                          aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                          aria-labelledby="select2-attendance-92-container"
                                          aria-controls="select2-attendance-92-container">
                                        <span class="select2-selection__rendered" id="select2-attendance-92-container"
                                              role="textbox" aria-readonly="true" title="Select Department"></span>
							<span class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span>
							</span>
							</span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group">
                            <label class="form-label">Passport ID</label>
                            <input id="pass_id" value="{{$user->pass_id}}" class="form-control"
                                   placeholder="your passport number">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group">
                            <label class="form-label">Birthday:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class='fa fa-birthday-cake'></i></div>
                                </div>
                                <input value="{{\Carbon\Carbon::parse($user->birthday)->format('Y-m-d')}}" id="birthday"
                                       class="form-control fc-datepicker birthday" placeholder="DD-MM-YYY" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input id="phone_no" value="{{$user->phone}}" class="form-control"
                                   placeholder="your phone number">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-24"><label class="form-label">About Me:</label>
                    <textarea id="bio" class="form-control rounded-5" placeholder="more about me" name="text" cols="30"
                              rows="6">{{$user->bio}}</textarea>
                </div>
                <div class="row">

                </div>
            </div>
            <div class="gr-btn mt-15 justify-content-center text-center">
                @if(!$user->isVerify())
                    <button class="btn btn-danger btn-lg mr-15 fs-13">Account Verified</button>
                @endif
                <button class="btn btn-primary mb-10 btn-lg fs-13 save-main-user">Save Changes</button>
            </div>
        </div>

        @foreach($user->families as $key=>$family)
            <div class="profile-body family-body" index="family-{{$key}}">
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-6 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">First Name*</label>
                                <input id="name-{{$family->id}}" value="{{$family->name}}"  class="form-control required" placeholder="Name">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">Last Name*</label>
                                <input id="family-{{$family->id}}"  value="{{$family->family}}" class="form-control required pass-id" placeholder="Family">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">Passport ID</label>
                                <input id="pass-id-{{$family->id}}" {{$family->same_pass == 1 ? 'disabled' : ''}} type="text" value="{{$family->same_pass ? '' : $family->pass_id}}" class="form-control pass-id" placeholder="ID">
                                <label for="same_pass-{{$family->id}}" class="form-label p-2">
                                    <input id="same_pass-{{$family->id}}" {{$family->same_pass ? 'checked' : ''}} class="same_pass_input"  type="checkbox">
                                    with my passport
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">Relation*</label>
                                <select
                                        id="relation-{{$family->id}}"
                                        name="new_relation"
                                        class="form-control required custom-select select2 select2-hidden-accessible"
                                        data-placeholder="Select Department" tabindex="-1" aria-hidden="true"
                                        data-select2-id="select2-data-22-9i9m">
                                    <option {{$family->relation == 0 ? 'selected' : ''}} value="0">Spouse</option>
                                    <option {{$family->relation == 1 ? 'selected' : ''}} value="1">Child</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-24">
                            <div class="form-group">
                                <label class="form-label">Birthday:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class='fa fa-birthday-cake'></i></div>
                                    </div>
                                    <input id="birthday-{{$family->id}}" value="{{\Carbon\Carbon::parse($family->birthday)->format('Y-m-d')}}"  class="form-control fc-datepicker br-{{$family->id}} birthday"
                                           placeholder="DD-MM-YYY" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-24">
                            <div class="form-group"><label class="form-label">Avatar:</label>
                                <div class="input-group file-browser">
                                    <img width="40" height="40" class="avatar-preview rounded-circle mr-4"
                                         src="{{$family->img ?: asset('assets/images/admin/icons/avatar-placeholder.png')}}"
                                         alt="new family avatar">
                                    <input  type="text" class="form-control border-end-0 browse-file" placeholder="choose"
                                           readonly="">
                                    <label class="input-group-append mb-0"> <span class="btn ripple btn-light">
                                        Browse
                                        <input id="avatar-{{$family->id}}" type="file" class="family_avatar" style="display: none;" multiple="">
                                    </span>
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <dvi class="col-md-12 col-sm-12 mb-24">
                            <div class="form-group mb-24"><label class="form-label">Description:</label>
                                <textarea id="description-{{$family->id}}" class="form-control rounded-5" placeholder="about this family" name="description"
                                          cols="30"
                                          rows="6">{{$family->description}}</textarea>
                            </div>
                        </dvi>

                    </div>

                </div>
                <div class="gr-btn mt-15 justify-content-center text-center">
                    <button family-id="{{$family->id}}" class="btn btn-danger btn-lg fs-13 delete-family-btn">delete family</button>
                    <button family-id="{{$family->id}}" class="btn btn-primary btn-lg fs-13 edit-family-btn">edit family</button>
                </div>
            </div>
        @endforeach

        <div class="profile-body new-body ">
            <div class="box-body">
                <div class="row">

                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group">
                            <label class="form-label">First Name*</label>
                            <input id="new_name" class="form-control required" placeholder="Name">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group">
                            <label class="form-label">Last Name*</label>
                            <input id="new_family" class="form-control required" placeholder="Family">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group">
                            <label class="form-label">Passport ID</label>
                            <input id="new_pass_id" class="form-control pass-id" placeholder="ID">
                            <label for="new_same_pass" class="form-label p-2">
                                <input class="same_pass_input" id="new_same_pass" type="checkbox">
                                with my passport
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group">
                            <label class="form-label">Relation*</label>
                            <select
                                    id="new_relation"
                                    name="new_relation"
                                    class="form-control required custom-select select2 select2-hidden-accessible"
                                    data-placeholder="Select Department" tabindex="-1" aria-hidden="true"
                                    data-select2-id="select2-data-22-9i9m">
                                <option value="">Select Relation</option>
                                <option value="0">Spouse</option>
                                <option value="1">Child</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group">
                            <label class="form-label">Birthday:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class='fa fa-birthday-cake'></i></div>
                                </div>
                                <input id="new_birthday" class="form-control fc-datepicker birthday"
                                       placeholder="DD-MM-YYY" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-24">
                        <div class="form-group"><label class="form-label">Avatar:</label>
                            <div class="input-group file-browser">
                                <img width="40" height="40" class="avatar-preview rounded-circle mr-4"
                                     src="{{asset('assets/images/admin/icons/avatar-placeholder.png')}}"
                                     alt="new family avatar">
                                <input type="text" class="form-control border-end-0 browse-file" placeholder="choose"
                                       readonly="">
                                <label class="input-group-append mb-0"> <span class="btn ripple btn-light">
                                        Browse
                                        <input id="new_family_avatar" type="file" class="family_avatar" style="display: none;" multiple="">
                                    </span>
                                </label>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <dvi class="col-md-12 col-sm-12 mb-24">
                        <div class="form-group mb-24"><label class="form-label">Description:</label>
                            <textarea id="new_description" class="form-control rounded-5" placeholder="about this family" name="description"
                                      cols="30"
                                      rows="6"></textarea>
                        </div>
                    </dvi>

                </div>

            </div>
            <div class="gr-btn mt-15 justify-content-center text-center">
                <button class="btn btn-primary btn-lg fs-13 add-family-btn">add family</button>
            </div>
        </div>
    </div>

</div>
