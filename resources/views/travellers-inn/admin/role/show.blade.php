@extends('travellers-inn.layouts.admin-panel-main')

@section('title', "$role->display_name Details")

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="page-heading">
        <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1><i class='fa fa-tachometer'></i> <strong>{{ $role->display_name }}</strong> Details</h1>
                <h3>Role Detail of Travellers Inn</h3>
                <h4> Total user attached to {{ $role->name }}  <span class="label label-primary">{{ sizeof($role->users) }}</span></h4>
                <h5><td>{{ $role->description }}</td></h5>
            </div>
            <div class="pull-right">
                <a href="{{ route('role.index') }}" class="btn btn-darkblue-1"><i class="fa fa-backward"></i> Back to Roles List</a>
                <a href="{{ route('resource.management', $role->id) }}" class="btn btn-blue-2 btn-block">Manage Resources</a>
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
                            <h2><strong>{{ $role->display_name }}</strong>'s Resources List</h2>
                            <div class="additional-btn">
                                <a href="{{ route('resource.management', $role->id) }}" class=""><i class="fa fa-edit"></i></a>
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
                                            <td>#</td>
                                            <td>Name</td>
                                            <td>route</td>
                                            <td>display_name</td>
                                            <td>description</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($role->resources as $resource)
                                            <tr>
                                                <td>{{ $resource->id }}</td>
                                                <td><a href="{{ route('resource.show', $resource->id) }}" class="">{{ $resource->name }}</a></td>
                                                <td>{{ $resource->route }}</td>
                                                <td><a href="{{ route('resource.show', $resource->id) }}" class="">{{ $resource->display_name }}</a></td>
                                                <td>{{ substr($resource->description, 0, 40) }}{{ strlen($resource->description) > 40 ? "......" : "" }}</td>
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
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/pages/datatables.js') }}"></script>
@endsection
