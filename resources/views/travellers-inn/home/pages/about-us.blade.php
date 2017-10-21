@extends('travellers-inn.layouts.frontend-main')
@section('plugin-stylesheet')
    <link href="{{ asset('css/banner.css') }}" rel="stylesheet">
@endsection
@section('title', 'About us - ')

@section('slider')
@endsection

@section('page-title-div-text' , 'About Travellers Inn')
@include('travellers-inn.includes.frontend._page-title')
@section('content')

    <!-- PAGE CONTENT -->
    <section class="mainContentSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="aboutTitle">
                        <h4>Hi fellow Travellers and welcome to TravellersInn! - The Social Traveller platform!</h4>
                    </div>
                </div>
            </div>
            <div>
                <p style="text-align: center;">
                    This product is for those people who want’s to travel and explore the famous places and cities all over the world. <br> <br>Travelers share their tour related information and experience, and tourists know the places more better and save <br><br>their time in digging the information about different places through different sources.
                    This product has  photos, <br><br> videos , diary , eBook and tips of different famous places and cities.
                  Tourists can guide people through comments.
                    <br><br>A traveler creates a Travel Blog and shares his/her experience in photos , videos, diary , eBook and tips.
                </p>
            </div>
            {{--<div class="row aboutItem">--}}
                {{--<div class="col-sm-4 col-xs-12">--}}
                    {{--<div class="media">--}}
                        {{--<a class="media-left" href="#"><i class="fa fa-bell" aria-hidden="true"></i></a>--}}
                        {{--<div class="media-body">--}}
                            {{--<h4 class="media-heading">Donec Vel Libero</h4>--}}
                            {{--<p>Vestibulum ut lacus non lorem pharetra efficitur. Nunc nibh elit, consectetur quis dapibus vitae.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4 col-xs-12">--}}
                    {{--<div class="media">--}}
                        {{--<a class="media-left" href="#"><i class="fa fa-briefcase" aria-hidden="true"></i></a>--}}
                        {{--<div class="media-body">--}}
                            {{--<h4 class="media-heading">Vivamus Laoreet</h4>--}}
                            {{--<p>Aenean dictum dui quis interdum volutpat. Integer in magna sit amet efficitur nec in quam.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4 col-xs-12">--}}
                    {{--<div class="media">--}}
                        {{--<a class="media-left" href="#"><i class="fa fa-cab" aria-hidden="true"></i></a>--}}
                        {{--<div class="media-body">--}}
                            {{--<h4 class="media-heading">Ullamcorper Congue</h4>--}}
                            {{--<p>Etiam posuere lorem ac pharetra laoreet. Nam magna mi, eleifend ac vulputate ac.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4 col-xs-12">--}}
                    {{--<div class="media">--}}
                        {{--<a class="media-left" href="#"><i class="fa fa-camera" aria-hidden="true"></i></a>--}}
                        {{--<div class="media-body">--}}
                            {{--<h4 class="media-heading">Proin Libero Erat</h4>--}}
                            {{--<p>Nunc eget sem ac lectus auctor viverra. Praesent sollicitudin leo velit sed, semper diam.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4 col-xs-12">--}}
                    {{--<div class="media">--}}
                        {{--<a class="media-left" href="#"><i class="fa fa-cloud" aria-hidden="true"></i></a>--}}
                        {{--<div class="media-body">--}}
                            {{--<h4 class="media-heading">Amaiging Tour</h4>--}}
                            {{--<p>Nulla molestie leo vitae convallis sollicitudin. Nulla volutpat dapibus at pellentesque sem.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4 col-xs-12">--}}
                    {{--<div class="media">--}}
                        {{--<a class="media-left" href="#"><i class="fa fa-cutlery" aria-hidden="true"></i></a>--}}
                        {{--<div class="media-body">--}}
                            {{--<h4 class="media-heading">Cras Vestibulum</h4>--}}
                            {{--<p>Aenean gravida, nisl et volutpat dapibus, nisl odio accumsan pretium lacus libero a lacus.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </section>

    <!-- QUOTE -->
    <section class="darkSection aboutComments">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="commentsTable">
                        <div class="commentsTableInner">
                            <div class="commentsInfo">
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                                <p>There are three responses to a piece of design – yes, no, and WOW! Wow is the one to aim for.</p>
                                <h5>Milton Glaser</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TEAM -->
    <section class="whiteSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle">
                        <h2><span>our Team</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <div class="teamMember">
                        <img src="{{ asset('assets/img/about-us/sa2.jpg') }}" alt="">
                        <div class="memberName">
                            <h4>Shehzad Aslam</h4>
                            <p>Web Developer</p>
                        </div>
                        <div class="maskingArea">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="teamMember">
                        <img src="{{ asset('assets/img/about-us/team-04.png') }}" alt="">
                        <div class="memberName">
                            <h4>Jazeb Mazar</h4>
                            <p>UX & Front-end Development</p>
                        </div>
                        <div class="maskingArea">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="teamMember">
                        <img src="{{ asset('assets/img/about-us/team-06.jpg') }}" alt="">
                        <div class="memberName">
                            <h4>Sana</h4>
                            <p>Words</p>
                        </div>
                        <div class="maskingArea">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="teamMember">
                        <img src="{{ asset('assets/img/about-us/team-02.jpg') }}" alt="">
                        <div class="memberName">
                            <h4>Mehran</h4>
                            <p>Developer</p>
                        </div>
                        <div class="maskingArea">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection