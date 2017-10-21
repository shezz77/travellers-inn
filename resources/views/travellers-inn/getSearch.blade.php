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
                <div class="col-md-6">
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

                                        <div class="input-group">
                                            <label for="search" class="control-label">Containing the phrase</label>
                                            <input id="search" type="text" class="form-control" name="search" value="">
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
            </div>
        </div>
    </section>
@endsection