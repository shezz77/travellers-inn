@extends('travellers-inn.layouts.admin-panel-main')

@section('title', 'Categories')

@section('content')
    <div class="page-heading">
        <h1><i class='fa fa-list'></i> Category Management</h1>


            <a href="{{ route('category.index') }}" class="btn btn-darkblue-1 pull-right"><i class="fa fa-backward"></i> Back to Category List</a>
        <h3>Travellers Inn Category</h3>
    </div>


    <div class="widget">
        <div class="widget-header transparent">
            <h2><strong>Edit </strong> {{$category->title}} Category</h2>
            <div class="additional-btn">
                <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
            </div>
        </div>
        <div class="widget-content padding">
            <form class="form-horizontal" role="form" action="{{ route('category.update', $category->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="select-country" class="col-sm-2 control-label">Select Parent Category: </label>
                    <div class="col-sm-10">
                    <select class="form-control select-plugin" {{ $category->parent_id == \App\Utils\Globals\AppGlobal::CONTENT_TYPE_PARENT || $category->parent_id == \App\Utils\Globals\AppGlobal::DESTINATION_PARENT ? '' : 'disabled' }} id="select-country" name="parent_id">
                        {{--<option selected value="{{ $categoryID }} ">{{$categoryName}}</option>--}}
                        <option value="0">Root Category</option>
                        @foreach($categories as $editCategory)
                            <option value='{{ $editCategory->id }}' {{ $editCategory->id == $categoryID ? 'selected' : '' }}>{{ $editCategory->title }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-text" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $category->title }}" name="title" class="form-control" id="input-text" placeholder="Input text">
                    </div>
                </div>

                <div class="form-group">
                    <label for="input-text" class="col-sm-2 control-label">Genre</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $category->genre }}" name="genre" class="form-control" id="input-text" placeholder="Input text">
                    </div>
                </div>

                <div class="form-group">
                    <label for="input-text" class="col-sm-2 control-label">Detail</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $category->detail }}" name="detail" class="form-control" id="input-text" placeholder="Input text">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary col-sm-offset-2">Save Changes</button>
            </form>
        </div>

    </div>
    <!-- End of your awesome content -->




    {{--<div id="main-wrapper" class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="panel panel-white">--}}
                    {{--<div class="panel-heading clearfix">--}}
                        {{--<h4 class="panel-title"> Edit {{$category->title}} Category</h4>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--{{ Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'PUT']) }}--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">Select Parent Category:</label>--}}
                            {{--<label for="select-country"></label>--}}
                            {{--<select class="form-control select-plugin" id="select-country" name="parent_id">--}}
                                {{--<option selected value="{{ $categoryID }} ">{{$categoryName}}</option>--}}
                                {{--@foreach($categories as $editCategory)--}}
                                    {{--<option value='{{ $editCategory->id }}'>{{ $editCategory->title }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--{{ Form::label('title', 'Title:') }}--}}
                        {{--{{ Form::text('title', $category->title, ['class' => 'form-control']) }}--}}
                        {{--{{ Form::label('genre', 'Genre:') }}--}}
                        {{--{{ Form::text('genre', $category->genre, ['class' => 'form-control']) }}--}}
                        {{--{{ Form::label('detail', 'Details:') }}--}}
                        {{--{{ Form::text('detail', $category->detail, ['class' => 'form-control']) }}--}}
                        {{--<div class="form-group col-md-8 ">--}}
                            {{--<button type="submit" class="btn buttonCustomPrimary col-md-5">Save Changes</button>--}}
                        {{--</div>--}}
                        {{--{!! Form::close() !!}--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div><!-- Row -->--}}
    {{--</div><!-- Main Wrapper -->--}}
{{--</div>--}}
@endsection          

@section('scripts')
@stop
