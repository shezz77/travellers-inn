@extends('travellers-inn.layouts.frontend-main')
@section('plugin-stylesheet')
    <link href="{{ asset('css/banner.css') }}" rel="stylesheet">
@endsection
@section('title', "$diary->name - ")

@section('slider')
@endsection

@section('page-title-div-text' , "$diary->name Details")
@include('travellers-inn.includes.frontend._page-title')

@section('content')


    <!-- PAGE CONTENT -->
    <section class="mainContentSection packagesSection">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-sm-push-9 col-xs-12">
                    <aside>
                        <div class="panel panel-default packagesFilter">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Post</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    @foreach(\App\Utils\AuthWrapper::loggedInUser()->posts as $post)
                                        @if(!$diary->hasPost($post->id) && $post->status == 1)
                                            @foreach($postUploadDatas = $post->postUploadedDatas as $postUploadData)
                                                <div class="col-xs-12">
                                                    <div class="media">
                                                        <a class="media-left" href="{{ route('posts.show', $post->id) }}">
                                                            @if($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6)
                                                                <img src="{{ asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image" width="50" height="50">
                                                            @elseif($post->contant_id == 4)
                                                                <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image" width="50" height="50">
                                                            @endif
                                                        </a>
                                                        <div class="media-body">
                                                            <h5><a href="{{ route('posts.show', $post->id) }}" class="media-heading">{{ $post->post_title}}.</a></h5>
                                                            <p><i class="fa fa-calendar" aria-hidden="true"></i>{{ $post->created_at->diffForHumans() }}</p>

                                                        </div>
                                                        <a href="{{ route('diary.post.attach', ['diary_id' => $diary->id,'post_id' => $post->id]) }}" class="btn btn-block buttonTransparent buttonTransparentfocus">Add post to diary</a>
                                                    </div>
                                                    <br>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </aside>
                </div>

                <div class="col-sm-9 col-sm-pull-3 col-xs-12">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="thumbnail deals packagesPage" style="width:263px ; height: 485px;">
                                    @foreach($postUploadDatas = $post->postUploadedDatas as $postUploadData)
                                        @if($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6)
                                            <img src="{{ asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image">
                                        @elseif($post->contant_id == 4)
                                            <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image">
                                        @endif
                                    @endforeach
                                    <div class="discountInfo">
                                        <div class="discountOffer">
                                            <h4>
                                                Seen <span>{{ $post->views }}</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h4><a href="{{ route('posts.show', $post->id) }}" class="captionTitle">{{ substr($post->post_title, 0, 20)}}{{ strlen($post->post_title) > 20 ? '......' : ''}}</a></h4>
                                        <p>{{ substr($post->post_description, 0, 40)}}{{ strlen($post->post_description) > 40 ? '......' : ''}}</p>
                                        <div class="detailsInfo">
                                            <h5>
                                                <span>Posted</span>
                                                <span style="margin-right: 10px; color: #ff891e">
                                                    {{ $post->created_at->diffForHumans() }}
                                                </span>
                                            </h5>
                                            <ul class="list-inline detailsBtn">
                                                <li><a data-toggle="modal" href='{{ route('posts.show', $post->id) }}' class="btn buttonTransparent">View</a></li>
                                            </ul>
                                            <ul class="list-inline detailsBtn">
                                                {{--<li><strong>Views</strong> <i class="fa fa-eye"></i> {{ $post->views }}</li>--}}
                                                <li><a data-toggle="modal" href='{{  route('diary.post.detach', ['diary_id' => $diary->id,'post_id' => $post->id]) }}' class="btn buttonTransparent">Remove from diary</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row" style="width: 100%;">
                    @include('travellers-inn.includes.frontend._pagination', ['paginator' => $posts])
                </div>
            </div>
        </div>
    </section>
@endsection

