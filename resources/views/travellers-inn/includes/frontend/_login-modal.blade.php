{{--<div class="container-fluid">--}}
{{--<div class="row">--}}
{{--<div class="col-md-offset-4 col-lg-offset-4 col-md-4 col-lg-4">--}}
{{--<h1 class="text-center">Twitter Bootstrap Modal Login Popup</h1>--}}
{{--<button id='modal-launcher' class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login-modal">--}}
{{--Please sign In - Modal--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


{{--Login Modal--}}
<link rel="stylesheet" href="{{ asset('assets/modal/login/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/parsley.css') }}" type="text/css">




<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 17px;">
            <div class="modal-header login_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="myModalLabel">Login in Travellers Inn</h2>
            </div>
            <div class="modal-body" style="padding: 25px">
                <p>Travellers Inn is a site for professional and enthusiast travelers. It's 100% free, no registration required to view post</p>
                <br/>
                <div class="clearfix"></div>
                <div id='social-icons-conatainer'>
                    <form class="form-horizontal" role="form" id="form-login-modal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class='modal-body-left'>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} new">
                                <input type="email" id="username" placeholder="Enter your Email" name="email" class="form-control bg-ash"  required>
                                <i class="fa fa-user login-field-icon"></i>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} new">
                                <input type="password" id="password" placeholder="Password" name="password" class="form-control bg-ash"  required>
                                <i class="fa fa-lock login-field-icon"></i>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group new">
                                <a href="{{route('reset.password')}}" class="login-link text-center" style="float:left;">Lost your password?</a>
                                <div class="form-group" style="float:right;">
                                    <div class="" style="margin-right: 19px;">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="float: left;margin-right: 5px;">
                                        <span>Remember Me</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block buttonCustomPrimary" style="border-color:#ff891e;:hover border-color:#ff891e;">
                                Login
                            </button>
                            <div class="dontHaveAccount" style="margin-top:10px; text-align: center">
                                <p>Don’t have an Account?<a href="{{route('register')}}"> Sign up</a></p>
                            </div>
                        </div>
                    </form>

                    <div class='modal-body-right'>
                        <div class="modal-social-icons">
                            <a href='{{ route('social.login', 'facebook') }}' class="btn btn-default facebook social-login"> <i class="fa fa-facebook modal-icons"></i> Sign In with Facebook </a>
                            <a href='{{ route('social.login', 'twitter') }}' class="btn btn-default twitter social-login"> <i class="fa fa-twitter modal-icons"></i> Sign In with Twitter </a>
                            <a href='{{ route('social.login', 'google') }}' class="btn btn-default google social-login"> <i class="fa fa-google-plus modal-icons"></i> Sign In with Google </a>
                            <a href='#' class="btn btn-default linkedin"> <i class="fa fa-linkedin modal-icons"></i> Sign In with Linkedin </a>
                        </div>
                    </div>
                    {{--<div id='center-line' style="margin-top: 38px"> OR </div>--}}
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer login_modal_footer">
            </div>
        </div>
    </div>
</div>



