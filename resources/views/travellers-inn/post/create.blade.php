@extends('travellers-inn/layouts/frontend-main')

@section('plugin-stylesheet')
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/banner.css') }}" rel="stylesheet">
@endsection

@section('slider')

@endsection

@section('page-title-div-text', 'Create Post')
@include('travellers-inn.includes.frontend._page-title')
@section('content')
    @include('travellers-inn.post.partials._nev')
    @include('travellers-inn.post.partials._tab')
@endsection


@section('plugin-script')
    <script src="{{ asset('js/post/post.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/fileinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('tinymce/tinymce.dev.js') }}" type="text/javascript"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection