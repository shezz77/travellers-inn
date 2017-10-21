@extends('travellers-inn/layouts/frontend-main')

@section('plugin-stylesheet')
    <link href="{{ asset('assets/plugins/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/rs-plugin/css/settings.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/selectbox/select_option1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/isotope/jquery.fancybox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/isotope/isotope.css') }}">
@endsection
@section('title', 'Home - ')

@section('page-title')
@endsection

@include('travellers-inn.includes.frontend._slider')

@section('content')
    <!-- Continent feature Post -->
    <section class="whiteSection featured">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle">
                        <h2><span>Destinations</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="filter-container isotopeFilters">
                        <ul class="list-inline filter">
                            <li class="active"><a href="#"  data-filter=".asia">Asia</a></li>
                            <li><a href="#" data-filter=".northamerica" id="northamerica">North America</a></li>
                            <li><a href="#" data-filter=".southamerica" id="southamerica">South America</a></li>
                            <li><a href="#" data-filter=".europe" id="europe">Europe</a></li>
                            <li><a href="#" data-filter=".oceania" id="oceania">Oceania</a></li>
                            <li><a href="#" data-filter=".africa"id="africa">Africa</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            {{--asia--}}
            <div class="row isotopeContainer">
                @foreach($asiaPost->slice(0,6) as $latestPost)
                    @if($latestPost->status == 1)
                        @foreach($postUploadDatas = $latestPost->postUploadedDatas as $postUploadData)
                            <div class="col-sm-4 isotopeSelector asia country">
                                <article class="">
                                    <figure>
                                        <a href="{{ route('posts.show', $latestPost->id) }}">
                                            @if($latestPost->contant_id == 2 || $latestPost->contant_id == 3 || $latestPost->contant_id == 6)
                                                <img src="{{ asset('images/users/' . $latestPost->user_id .'/posts/'. $latestPost->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image" width="200" height="250">
                                            @elseif($latestPost->contant_id == 4)
                                                <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image"width="200" height="250">
                                            @endif
                                        </a>
                                    </figure>
                                    <div class="detailsInfo description">
                                        <h5 class="title"><a href="{{ route('posts.show', $latestPost->id) }}">{!! substr($latestPost->post_title, 0, 20)!!}{{ strlen($latestPost->post_title) > 40 ? '......' : ''}}</a></h5>
                                        <p>{!! substr($latestPost->post_description, 0, 30)!!}{{ strlen($latestPost->post_description) > 30 ? '......' : ''}}</p>
                                        <ul class="list-inline detailsBtn details">
                                            <li><a href="{{ route('posts.show', $latestPost->id) }}" class="btn buttonTransparent">Details</a></li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{--northamerica--}}
            <div class="row isotopeContainer">
                @foreach($northAmericaPost->slice(0,6) as $latestPost)
                    @if($latestPost->status == 1)
                        @foreach($postUploadDatas = $latestPost->postUploadedDatas as $postUploadData)
                            <div class="col-sm-4 isotopeSelector northamerica country">
                                <article class="">
                                    <figure>
                                        <a href="{{ route('posts.show', $latestPost->id) }}">
                                            @if($latestPost->contant_id == 2 || $latestPost->contant_id == 3 || $latestPost->contant_id == 6)
                                                <img src="{{ asset('images/users/' . $latestPost->user_id .'/posts/'. $latestPost->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image" width="200" height="250">
                                            @elseif($latestPost->contant_id == 4)
                                                <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image"width="200" height="250">
                                            @endif                                    </a>
                                    </figure>
                                    <div class="detailsInfo description">
                                        <h5 class="title"><a href="{{ route('posts.show', $latestPost->id) }}">{!! substr($latestPost->post_title, 0, 20)!!}{{ strlen($latestPost->post_title) > 40 ? '......' : ''}}</a></h5>
                                        <p>{!! substr($latestPost->post_description, 0, 30)!!}{{ strlen($latestPost->post_description) > 30 ? '......' : ''}}</p>
                                        <ul class="list-inline detailsBtn details">
                                            <li><a href="{{ route('posts.show', $latestPost->id) }}" class="btn buttonTransparent">Details</a></li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
            {{----}}
            {{--southamerica--}}
            <div class="row isotopeContainer">
                @foreach($southAmericaPost->slice(0,6) as $latestPost)
                    @if($latestPost->status == 1)
                        @foreach($postUploadDatas = $latestPost->postUploadedDatas as $postUploadData)
                            <div class="col-sm-4 isotopeSelector southamerica country">
                                <article class="">
                                    <figure>
                                        <a href="{{ route('posts.show', $latestPost->id) }}">
                                            @if($latestPost->contant_id == 2 || $latestPost->contant_id == 3 || $latestPost->contant_id == 6)
                                                <img src="{{ asset('images/users/' . $latestPost->user_id .'/posts/'. $latestPost->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image" width="200" height="250">
                                            @elseif($latestPost->contant_id == 4)
                                                <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image" width="200" height="250">
                                            @endif                                   </a>
                                    </figure>
                                    <div class="detailsInfo description">
                                        <h5 class="title"><a href="{{ route('posts.show', $latestPost->id) }}">{!! substr($latestPost->post_title, 0, 20)!!}{{ strlen($latestPost->post_title) > 40 ? '......' : ''}}</a></h5>
                                        <p>{!! substr($latestPost->post_description, 0, 30)!!}{{ strlen($latestPost->post_description) > 30 ? '......' : ''}}</p>
                                        <ul class="list-inline detailsBtn details">
                                            <li><a href="{{ route('posts.show', $latestPost->id) }}" class="btn buttonTransparent">Details</a></li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>


            {{--Euorpe--}}
            <div class="row isotopeContainer">
                @foreach($europePost->slice(0,6) as $latestPost)
                    @if($latestPost->status == 1)
                        @foreach($postUploadDatas = $latestPost->postUploadedDatas as $postUploadData)
                            <div class="col-sm-4 isotopeSelector europe country">
                                <article class="">
                                    <figure>
                                        <a href="{{ route('posts.show', $latestPost->id) }}">
                                            @if($latestPost->contant_id == 2 || $latestPost->contant_id == 3 || $latestPost->contant_id == 6)
                                                <img src="{{ asset('images/users/' . $latestPost->user_id .'/posts/'. $latestPost->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image" width="200" height="250">
                                            @elseif($latestPost->contant_id == 4)
                                                <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image" width="200" height="250">
                                            @endif                                  </a>
                                    </figure>
                                    <div class="detailsInfo description">
                                        <h5 class="title"><a href="{{ route('posts.show', $latestPost->id) }}">{!! substr($latestPost->post_title, 0, 20)!!}{{ strlen($latestPost->post_title) > 40 ? '......' : ''}}</a></h5>
                                        <p>{!! substr($latestPost->post_description, 0, 30)!!}{{ strlen($latestPost->post_description) > 30 ? '......' : ''}}</p>
                                        <ul class="list-inline detailsBtn details">
                                            <li><a href="{{ route('posts.show', $latestPost->id) }}" class="btn buttonTransparent">Details</a></li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{--oceania--}}
            <div class="row isotopeContainer">
                @foreach($oceaniaPost->slice(0,6) as $latestPost)
                    @if($latestPost->status == 1)
                        @foreach($postUploadDatas = $latestPost->postUploadedDatas as $postUploadData)
                            <div class="col-sm-4 isotopeSelector oceania country">
                                <article class="">
                                    <figure>
                                        <a href="{{ route('posts.show', $latestPost->id) }}">
                                            @if($latestPost->contant_id == 2 || $latestPost->contant_id == 3 || $latestPost->contant_id == 6)
                                                <img src="{{ asset('images/users/' . $latestPost->user_id .'/posts/'. $latestPost->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image" width="200" height="250">
                                            @elseif($latestPost->contant_id == 4)
                                                <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image" width="200" height="250">
                                            @endif                                    </a>
                                    </figure>
                                    <div class="detailsInfo description">
                                        <h5 class="title"><a href="{{ route('posts.show', $latestPost->id) }}">{!! substr($latestPost->post_title, 0, 20)!!}{{ strlen($latestPost->post_title) > 40 ? '......' : ''}}</a></h5>
                                        <p>{!! substr($latestPost->post_description, 0, 30)!!}{{ strlen($latestPost->post_description) > 30 ? '......' : ''}}</p>
                                        <ul class="list-inline detailsBtn details">
                                            <li><a href="{{ route('posts.show', $latestPost->id) }}" class="btn buttonTransparent">Details</a></li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{--Africa--}}
            <div class="row isotopeContainer">
                @foreach($africaPost->slice(0,6) as $latestPost)
                    @if($latestPost->status == 1)
                        @foreach($postUploadDatas = $latestPost->postUploadedDatas as $postUploadData)
                            <div class="col-sm-4 isotopeSelector africa country">
                                <article class="">
                                    <figure>
                                        <a href="{{ route('posts.show', $latestPost->id) }}">
                                            @if($latestPost->contant_id == 2 || $latestPost->contant_id == 3 || $post->contant_id == 6)
                                                <img src="{{ asset('images/users/' . $latestPost->user_id .'/posts/'. $latestPost->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image" width="200" height="250">
                                            @elseif($latestPost->contant_id == 4)
                                                <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image" width="200" height="250">
                                            @endif                                   </a>
                                    </figure>
                                    <div class="detailsInfo description">
                                        <h5 class="title"><a href="{{ route('posts.show', $latestPost->id) }}">{!! substr($latestPost->post_title, 0, 20)!!}{{ strlen($latestPost->post_title) > 40 ? '......' : ''}}</a></h5>
                                        <p>{!! substr($latestPost->post_description, 0, 30)!!}{{ strlen($latestPost->post_description) > 30 ? '......' : ''}}</p>
                                        <ul class="list-inline detailsBtn details">
                                            <li><a href="{{ route('posts.show', $latestPost->id) }}" class="btn buttonTransparent">Details</a></li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
        {{--End--}}
    </section>
    <!-- COUNTING PARALLAX -->
    <section class="countUpSection">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="counter">{{\App\Utils\CountryWrapper::count()}}</div>
                        <h5>Countries</h5>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa fa-gift" aria-hidden="true"></i>
                        </div>
                        <div class="counter">{{\App\Utils\PostWrapper::count()}}</div>
                        <h5>Total Posts</h5>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa fa-smile-o" aria-hidden="true"></i>
                        </div>
                        <div class="counter">{{\App\Utils\UserWrapper::count()}}</div>
                        <h5>Total User</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Post -->
    <section class="mainContentSection packagesSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle">
                        <h2><span class="lightBg">Featured Post</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($posts->slice(0,6) as $post)
                    @if($post->is_featured == 1)
                        @foreach($postUploadDatas = $post->postUploadedDatas as $postUploadData)
                            <div class="col-sm-4 col-xs-12">
                                <div class="thumbnail deals post-widget">
                                    @if($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6)
                                        <a href="{{ route('posts.show', $post->id) }}">
                                            <img src="{{ asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload ) }}" alt="deal-image" height="250px">
                                            @elseif($post->contant_id == 4)
                                                <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image" height="250px">
                                            @endif
                                        </a>
                                        <div class="caption">
                                            <h4 class="post-title"><a href="{{ route('posts.show', $post->id) }}" class="captionTitle">{!! substr($post->post_title, 0, 20)!!}</a></h4>
                                            <p class="post-title">{!! substr($post->post_description, 0, 40)!!}</p>
                                            <div class="detailsInfo">
                                                <ul class="list-inline detailsBtn">
                                                    <li><a href="{{ route('posts.show', $post->id) }}" class="btn buttonTransparent">Details</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
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
    <script>
        $('#login-modal').parsley();
    </script>
@endsection