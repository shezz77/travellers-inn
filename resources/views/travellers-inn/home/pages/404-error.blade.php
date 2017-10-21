
@extends('travellers-inn.layouts.frontend-main')

@section('title', 'Error 404 - ')

@section('slider')
@endsection

@section('page-title-div-text' , 'Error Travellers Inn')

@section('content')


<!-- PAGE CONTENT -->
<section class="notFoundContent">
    <img src="{{ asset('assets/img/not-found/not-found.png')}}" alt="">
    <h4>Oops! The page you are looking for could not be found!</h4>
    <p>Please try searching again</p>
    <div class="input-group">
        <input type="text" class="form-control" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
    </div>
</section>

@endsection

