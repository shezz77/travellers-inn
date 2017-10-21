@extends('travellers-inn.layouts.admin-panel-main')

@section('title', 'Admin Home')

{{--@section('stylesheet')--}}
    {{--<link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />--}}
{{--@endsection--}}

@section('content')
    <!-- Start info box -->
    <div class="row top-summary">
        <div class="col-lg-3 col-md-6">
            <div class="widget green-1 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="icon-globe-inv"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata">TOTAL <b>POSTS</b></p>
                        <a href="{{ route('posts.index') }}">
                            <h2><span class="animate-number" data-value="{{ \App\Utils\PostWrapper::count() }}" data-duration="3000">0</span></h2>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="widget-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="rel-change"></i> <b></b>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="widget darkblue-2 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="icon-bag"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata"><b>Most Visited Pages</b></p>
                            <a href="{{ route('page.views') }}"> <h2><span class="animate-number" data-value="{{$i}}" data-duration="3000"></span></h2></a>
                            <div class="clearfix"></div>
                    </div>
                </div>
                <div class="widget-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="rel-change"></i> <b></b>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="widget pink-1 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata"> <b>UNIQUE PAGES</b></p>
                        {{--<h2><span class="animate-number" data-value="70389" data-duration="3000">0</span></h2>--}}
                        <a href="{{ route('unique.page') }}"> <h2><span class="animate-number" data-value="{{$a}}" data-duration="3000"></span></h2></a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="widget-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="rel-change"></i> <b></b>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="widget lightblue-1 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata">TOTAL <b>USERS</b></p>
                        <a href="{{ route('user.list') }}">
                            <h2><span class="animate-number" data-value="{{ \App\Utils\UserWrapper::count() }}" data-duration="3000">0</span></h2>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="widget-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="rel-change"></i> <b></b>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@include('travellers-inn.admin.includes.most-viewed-posts')
@include('travellers-inn.admin.includes.featured-posts')

@endsection

{{--@section('script')--}}
    {{--<script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>--}}
    {{--<script src="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>--}}
    {{--<script src="{{ asset('admin-panel-assets/js/pages/datatables.js') }}"></script>--}}
    {{--<script src="{{ asset('admin-panel-assets/js/delete-modal.js') }}" type="text/javascript"></script>--}}
    {{--<script>--}}
        {{--$("#datatables-1").dataTable();--}}
    {{--</script>--}}
{{--@endsection--}}