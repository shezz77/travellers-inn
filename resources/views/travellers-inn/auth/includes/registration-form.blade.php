<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="border-radius: 28px;">
                <h2 class="modal-title packagesFilter" id="myModalLabel" style="padding:15px 0 0 25px;margin:0;border-radius: 25px;">Register in Travellers Inn</h2>
                <div class="panel-body">
                    <form class="form-horizontal" id="register-form" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        {{--<label for="first_name" class="col-md-4 control-label">First Name:</label>--}}
                        <div class="row" style="margin: 0 0  15px 0;">
                            <div class="col-md-6 {{ $errors->has('First Name') ? ' has-error' : '' }}">
                                <input id="first_name" type="text" class="form-control bg-ash" name="first_name" value="{{ old('first_name') }}" required autofocus maxlength="255" placeholder="First Name" style="height: 40px;">

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>



                            <div class="col-md-6 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <input id="last_name" type="text" class="form-control bg-ash" name="last_name" value="{{ old('last_name') }}" required maxlength="255" placeholder="Last Name" style="height: 40px;">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin: 0 0  15px 0;">
                            <div class="col-md-6 {{ $errors->has('user_name') ? ' has-error' : '' }}">
                                <input id="user_name" type="text" class="form-control bg-ash" name="user_name" value="{{ old('user_name') }}" required maxlength="255" placeholder="User Name" style="height: 40px;">

                                @if ($errors->has('user_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control bg-ash" name="email" value="{{ old('email') }}" required maxlength="255" placeholder="Email Address" style="height: 40px;">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin: 0 0  15px 0;">

                            <div class="col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control bg-ash" name="password" required maxlength="20" placeholder="Password" style="height: 40px;">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control bg-ash" name="password_confirmation" data-parsley-equalto="#password" required maxlength="20" placeholder="Confirm Password" style="height: 40px;">
                                @if ($errors->has('password-confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password-confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin: 0 0  15px 0;">
                            {{--<label for="DOB" class="col-md-2 col-md-offset-2 control-label">DOB:</label>--}}

                            <div class="col-md-6">
                                <input id="DOB" type="text" class="form-control DOB bg-ash" name="date_of_birth" value="{{ old('date_of_birth') }}" required placeholder="Select Date of Birth">
                                @if ($errors->has('date_of_birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--<label for="gender" class="col-md-1 control-label">Gender:</label>--}}
                            <div class="col-md-6">
                                <select class="form-control bg-ash" id="gender" required name="gender">
                                    <option disabled selected value>Select Gender </option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin: 0 0  15px 0;">
                            <div class="col-md-6 {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <input id="phone_number" type="number" class="form-control bg-ash" name="phone_number" value="{{ old('phone_number') }}" placeholder="Enter your Phone Number" style="height: 40px;">

                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control bg-ash" name="address" value="{{ old('address') }}" required placeholder="Enter your Address" style="height: 40px;">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="row" style="margin: 0 0  15px 0;">
                            <div class="col-md-6">
                                <select class="form-control select-plugin bg-ash" id="select-country" required name="category_id" style="height: 40px;">
                                    <option disabled selected value>Select your country </option>
                                    @foreach($countries as $country)
                                        <option value='{{ $country->id }}' {{ $country->hasState(old('state_id')) ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <select class="form-control select-country select-plugin bg-ash" id="select-state" name="state_id" required style="height: 40px;">
                                    <option disabled selected value>Select your state </option>
                                </select>
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input class="form-control search-input" data-url="{{ url('state/list') }}" name="input-name" type="hidden" id="get-state-url">
                        <div class="form-group" style="margin-top: 20px">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-block buttonCustomPrimary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>