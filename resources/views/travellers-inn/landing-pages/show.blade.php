@extends('travellers-inn.layouts.frontend-main')

@section('plugin-stylesheet')
    <link href="{{ asset('assets/plugins/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/rs-plugin/css/settings.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/selectbox/select_option1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/isotope/jquery.fancybox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/isotope/isotope.css') }}">
@endsection

@section('title', "Destination - ")


@include('travellers-inn.includes.frontend._slider')

@section('page-title')
@endsection
@section('content')


    <section class="mainContentSection blogSidebar">

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle">
                        <h2><span>Posts</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-sm-push-9 col-xs-12">
                    <aside>
                        <div role="tabpanel" class="tabArea">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li role="presentation" class="active recent">
                                    <a href="#recent" aria-controls="recent" role="tab" data-toggle="tab" >Recent Post</a>
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
                                                            <img src="{{ asset('images/users/' . $recentPost->user_id .'/posts/'. $recentPost->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image" style="width: 100%; height: auto">
                                                        @elseif($recentPost->contant_id == 4)
                                                            <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image" style="width: 100%; height: auto">
                                                        @endif
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 style="overflow: hidden; margin-bottom: 10px;" ><a href="{{ route('posts.show', $recentPost->id) }}" class="media-heading">{!! substr($recentPost->post_title, 0, 15)!!}</a></h4>
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
                    </aside>
                </div>
                <div class="col-sm-9 col-sm-pull-3 col-xs-12">
                    <div class="row">
                        @foreach($posts as $post)
                            @foreach($postUploadDatas = $post->postUploadedDatas as $postUploadData)
                                <div class="col-sm-4 col-xs-12">
                                    <div class="thumbnail deals">
                                        @if($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6)
                                            <a href="{{ route('posts.show', $post->id) }}">
                                                <img src="{{ asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload ) }}" style="width: 250px; height: 200px" alt="deal-image">
                                                @elseif($post->contant_id == 4)
                                                    <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image" style="width: 250px; height: 200px">
                                                @endif
                                            </a>
                                            <div class="caption" style="padding: 16px 8px;">
                                                <h4 style="margin: 0;"><a href="{{ route('posts.show', $post->id) }}" class="captionTitle">{!! substr($post->post_title, 0, 20)!!}</a></h4>
                                                <p>{!! substr($post->post_description, 0, 30)!!}</p>
                                                <div class="detailsInfo">
                                                    <ul class="list-inline detailsBtn">
                                                        <li><a href="{{ route('posts.show', $post->id) }}" class="btn buttonTransparent">Details</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                @break
                            @endforeach
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
@section('plugin-script')
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js') }}"></script>
    {{--<script src="{{ asset('assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>--}}
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/isotope/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/isotope/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('assets/plugins/isotope/isotope-triger.js') }}"></script>
    <script src="{{ asset('assets/plugins/countdown/jquery.syotimer.js') }}"></script>
    <script src="{{ asset('assets/plugins/smoothscroll/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/options/optionswitcher.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    {{--<script src="{{ asset('js/parsley.min.js') }}"></script>--}}
    <script src="{{ asset('js/home/custom.js') }}" type="text/javascript"></script>
@endsection