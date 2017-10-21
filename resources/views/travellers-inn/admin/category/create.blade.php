@extends('travellers-inn.layouts.admin-panel-main')

@section('title', 'Categories')

@section('content')
    <div id="main-wrapper" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title"></h4>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['id' => 'CategoryForm', 'route' => 'category.store', 'method' => 'post', 'files' => true]) !!}
                        @include('travellers-inn.admin.category.partials.continent-form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div><!-- Row -->
    </div><!-- Main Wrapper -->
@endsection
