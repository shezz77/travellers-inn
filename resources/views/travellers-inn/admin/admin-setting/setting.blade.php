@extends('travellers-inn.layouts.admin-panel-main')

@section('title', "Users")

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datepicker/datePicker.css') }}" rel="stylesheet">

    <style>
        .file-input-wrapper{
            background-color: #c3c2c5;
            opacity: 0.7;
            border-radius: 8px;
            margin-left: 10px;
        }
    </style>
@endsection

@section('content')
    <section class="settingSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="settingContent bg-ash">
                        <h4>Account Settings</h4>
                        <!-- Update Profile -->
                        <div class="changeEmail">
                            <p style="padding: 0;">Update Personal Setting</p>
                            <div class="row">
                                <form action="{{ route('personal.update') }}" id="profile-form" method="post" enctype="multipart/form-data">

                                    {{ method_field('PUT') }}
                                    <div class="col-xs-12 col-sm-8" style="padding: 0;">
                                        <div class="col-sm-12" style="margin-bottom: 15px;">
                                            <input type="text" class="form-control" value="{{ $user ? $user->first_name : '' }}"  name="first_name" id="" placeholder="First Name" required style="width: 79%">
                                        </div>
                                        <div class="col-sm-12" style="margin-bottom: 15px;">
                                            <input type="text" class="form-control" value="{{ $user ? $user->last_name : '' }}" name="last_name" id="" placeholder="Last Name" required style="width: 79%">
                                        </div>
                                        <div class="col-sm-12" style="margin-bottom: 15px;">
                                            <input type="text" class="form-control" value="{{ $user ? $user->user_name : '' }}" name="user_name" id="" placeholder="User Name" required style="width: 79%">
                                        </div>
                                        <div class="col-sm-12" style="margin-bottom: 15px;">
                                            <input type="number" class="form-control" value="{{ $user ? $user->phone_number : '' }}" name="phone_number" id="" placeholder="Phone Number" required style="width: 79%">
                                        </div>
                                        <div class="col-sm-12" style="margin-bottom: 15px;">
                                            <input type="datetime" class="form-control DOB" value="{{ $user ? $user->date_of_birth : '' }}"  name="date_of_birth" id="" placeholder="YYYY-MM-DD" required style="width: 79%">
                                        </div>
                                        <div class="col-sm-12" style="margin-bottom: 15px;">
                                            <select class="form-control " id="select-country" name=""  style="width: 79%">
                                                <option selected value="{{ $user->state->country->id }}"> {{ $user->state->country->name }}</option>

                                                @foreach($countries as $country)
                                                    <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input class="form-control search-input" data-url="{{ url('state/list') }}" name="input-name" type="hidden" id="get-state-url">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="col-sm-12" style="margin-bottom: 15px;">
                                            <select class="form-control " name="state_id" id="select-state" style="width: 79%">
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
                                            <input type="file" class="image" name="image" data-show-upload="false">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>

                        <!-- Change Password -->
                        <div class="changePassword">
                            <p>Change Your Password</p>
                            <div class="row">
                                <form action="{{ route('password.update') }}" id="password-form" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-sm-6" style="margin-bottom: 15px; float: none">
                                        <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Old Password" required>
                                    </div>
                                    <div class="col-sm-6" style="margin-bottom: 15px;float: none">
                                        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password" minlength="8" required>
                                    </div>
                                    <div class="col-sm-6" style="margin-bottom: 15px;float: none;">
                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" data-parsley-equalto="#newPassword" placeholder="Confirm New Password" required>
                                    </div>
                                    <div class="col-sm-6" style="margin-bottom: 15px;">
                                        <button type="submit" class="btn buttonTransparent">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/pages/datatables.js') }}"></script>

    <script src="{{ asset('js/user/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datepicker/jqDatePicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/fileinput.min.js') }}" type="text/javascript"></script>

    <script>
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