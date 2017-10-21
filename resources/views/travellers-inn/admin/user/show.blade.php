@extends('travellers-inn.layouts.admin-panel-main')

@section('title', 'User Profile')

@section('content')
    <div class="profile-banner" style="background-image: url({{ asset('admin-panel-assets/images/stock/1epgUO0.jpg') }});">
        <div class="col-sm-3 avatar-container">
            <img src="{{ $user->image ?  asset('images/users/'. $user->id .'/' . $user->image) : asset('images/default.png') }}" class="img-circle profile-avatar" alt="User avatar" height="150px" style="width:160px">
        </div>
        {{--<div class="col-sm-12 profile-actions text-right">--}}
            {{--<button type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Friends</button>--}}
            {{--<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Send Message</button>--}}
            {{--<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-ellipsis-v"></i></button>--}}
        {{--</div>--}}
    </div>
    <div class="content user-info">
        <div class="row">
            <div class="col-sm-3">
                <!-- Begin user profile -->
                <div class="text-center user-profile-2">
                    <h4><b>{{ $user->first_name }}</b> {{ $user->last_name }}</h4>

                    <div class="well">
                        <div class="row">
                            <div class="col-md-8">
                                <div class=""><a href="{{ route('role.management', $user->id) }}"><b>Assigned Roles</b></a></div>
                            </div>
                            <div class="col-md-3"><a href="{{ route('role.management', $user->id) }}"><span class="fa fa-edit"></span></a></div>
                        </div>
                        @foreach( $user->roles as $role)
                            <a href="{{ route('role.show', $role->id) }}" class="btn-lightblue-2 h4 btn-block">{{ $role->display_name }}</a>
                        @endforeach
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">{{ $user->posts->count() }}</span>
                            Posts
                        </li>
                        <li class="list-group-item">
                            <span class="badge">{{count($user->following)}}</span>
                            Followers
                        </li>
                        <li class="list-group-item">
                            <span class="badge">{{count($user->likes)}}</span>
                            Likes
                        </li>
                    </ul>

                </div><!-- End div .box-info -->
                <!-- Begin user profile -->
            </div><!-- End div .col-sm-4 -->

            <div class="col-sm-9">
                <div class="widget widget-tabbed">
                    <!-- Nav tab -->
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#my-timeline" data-toggle="tab"><i class="fa fa-pencil"></i> Posts</a></li>
                        <li><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> About</a></li>
                        <li><a href="#followers" data-toggle="tab"><i class="fa fa-user"></i> Followers</a></li>
                    </ul>
                    <!-- End nav tab -->
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <!-- Tab timeline -->
                        <div class="tab-pane animated active fadeInRight" id="my-timeline">
                            <div class="user-profile-content">

                                <!-- Begin timeline -->
                                <div class="the-timeline">
                                    <ul>
                                        @foreach($user->posts as $post)
                                            <li>
                                                <div class="the-date">
                                                    <span>{{ date('j ', strtotime($post->created_at)) }}</span>
                                                    <small>{{ date('M ', strtotime($post->created_at)) }}</small>
                                                </div>
                                                <h4><a href="{{ route('posts.show', $post->id) }}">{{ $post->post_title }} <span class="glyphicon glyphicon-new-window"></span></a></h4>
                                                <p>
                                                    {!! substr($post->post_description, 0, 350)!!}{{ strlen($post->post_description) > 350 ? '......' : ''}}
                                                </p>
                                            </li>
                                            <li class="the-year"><p>{{ date('Y ', strtotime($post->created_at)) }}</p></li>
                                        @endforeach



                                    </ul>
                                </div><!-- End div .the-timeline -->
                            </div><!-- End div .user-profile-content -->
                        </div><!-- End div .tab-pane -->
                        <!-- Tab about -->
                        <div class="tab-pane animated fadeInRight" id="about">
                            <div class="user-profile-content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5><strong>CONTACT</strong> ME</h5>
                                        <address>
                                            <strong>Phone</strong><br>
                                            <abbr title="Phone">{{ $user->phone_number }}</abbr>
                                        </address>
                                        <address>
                                            <strong>Email</strong><br>
                                            <a href="mailto:#">{{ $user->email }}</a>
                                        </address>
                                        <address>
                                            <strong>Website</strong><br>
                                            <a href="http://r209.com">http://r209.com</a>
                                        </address>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5><strong>PERSONAL</strong> INFO</h5>
                                        <div class="table-responsive">
                                            <table data-sortable class="table">
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>{{ $user->first_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Last Name</td>
                                                    <td>{{ $user->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>User Name</td>
                                                    <td>{{ $user->user_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>{{ $user->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>State</td>
                                                    <td>{{ $user->state->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Country</td>
                                                    <td>{{ $user->state->country->name }}</td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                </div><!-- End div .row -->
                            </div><!-- End div .user-profile-content -->
                        </div><!-- End div .tab-pane -->

                        <!-- Tab follower -->
                        <div class="tab-pane animated fadeInRight" id="followers">
                            @foreach($user->following as $follower)
                                <div class="col-md-2" style="margin-top: 20px;padding:0">
                                    <a href="{{ route('admin.user.show', $follower->id) }}" style="display:block;text-align: center"><img
                                                src="{{ asset('images/users/'. $follower->id .'/' . $follower->image ) }}"
                                                name="aboutme" width="70" height="70" class="img-circle"></a>
                                    <a href="{{ route('admin.user.show', $follower->id) }}" style="display:block;text-align: center"><h5>{{($follower->user_name)}}</h5></a>
                                </div>
                            @endforeach
                        </div><!-- End div .tab-pane -->

                    </div><!-- End div .tab-content -->
                </div><!-- End div .box-info -->
            </div>
        </div>
    </div>
@endsection
