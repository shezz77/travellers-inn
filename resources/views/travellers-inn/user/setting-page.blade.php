@extends('travellers-inn.layouts.frontend-main')

@section('plugin-stylesheet')
    <link href="{{ asset('css/banner.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datepicker/datePicker.css') }}" rel="stylesheet">

@endsection

@section('page-title-div-text', 'User Settings')
@include('travellers-inn.includes.frontend._page-title')

@section('title', 'Setting - ')
@section('content')
    <section class="settingSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="settingContent bg-ash">
                        <h4>Account Settings</h4>
                        <!-- Update Profile -->
                        <div class="changeEmail">
                            <p style="padding-left: 18px;">Update Personal Setting</p>
                            <div class="row">
                                <form action="{{ route('personal.update') }}" id="profile-form" method="post" enctype="multipart/form-data">

                                    {{ method_field('PUT') }}
                                    <div class="col-xs-12 col-sm-8">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" value="{{ $user ? $user->first_name : '' }}"  name="first_name" id="" placeholder="First Name" maxlength="255" data-parsley-errors-container="#first_name-error" required style="width: 79%">
                                        </div>
                                        <p id="first_name-error" style="color: #B94A48; margin-top: 10px; margin-bottom: 10px"></p>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" value="{{ $user ? $user->last_name : '' }}" name="last_name" id="" placeholder="Last Name" maxlength="255" data-parsley-errors-container="#last_name-error" required style="width: 79%">
                                        </div>
                                        <p id="last_name-error" style="color: #B94A48; margin-top: 10px; margin-bottom: 10px"></p>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" value="{{ $user ? $user->phone_number : '' }}" name="phone_number" id="" placeholder="Phone Number" maxlength="255"  style="width: 79%">
                                        </div>
                                        <p id="phone-error" style="color: #B94A48; margin-top: 10px; margin-bottom: 10px"></p>
                                        <div class="col-sm-12">
                                            <input type="datetime" class="form-control DOB" value="{{ $user ? $user->date_of_birth : '' }}"  name="date_of_birth" id="" placeholder="YYYY-MM-DD" data-parsley-errors-container="#DOB-error" required style="width: 79%">
                                        </div>
                                        <p id="DOB-error" style="color: #B94A48; margin-top: 10px; margin-bottom: 10px"></p>
                                        <div class="col-sm-12" style="margin-bottom: 20px;">
                                            <select class="form-control select-plugin select-country" id="select-country" name=""  style="width: 79%">
                                                <option selected value="{{ $user->state->country->id }}"> {{ $user->state->country->name }}</option>

                                                @foreach($countries as $country)
                                                    <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input class="form-control search-input" data-url="{{ url('state/list') }}" name="input-name" type="hidden" id="get-state-url">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="col-sm-12" style="margin-bottom: 20px;">
                                            <select class="form-control select-country select-plugin" name="state_id" id="select-state" style="width: 79%">
                                                <option disabled selected value="{{ $user->state->id }}">{{ $user->state->name }}</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-12">
                                            <button type="submit" class="btn buttonTransparent">Update Profile</button>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">

                                        <div class="profileImg">
                                            <img class="img-responsive" src="{{ asset('images/users/'. $user->id .'/' . $user->image ) }}" alt="">
                                        </div>
                                        {{--<a href="#aboutModal" data-toggle="modal" data-target="#myModal">--}}
                                        {{--                                            <img src="{{ asset('images/users/'. $user->id .'/' . $user->image ) }}" name="aboutme" width="100" height="100" class="">--}}
                                        <br><br>
                                        <div class="col-sm-12">
                                            <label class="control-label">Select File</label>
                                            <input type="file" class="image-upload" name="image" data-show-upload="false">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>

                        <!-- Change Password -->
                        <div class="changePassword">
                            <p>change Your Password</p>
                            <div class="row">
                                <form action="{{ route('password.update') }}" id="password-form" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Old Password" minlength="5" maxlength="255" data-parsley-errors-container="#oldPassword-error" required>
                                    </div>
                                    <p id="oldPassword-error" style="color: #B94A48; margin-top: 10px; margin-bottom: 10px"></p>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password" minlength="8" maxlength="255" data-parsley-errors-container="#newPassword-error" required>
                                    </div>
                                    <p id="newPassword-error" style="color: #B94A48; margin-top: 10px; margin-bottom: 10px"></p>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" data-parsley-equalto="#newPassword" placeholder="Confirm New Password" data-parsley-errors-container="#confirmPassword-error" required>
                                    </div>
                                    <p id="confirmPassword-error" style="color: #B94A48; margin-top: 10px; margin-bottom: 10px"></p>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn buttonTransparent">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    {{--<hr>--}}






                    <!-- Change Setting  -->
                        {{--<div class="changeSetting">--}}
                        {{--<p>Change Settings</p>--}}
                        {{--<div class="row">--}}
                        {{--<form action="" method="post">--}}
                        {{--<div class="form-check col-sm-12">--}}
                        {{--<input id="checkbox-1" class="checkbox-custom form-check-input" name="checkbox-1" type="checkbox">--}}
                        {{--<label for="checkbox-1" class="checkbox-custom-label form-check-label">Star Travel has periodic offers and deals on really cool destinations.</label>--}}
                        {{--</div>--}}
                        {{--<div class="form-check col-sm-12">--}}
                        {{--<input id="checkbox-2" class="checkbox-custom form-check-input" name="checkbox-1" type="checkbox">--}}
                        {{--<label for="checkbox-2" class="checkbox-custom-label form-check-label">Star Travel has fun company news, as well as periodic emails.</label>--}}
                        {{--</div>--}}
                        {{--<div class="form-check col-sm-12">--}}
                        {{--<input id="checkbox-3" class="checkbox-custom form-check-input" name="checkbox-1" type="checkbox">--}}
                        {{--<label for="checkbox-3" class="checkbox-custom-label form-check-label">I have an upcoming reservation.</label>--}}
                        {{--</div>--}}

                        {{--<div class="col-sm-12">--}}
                        {{--<button type="submit" class="btn buttonTransparent">Update Email Address</button>--}}
                        {{--</div>--}}
                        {{--</form>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--    @include('travellers-inn.user.includes._profile-image')--}}

@endsection


@section('plugin-script')
    <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datepicker/jqDatePicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/fileinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/user/custom.js') }}" type="text/javascript"></script>

    <script>
        $('.select-plugin').select2();
        $('.DOB').datePicker();
        $(".image-upload").fileinput(
            {
                showCaption: false,
                allowedFileExtensions: ["jpg", "png", "gif"]
            });
        $('#profile-form').parsley();
        $('#password-form').parsley();
    </script>


@endsection