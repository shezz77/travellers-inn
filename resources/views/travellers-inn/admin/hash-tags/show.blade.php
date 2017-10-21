@extends('travellers-inn.layouts.admin-panel-main')

@section('title', "$hashTag->name detail")

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="page-heading">
        <div class="row">
            <div class="col-md-8">
                <h1><i class='fa fa-tachometer'></i> <strong>{{ $hashTag->name }}</strong> Details</h1>
                <h3>HashTag Detail of Travellers Inn</h3>
                <h4> Total Posts attached to {{ $hashTag->name }}  <span class="label label-primary">{{ sizeof($hashTag->posts) }}</span></h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('hash-tags.index') }}" class="btn btn-primary btn-block">View All HashTags</a>
            </div>
        </div>
    </div>
    <!-- Page Heading End-->				<!-- Your awesome content goes here -->

    <div class="well">
        <div class="widget bg-lightblue-1 animated fadeInDown row">
            <div class="row">

                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-header">
                            <h2><strong>{{ $hashTag->name }}</strong>'s Posts List</h2>
                            <div class="additional-btn">
                                <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                                <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                            </div>
                        </div>
                        <div class="widget-content">
                            <br>
                            <div class="table-responsive">
                                <form class='form-horizontal' role='form'>
                                    <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Tags</th>
                                            <th>Created At</th>
                                            <th>Detail</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach ($hashTag->posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->post_title}}</td>
                                                <td>
                                                    @foreach($post->hashTags as $hashTag)
                                                        <a class="label label-default" href="{{ route('hash-tags.show', $hashTag->id) }}">{{ $hashTag->name }}</a>
                                                    @endforeach
                                                </td>
                                                <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                                                {{--<td> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-block buttonCustomPrimary">Edit</a></td>--}}
                                                <td> <a href="{{ route('posts.show', $post->id) }}" class="btn buttonCustomPrimary btn-block"><i class="glyphicon glyphicon-eye-open"></i></a></td>
                                                {{--<td>--}}
                                                    {{--{{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) }}--}}
                                                    {{--<button class="btn btn-xs btn-danger md-trigger" type="button" data-modal="confirmDelete" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Role" data-message="Are you sure you want to delete {{ $post->post_title }} Role ?">--}}
                                                        {{--<i class="glyphicon glyphicon-trash"></i> Delete--}}
                                                    {{--</button>--}}
                                                    {{--{{ Form::close() }}--}}
                                                {{--</td>--}}
                                            </tr>
                                        @endforeach
                                        {{--<tr>--}}
                                        {{--<td colspan="4">{{$resources->links()}}</td>--}}
                                        {{--</tr>--}}
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('travellers-inn.admin.includes.delete-modal')





    {{--<div class="widget bg-lightblue-1 animated fadeInDown well">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-8">--}}
                {{--<h4>{{ $hashTag->name }} --}}{{--<small>{{ $hashTag->posts()->count() }} posts</small>--}}{{--</h4>--}}
                {{--<h6>{{ $hashTag->description }} --}}{{--<small>{{ $hashTag->posts()->count() }} posts</small>--}}{{--</h6>--}}
            {{--</div>--}}
            {{--<div class="col-md-2">--}}
                {{--<a href="{{ route('hash-tags.edit', $hashTag->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top:22px;">Edit</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-2">--}}
                {{--{{ Form::open(['route' => ['hash-tags.destroy', $hashTag->id], 'method' => 'DELETE']) }}--}}
                {{--{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px;']) }}--}}
                {{--{{ Form::close() }}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<label for="table">Posts related to <em>{{ $hashTag->name }}: </em> <span>{{ $hashTag->posts()->count() }}</span></label>--}}
                {{--<table class="table" id="table">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>#</th>--}}
                        {{--<th>Title</th>--}}
                        {{--<th>Tags</th>--}}
                        {{--<th></th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--@foreach($hashTag->posts as $post)--}}
                        {{--<tr>--}}
                            {{--<th>{{ $post->id }}</th>--}}
                            {{--<td>{{ $post->post_title }}</td>--}}
                            {{--<td>--}}
                                {{--@foreach($post->hashTags as $hashTag)--}}
                                    {{--<a class="label label-default" href="{{ route('hash-tags.show', $hashTag->id) }}">{{ $hashTag->name }}</a>--}}
                                {{--@endforeach--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<a href="{{ route('posts.show', $post->id) }}" class="btn btn-darkblue-1 btn-sm">View</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection


@section('script')
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/pages/datatables.js') }}"></script>
@endsection