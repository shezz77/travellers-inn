@extends('travellers-inn.layouts.frontend-main')

@section('title', 'Register - ')
@section('stylesheet')
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datepicker/datePicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/banner.css') }}" rel="stylesheet">

@endsection

@section('slider')

@endsection

@section('page-title-div-text' , 'Registration in Travellers Inn')
@include('travellers-inn.includes.frontend._page-title')

@section('content')
   @include('travellers-inn.auth.includes.registration-form')
@endsection
@section('script')
    <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datepicker/jqDatePicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/user/custom.js') }}" type="text/javascript"></script>
    <script>
        $('.DOB').datePicker();
        $('#register-form').parsley();
    </script>
@endsection