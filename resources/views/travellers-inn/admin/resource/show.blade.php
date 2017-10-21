@extends('travellers-inn.layouts.admin-panel-main')

@section('title', "$resource->display_name Details")

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="page-heading">
        <div class="row">
            <div class="col-md-8">
                <h1><i class='fa fa-tachometer'></i> <strong>{{ $resource->display_name }}</strong> Details</h1>
                <h3>Role Detail of Travellers Inn</h3>
                <h4> Total user attached to {{ $resource->name }}  <span class="label label-primary">{{ \App\Utils\ResourceWrapper::userCount($resource) }}</span></h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('role.index') }}" class="btn btn-primary btn-block">View All Roles</a>
                <a href="{{ route('resource.management', $resource->id) }}" class="btn btn-blue-2 btn-block">Manage Resources</a>
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
                            <h2><strong>{{ $resource->display_name }}</strong>'s Resources List</h2>
                            <div class="additional-btn">
                                <a href="{{ route('resource.management', $resource->id) }}" class=""><i class="fa fa-edit"></i></a>
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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>Country</th>
                                            <th>Status</th>
                                            <th>View Detail</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($resource->users() as $user)
                                            <tr>
                                                <th>{{ $user->id }}</th>
                                                <td>{{ $user->user_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td><a href="{{ route('user.country', $user->state->country->id) }}" class="">{{ substr($user->state->country->name, 0, 10)  }}{{ strlen($user->state->country->name) > 10 ? '.....' : '' }} <span class="glyphicon glyphicon-new-window"></span></a></td>
                                                <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                <td> <a href="{{ route('admin.user.show', $user->id) }}" class="h3"><i class="glyphicon glyphicon-eye-open"></i></a></td>
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
