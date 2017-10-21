@extends('travellers-inn/layouts/frontend-main')

@section('plugin-stylesheet')
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/selectbox/select_option1.css') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/colors/default.css') }}" id="option_color">
    <link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
@endsection
@section('title', 'Post - ')


@section('page-title-div-text', "$post->post_title Post")
@include('travellers-inn.includes.frontend._page-title')

@section('content')

    <!-- PAGE CONTENT -->
    <section class="mainContentSection blogSidebar">

        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-sm-push-9 col-xs-12">
                    <aside>
                        <div class="panel panel-default">
                            <div class="well">
                                <dl class="dl-horizontal">
                                    <label>Created At:</label>
                                    <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                                </dl>

                                <dl class="dl-horizontal">
                                    <label>Last Updated:</label>
                                    <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
                                </dl>
                                @if(\App\Utils\AuthWrapper::check())
                                    @if( \App\Utils\AuthWrapper::loggedInUser()->id == $post->user_id)
                                        <div class="row">
                                            <div class="col-sm-5 edit-post">
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block edit-btn "style="text-transform: capitalize"><i class="fa fa-edit" style="margin-right: 3px;"></i> edit</a>
                                            </div>
                                            <div class="col-sm-5 edit-post">
                                                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-block btn btn-danger edit-btn" type="button" data-modal="confirmDelete" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Post" data-message="Are you sure you want to Delete this Post?" style="text-transform: capitalize"><i class="fa fa-trash" style="margin-right: 3px;"></i> delete</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div role="tabpanel" class="tabArea">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li role="presentation" class="active recent">
                                    <a href="#recent" aria-controls="recent" role="tab" data-toggle="tab" >Recent Posts</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="recent">
                                    @foreach($recentPosts as $recentPost)
                                        @if($recentPost->status == 1)
                                            @foreach($postUploadDatas = $recentPost->postUploadedDatas as $postUploadData)
                                                <div class="media">
                                                    <a class="media-left" href="{{ route('posts.show', $recentPost->id) }}">
                                                        @if($recentPost->contant_id == 2 || $recentPost->contant_id == 3 || $recentPost->contant_id == 6)
                                                            <img src="{{ asset('images/users/' . $recentPost->user_id .'/posts/'. $recentPost->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image" style="width: 100%;">
                                                        @elseif($recentPost->contant_id == 4)
                                                            <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image" style="width: 100%;">
                                                        @endif
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 style="overflow: hidden; margin-bottom: 10px;" ><a href="{{ route('posts.show', $recentPost->id) }}" class="media-heading">{!! substr($recentPost->post_title, 0, 15)!!}.</a></h4>
                                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>{{ $recentPost->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                                @break
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{--<div class="panel panel-default">--}}
                        {{--<div class="panel-heading">Categories</div>--}}
                        {{--<div class="panel-body">--}}
                        {{--<div class="list-group">--}}
                        {{--<a href="#" class="list-group-item">Business<span class="badge">(9)</span></a>--}}
                        {{--<a href="#" class="list-group-item">Design<span class="badge">(7)</span></a>--}}
                        {{--<a href="#" class="list-group-item">Photography<span class="badge">(5)</span></a>--}}
                        {{--<a href="#" class="list-group-item">Creative<span class="badge">(7)</span></a>--}}
                        {{--<a href="#" class="list-group-item">Wordpress<span class="badge">(6)</span></a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="panel panel-default">
                            <div class="panel-heading">Hash Tags</div>
                            <div class="panel-body">
                                <ul class="">
                                    @foreach($post->hashTags as $hashTag)
                                        <li style="float: left;margin: 0 10px 0 0;"><a class="label label-default" href="{{ route('hash-tags.posts', $hashTag->id) }}">{{ $hashTag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-9 col-sm-pull-3 col-xs-12" data-postid = "{{$post->id}}">
                    <div class="thumbnail blogSinglePost">

                        <div class="caption">
                            <h2>{{$post->post_title}}</h2>
                            <ul class="list-inline blogInfo">
                                <li><i class="fa fa-user" aria-hidden="true"></i>{{ $post->user->first_name}}</li>
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$post->created_at->diffForHumans()}}</li>
                                <li><i class="fa fa-eye" aria-hidden="true"></i>{{$post->views}}</li>
                            </ul>
                            @foreach($postUploadDatas = $post->postUploadedDatas as $postUploadData)
                                @if($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6)

                                    <img src="{{ asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload ) }}" style="width: 100%">

                                @elseif($post->contant_id == 4)
                                    <div style="width: 100%">
                                        {!! $postUploadData->link !!}
                                    </div>
                                @endif
                            @endforeach
                            <div class="imageBgTableInner">
                                <blockquote data-userid = "{{$post->user->id}}" data-username = "{{$post->user->first_name}}">
                                    {!! $post->post_description  !!}
                                    <footer>
                                        @if($post->contant_id == 6)
                                            <a href="{{$post->ebook_link}}" target="_blank">{{$post->ebook_title}}</a>
                                        @endif
                                        <br><br><a href="{{ route('user.profile', $post->user_id) }}"><img style="margin: 0 0 10px 0 ;  height:60px;" src="{{ asset('images/users/'. $post->user->id .'/'. $post->user->image ) }}" alt="Image" class="img-circle" width="50" >
                                            <h4 class="media-heading">by {{ $post->user->first_name }}</h4></a>
                                        @if(\App\Utils\AuthWrapper::check())
                                            @if(\App\Utils\AuthWrapper::loggedInUser()->id != $post->user->id)
                                                <button class=" btn buttonCustomPrimary follow CustomButton" data-url="{{ route('user.follow', $post->user->id) }}" id="follow-user" >{{ $post->user->hasAction(\App\Utils\AuthWrapper::loggedInUser()->id) ? 'Unfollow' : 'Follow' }}</button>
                                                <input type="hidden" class=" btn btn-primary follow" data-url="{{ route('user.un.follow', $post->user->id) }}" id="un-follow-user">
                                            @endif
                                        @endif
                                    </footer>
                                </blockquote>
                            </div>


                        </div>
                    </div>
                    {{--<div class="well">--}}
                    {{--<span>Share it</span>--}}

                    {{--<ul class="list-inline">--}}
                    {{--<div class="fb-share-button" data-href="http://localhost:8080/travellers-inn/public ,$post->id"  data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8080%2Ftravellers-inn%2Fpublic&amp;src=sdkpreparse">Share</a></div>--}}
                    {{--<li>--}}
                    {{--<div class="fb-share-button" data-href="http://localhost:8080/travellers-inn/public/posts" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8080%2Ftravellers-inn%2Fpublic%2F&amp;src=sdkpreparse">Share</a></div>--}}
                    {{--<div class="fb-share-button" data-href="http://localhost:8080/travellers-inn/public/posts/9" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8080%2Ftravellers-inn%2Fpublic&amp;src=sdkpreparse">Share</a></div>--}}
                    {{--<iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flocalhost%3A8080%2Ftravellers-inn%2Fpublic&layout=button_count&size=small&mobile_iframe=true&appId=126421531301164&width=69&height=20" width="69" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>--}}
                    {{--<a href="https://www.facebook.com/share?u{{ route('posts.show',$post->id) }}" class="social-button " id=""><span class="fa fa-facebook-official"></span></a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>--}}
                    {{--<li><a href="https://plus.google.com/share?url={{route('posts.show',$post->id)}}" class="social-button " id=""><span class="fa fa-google-plus"></span></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    @if(\App\Utils\AuthWrapper::check())
                        <h5>Total Likes <span id="post-like-count">{{ $post->likes()->count() }}</span></h5>
                        <button class="btn buttonCustomPrimary like CustomButton">{{ $post->hasAction(\App\Utils\AuthWrapper::loggedInUser()->id) ? 'unlike' : 'Like' }}</button>


                        <div class="fullComments">
                            <div class="commentsArea">
                                <br>
                                <h3 id="">Total Comments <span id="comment-count">{{ $post->comments()->count() }}</span></h3>
                                <div id="comment-body">
                                    @foreach($post->comments as $comment)
                                        <div class="media comment1">
                                            <a href="{{route('user.profile', $comment->user->id)}}">
                                                <img src="{{ asset('images/users/'. $comment->user->id .'/'. $comment->user->image ) }}" alt="Image" class="img-circle" width="50" height="50">
                                            </a>
                                            <div class="media-body comment" data-commentid = "{{$comment->id}}"}}>
                                                <h4 class="media-heading">{{ $comment->user->first_name }}</h4>
                                                <input type="text" hidden name="id" id="comment_id" value="{{$comment->id}}">
                                                <h4><span><i class="fa fa-calendar" aria-hidden="true"></i>{{ $comment->created_at->diffForHumans()}}</span></h4>
                                                <p id="comment">{{$comment->comment}}</p>

                                                <a class="btn btn-link comment-like">{{$comment->hasLike(\App\Utils\AuthWrapper::loggedInUser()->id) ? 'unlike' : 'Like'}} </a>
                                                <span id="comment-like-count">{{ $comment->commentlikes()->count() }}</span>
                                                @if( Auth::user()->id == $comment->user_id)
                                                    <a class="edit btn btn-link" href="#" onclick="commentEdit()">Edit</a>
                                                    <form action="{{ route('comment.delete', $comment->id) }}" role="form" method="POST" enctype="multipart/form-data" style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-link" type="button" data-modal="confirmDelete" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Comment" data-message="Are you sure you want to Delete this Comment?">Delete</button>
                                                    </form>

                                                @endif

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST', 'class' => 'commentsForm']) }}
                            <h3>Leave A Comments</h3>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" hidden name="id" id="post_id" value="{{$post->id}}">
                                    <div class="form-group">
                                        <textarea name="comment" class="form-control commentText" id="commentText" placeholder="Comment" style="color: #000" required data-parsley-errors-container="#comment-error"></textarea>
                                    </div>
                                    <p id="comment-error" style="color: #B94A48; margin-top: 10px"></p>
                                </div>
                            </div>
                            <button type="submit" class="btn buttonCustomPrimary">send comment</button>
                            {{ Form::close() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>


        @if($post->comments()->count() != 0 && \App\Utils\AuthWrapper::check() == true)
            <div class="modal fade" tabindex="-1" role="dialog" id="modal">
                {{ Form::model($comment, ['route' => 'comment.update', 'method' => 'PUT']) }}
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Comment</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" hidden name="id" id="id">
                            <textarea name="comment" class="form-control commentText modalComment" data-parsley-errors-container="#comment-error2" required></textarea>
                        </div>
                        <p id="comment-error2" style="color: #B94A48; margin-top: 10px"></p>
                        <div class="modal-footer">
                            <button type="button" class="btn buttonCustomPrimary submitBtn  " data-dismiss="modal">Close</button>
                            <input type="submit" value="Save Changes" class="btn buttonCustomPrimary submitBtn" name="comment_submit" id="save-changes">
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                {{ Form::close() }}
            </div><!-- /.modal -->
        @endif

        @include('travellers-inn.post.includes.delete-modal')

    </section>

@endsection
@section('plugin-script')
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/isotope/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/isotope/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('assets/plugins/isotope/isotope-triger.js') }}"></script>
    <script src="{{ asset('assets/plugins/countdown/jquery.syotimer.js') }}"></script>
    <script src="{{ asset('assets/plugins/smoothscroll/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/options/optionswitcher.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
@section('script')
    <script src="{{ asset('js/post/post.js') }}"></script>
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var APP_URL = '{!! json_encode(url('/')) !!}';
                {{--var userID = '{{ \App\Utils\AuthWrapper::loggedInUser()->id }}';--}}
        var urlLike = '{{route('posts.like')}}';
        var urlComment = '{{route('comments.store', $post->id)}}';
        var urlCommentLike = '{{route('comments.like')}}';
    </script>
    {{--<div id="fb-root"></div>--}}
    {{--<script>(function(d, s, id) {--}}
    {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
    {{--if (d.getElementById(id)) return;--}}
    {{--js = d.createElement(s); js.id = id;--}}
    {{--js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=126421531301164";--}}
    {{--fjs.parentNode.insertBefore(js, fjs);--}}
    {{--}(document, 'script', 'facebook-jssdk'));</script>--}}
@endsection