@extends('travellers-inn.layouts.frontend-main')

@section('plugin-stylesheet')
    <link href="{{ asset('css/banner.css') }}" rel="stylesheet">
@endsection


@section('slider')
@endsection
@section('page-title-div-text', 'Search')
@include('travellers-inn.includes.frontend._page-title')
@section('title', 'Search - ')
@section('content')
    <section class="mainContentSection" style="background-color: whitesmoke">
        <div class="container">
            <div class="row detail">
                {{--Quick Search--}}
                <div class="col-md-6 col-of">
                    {{ Form::open(['route' => ['search'], 'method' => 'POST',]) }}
                    <div class="panel panel-default">
                        <div class="panel-heading">Quick Search</div>
                        <div class="panel-body">
                            <div class="input-group">
                                <input type="text" id="search" name="search" class="form-control" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
                            </div>
                            <button type="submit" class="btn buttonCustomPrimary CustomButton" style="margin: 20px 0 20px 0">Search</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>

                {{--Advance Search--}}
                <div class="solidBgTitle col-md-6">
                    <div class="panel-group" id="accordionSolid">
                        <div class="panel panel-default">
                            <a class="panel-heading heading accordion-toggle" data-toggle="collapse" data-parent="#accordionSolid" href="#collapse-aa">
                                <span>Advance Search</span>
                                <i class="indicator fa fa-plus  pull-right"></i>
                            </a>
                            <div id="collapse-aa" class="panel-collapse collapse ">
                                <div class="panel-body">
                                    {{ Form::open(['route' => ['advance-search'], 'method' => 'POST',]) }}
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <label for="AdvanceSearch" class="control-label">Containing any of the words</label>
                                            <input id="AdvanceSearch" type="text" class="form-control" name="AdvanceSearch" value="" required autofocus maxlength="255">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search-type">Only of the type(s) </label>
                                        <div id="search-type" class="form-checkboxes">

                                            <div class="form-item">
                                                <input type="checkbox" id="search-type-tip" name="tip" value="2" class="form-checkbox">
                                                <label class="option" for="search-type-tip">Travel Tip </label>
                                            </div>
                                            <div class="form-item">
                                                <input type="checkbox" id="search-type-image" name="image" value="3" class="form-checkbox">
                                                <label class="option" for="search-type-image">Photo </label>
                                            </div>
                                            <div class="form-item">
                                                <input type="checkbox" id="search-type-video" name="video" value="4" class="form-checkbox">
                                                <label class="option" for="search-type-video">Video </label>
                                            </div>
                                            <div class="form-item ">
                                                <input type="checkbox" id="search-type-travel-diary" name="diary" value="5" class="form-checkbox">
                                                <label class="option" for="search-type-travel-diary">Travel Diary </label>
                                            </div>
                                            <div class="form-item">
                                                <input type="checkbox" id="search-type-book" name="ebook" value="6" class="form-checkbox">
                                                <label class="option" for="search-type-book">Ebooks </label>
                                            </div>

                                        </div>
                                    </div>
                                    <button class="btn buttonCustomPrimary btn-block" type="submit" name="submit">Advance Search</button>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    @if(isset($detail))
                        <p style="color: black; margin-bottom: 20px;" > The Search results for your query <b> {{ $q }} </b> are :</p>

                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-sm-4 col-xs-12">
                                    <div class="thumbnail deals">
                                        @foreach($postUploadDatas = $post->postUploadedDatas as $postUploadData)
                                            @if($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6)
                                                <a href="{{ route('posts.show', $post->id) }}">
                                                <img src="{{ asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image">
                                            @elseif($post->contant_id == 4)
                                                <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image">
                                            @endif
                                                </a>
                                        @endforeach
                                        <div class="caption" style="padding: 16px 9px">
                                            <h4 style="margin: 0"><a href="{{ route('posts.show', $post->id) }}" class="captionTitle" style="margin: 0 0 10px 0">{!! substr($post->post_title, 0, 20)!!}</a></h4>
                                            <p>{{ substr($post->post_description, 0, 40)}}</p>
                                            <div class="detailsInfo">
                                                <ul class="list-inline detailsBtn">
                                                    <li><a href="{{ route('posts.show', $post->id) }}" class="btn buttonTransparent">Details</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @elseif(isset($message))
                        <p style="color: black">{{ $message }}</p>
                    @endif
                </div>

                <div class="row" style="width: 100%;">
                    @include('travellers-inn.includes.frontend._pagination', ['paginator' => $posts])
                </div>
            </div>
        </div>

    </section>
@endsection


@section('plugin-script')
    {{--<script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>--}}
    {{--<script src="{{ asset('js/fileinput.min.js') }}" type="text/javascript"></script>--}}
    {{--<script src="{{ asset('js/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>--}}
    {{--<script src="{{ asset('js/post/post.js') }}" type="text/javascript"></script>--}}
    {{--<script src="{{ asset('tinymce/tinymce.dev.js') }}" type="text/javascript"></script>--}}
    {{--<script>tinymce.init({ selector:'textarea' });</script>--}}
@endsection