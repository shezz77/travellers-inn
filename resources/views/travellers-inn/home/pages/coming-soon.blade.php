@extends('travellers-inn.layouts.frontend-main')

@section('title', 'Coming Soon - ')

@section('slider')
@endsection

@section('page-title-div-text' , 'Coming-soon Travellers Inn')

@section('content')

    <section class="comingContent">
    <h1>We are coming soon</h1>
    <p>We are currently working on launching our website. Meanwhile read some information about us and you can subscribe to our newsletter in order to get notified when we launch.. </p>
    <div class="count-down clearfix">
        <div id="simple_timer"></div>
    </div>
    <div class="input-group">
        <input type="text" class="form-control" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2">SUbscribe</span>
    </div>
    <ul class="list-inline">
        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>

    </ul>
</section>
@endsection
