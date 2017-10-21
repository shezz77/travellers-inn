@extends('travellers-inn.layouts.frontend-main')
@section('plugin-stylesheet')
    <link href="{{ asset('css/banner.css') }}" rel="stylesheet">
@endsection
@section('title', 'Diaries - ')

@section('slider')
@endsection

@section('page-title-div-text' , 'Diaries')
@include('travellers-inn.includes.frontend._page-title')

@section('stylesheet')

@endsection

@section('content')

    <!-- PAGE CONTENT -->
    <section class="mainContentSection packagesSection">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-sm-push-9 col-xs-12">
                    <aside>
                        <div class="panel panel-default packagesFilter">
                            <div class="panel-heading">
                                <h3 class="panel-title">Create New Diary</h3>
                            </div>
                            <div class="panel-body">
                                @if($diary)
                                    <form action="{{ route('diary.update', $diary->id) }}" id="diary-create-form" role="form" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            @include('travellers-inn.diary.includes.form')

                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-block buttonTransparent">Update</button>
                                            </div>
                                        </div>
                                    </form>
                               @else
                                <form action="{{ route('diary.store') }}" id="diary-create-form" role="form" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}
                                    <div class="row">
                                        @include('travellers-inn.diary.includes.form')
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-block buttonTransparent">Create</button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-9  col-sm-pull-3 col-xs-12">
                    <div class="row sidebarPage">
                        <div class="col-xs-12">
                            @foreach($diaries as $diary)
                                <div class="media packagesList">
                                    <a class="media-left fancybox-pop" href="{{ route('diary.show', $diary->id) }}">
                                        <img class="media-object" src="{{ asset('assets/img/home/packages/southamerica-01.jpg')}}" alt="Image">
                                    </a>
                                    <div class="media-body">
                                        <div class="bodyLeft">
                                            <h4 class="media-heading"><a href="{{ route('diary.show', $diary->id) }}">{{ $diary->name }}</a></h4>
                                            <p>{!! $diary->description  !!} </p>
                                            <ul class="list-inline detailsBtn">
                                                <li><span class="textInfo" style="margin-top: 15px"><i class="fa fa-calendar" aria-hidden="true"></i> {{ date_format($diary->created_at  , 'd M y') }}</span></li>
                                                {{--<li><span class=""><i class="fa fa-clock-o" aria-hidden="true"></i><small> Updated</small> <b>{{ $diary->updated_at->diffForHumans() }}</b></span></li>--}}
                                            </ul>
                                        </div>
                                        <div class="bodyRight">
                                            <div class="bookingDetails">
                                                <h2>{{ sizeof($diary->posts) }}</h2>
                                                <p><i class="fa fa-user"></i> Posts</p>
                                                <a href="{{ route('diary.index', $diary->id) }}" class="btn buttonTransparent clearfix"><i class="fa fa-edit"></i> Edit</a>
                                                <form action="{{ route('diary.destroy', $diary->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn buttonCustomPrimary buttonTransparent" data-toggle="modal"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row" style="width: 100%;">
{{--                    @include('travellers-inn.includes.frontend._pagination', ['paginator' => $diaries])--}}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('#diary-create-form').parsley();
    </script>
@endsection

