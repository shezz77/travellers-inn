@extends('travellers-inn.layouts.admin-panel-main')

@section('title', 'System Resources')

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')


    <div class="page-heading">
        <h1><i class='icon icon-cog-2'></i> Resources</h1>
        <h3>Travellers Inn System Resources</h3>
    </div>
    <!-- Page Heading End-->				<!-- Your awesome content goes here -->
    <div class="row">

        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <h2><strong>Resources</strong> List</h2>
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
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-6">--}}
                                        {{--<div class="dataTables_length" id="datatables-1_length">--}}
                                            {{--<label>--}}
                                                {{--<select name="datatables-1_length" aria-controls="datatables-1" class="form-control input-sm">--}}
                                                    {{--<option value="10">10</option>--}}
                                                    {{--<option value="25">25</option>--}}
                                                    {{--<option value="50">50</option>--}}
                                                    {{--<option value="100">100</option>--}}
                                                {{--</select>--}}
                                                {{--records per page--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-6">--}}
                                        {{--<div id="datatables-1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" aria-controls="datatables-1"></label></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Related Users</th>
                                    <th width="40">Detail</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($resources as $resource)
                                <tr>
                                    <th>{{ $resource->id }}</th>
                                    <td ><a href="{{ route('resource.show',$resource->id)}}"> {{ $resource->display_name }}</a></td>
                                    <td>{{ substr($resource->description, 0, 30) }}{{ strlen($resource->description) > 30 ? "......" : "" }}</td>
                                    <td>{{ \App\Utils\ResourceWrapper::userCount($resource) }}</td>
                                    <td ><a href="{{ route('resource.show',$resource->id)}}" class="h3"><i class="glyphicon glyphicon-eye-open"></i></a></td>
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
@endsection

@section('script')
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/pages/datatables.js') }}"></script>
@endsection