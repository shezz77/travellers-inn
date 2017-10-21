@extends('travellers-inn.layouts.admin-panel-main')

@section('title', "Slider")

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="page-heading">
        <div class="row">
            <div class="col-md-8">
                <h1><i class='fa fa-tachometer'></i> <strong>{{$slider->name}}</strong> Details</h1>
                <h3>{{$slider->name}}  Detail of Travellers Inn</h3>
                <h4> Total Posts attached to {{$slider->name}} <span class="label label-primary">{{$slider->name}}</span></h4>
            </div>
            <div class="col-md-3 col-lg-offset-1">
                <a href="{{ route('slider.index') }}" class="btn btn-primary btn-block"><span class="fa fa-eye"></span> View All Slider</a>
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
                            <h2><strong>  {{$slider->name}} </strong>'s Posts List</h2>
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

                                            <th>Created Date</th>
                                            <th>View</th>
                                            {{--<th>Detail</th>--}}
                                            <th>Add</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($posts as $post)
                                            @if(!$slider->hasPost($post->id))
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ substr($post->post_title, 0, 40)}}{{ strlen($post->post_title) > 40 ? "....." : "" }}</td>
                                                <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                                                <td> <a href="{{ route('posts.show', $post->id) }}" class=""><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                                <td> <a href="{{  route('slider.post.attach', ['slider_id' => $slider->id,'post_id' => $post->id]) }}" class="btn btn-xs btn-darkblue-2"><i class="fa fa-plus"></i> Add Post</a></td>

                                            </tr>
                                            @endif
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







    <div class="well">
        <div class="widget bg-lightblue-1 animated fadeInDown row">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-header">
                            <h2><strong>  {{$slider->name}}</strong>'s Posts List</h2>
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
                                            <th>Created Date</th>
                                            <th>View</th>
                                            <th>Add</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($slider->posts as $post)
                                        {{--@foreach ($posts as $post)--}}
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ substr($post->post_title, 0, 40)}}{{ strlen($post->post_title) > 40 ? "....." : "" }}</td>
                                                <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                                                <td> <a href="{{ route('posts.show', $post->id) }}" class="btn buttonCustomPrimary btn-block"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                                <td> <a href="{{  route('slider.post.detach', ['slider_id' => $slider->id,'post_id' => $post->id]) }}" class="btn btn-xs btn-danger md-trigger"><i class="fa fa-minus"></i> Remove Post</a></td>

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
@endsection


@section('script')
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/pages/datatables.js') }}"></script>
@endsection