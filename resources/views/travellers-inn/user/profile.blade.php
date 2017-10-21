@extends('travellers-inn.layouts.frontend-main')
@section('plugin-stylesheet')
    <link href="{{ asset('css/banner.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection
@section('slider')
    <div class="col-sm-6">
        <h1 class="">{{$user->first_name . ' ' .$user->last_name}}</h1>
        <h2 class="">{{ $user->state->name }}
            <small>{{$user->state->country->name}}</small>
        </h2>
    </div>
@endsection
{{--@section('page-title-div-text', "$user->user_name User Profile")--}}
@section('title', 'User Profile - ')
@section('content')
    <hr class="">
    <div class="container target "style="margin-top: 100px">
        <br>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-muted" contenteditable="false">Profile</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Joined</strong></span>{{ date('M j, Y h:ia', strtotime($user->created_at)) }}
                    </li>
                    {{--<li class="list-group-item text-right"><span class="pull-left"><strong--}}
                    {{--class="">Last seen</strong></span> Yesterday--}}
                    {{--</li>--}}
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Real name</strong></span>{{($user->first_name)}}  {{($user->last_name)}}
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Role: </strong></span>
                        @foreach($user->roles as $role)
                            {{ $role->display_name }}
                        @endforeach
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">Tags

                    </div>
                    <div class="panel-body">
                        @foreach($user->hashTags as $hashTag)
                            <a class="label label-info" href="{{ route('hash-tags.posts', $hashTag->id) }}">{{ $hashTag->name }}</a>
                        @endforeach
                    </div>
                </div>

                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i>

                    </li>
                    {{--<li class="list-group-item text-right"><span class="pull-left"><strong--}}
                    {{--class="">Shares</strong></span> 125--}}
                    {{--</li>--}}
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Likes</strong></span> {{count($user->likes)}}
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Posts</strong></span> {{count($user->posts)}}
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Followers</strong></span> {{count($user->following)}}
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body"><i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i>
                        <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
                                class="fa fa-google-plus fa-2x"></i>

                    </div>
                </div>
            </div>
            <div class="col-sm-9" style="" contenteditable="false">
                <div class="panel panel-default target">
                    <div class="panel-heading" contenteditable="false">User Approve Post</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="thumbnail">
                                @foreach($user->posts as $post)
                                    @if($post->status == 1 )
                                        @foreach($postUploadDatas = $post->postUploadedDatas as $postUploadData)
                                            <div class="col-md-4">
                                                <a class="" href="{{ route('posts.show', $post->id) }}">
                                                    @if($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6)
                                                        <img src="{{ asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload ) }}"
                                                             alt="deal-image" style="height: 180px; width:245px;margin: 0;">
                                                    @elseif($post->contant_id == 4)
                                                        <img src="{{ $postUploadData->post_upload }}"
                                                             alt="blog-single-image" style="height: 180px; width:245px">
                                                    @endif
                                                </a>
                                                <div class="caption" style="padding: 3px">
                                                    <h5>
                                                        <a href="{{ route('posts.show', $post->id) }}"
                                                           class="media-heading">{!! substr($post->post_title, 0, 20)!!}.</a>
                                                    </h5>
                                                    <p>
                                                        {!! substr($post->post_description, 0, 30)!!}
                                                    </p>
                                                </div>
                                            </div>
                                            @break
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default target">
                    <div class="panel-heading" contenteditable="false">User Pending Posts</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="thumbnail">
                                @foreach($user->posts as $post)
                                    @if($post->status == 0 && \App\Utils\AuthWrapper::loggedInUser()->id == $post->user_id)
                                        @if($post->is_rejected != 1)
                                            @foreach($postUploadDatas = $post->postUploadedDatas as $postUploadData)
                                                <div class="col-md-4">
                                                    <a class="" href="{{ route('posts.show', $post->id) }}">
                                                        @if($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6)
                                                            <img src="{{ asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload ) }}"
                                                                 alt="deal-image" style="height: 180px; width:245px;margin: 0;">
                                                        @elseif($post->contant_id == 4)
                                                            <img src="{{ $postUploadData->post_upload }}"
                                                                 alt="blog-single-image" style="height: 180px; width:245px;">
                                                        @endif
                                                    </a>
                                                    <div class="caption" style="padding: 3px">
                                                        <h5>
                                                            <a href="{{ route('posts.show', $post->id) }}"
                                                               class="media-heading">{!! substr($post->post_title, 0, 20)!!}.</a>
                                                        </h5>
                                                        <p>
                                                            {!! substr($post->post_description, 0, 30)!!}
                                                        </p>
                                                    </div>
                                                </div>
                                                @break
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Followers</div>
                    @foreach($user->following as $follower)
                        <div class="col-md-2" style="margin-top: 20px;padding:0">
                            <a href="{{ route('user.profile', $follower->id) }}" style="display:block;text-align: center"><img
                                        src="{{ asset('images/users/'. $follower->id .'/' . $follower->image ) }}"
                                        name="aboutme" width="70" height="70" class="img-circle"></a>
                            <a href="{{ route('user.profile', $follower->id) }}" style="display:block;text-align: center"><h5>{{($follower->user_name)}}</h5></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="push"></div>
    </div>


@endsection
@section('script')
    <script src="{{ asset('js/profile/profile.js') }}"></script>
@endsection