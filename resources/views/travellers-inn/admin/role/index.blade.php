@extends('travellers-inn.layouts.admin-panel-main')

@section('title', 'Roles')

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="page-heading">
        <h1><i class='fa fa-user'></i> Roles</h1>
        @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'role.store'])
            <button class="md-trigger btn btn-darkblue-1 pull-right" data-modal="cerate-role-modal" id="logout-modal"><i class="fa fa-plus"></i> Create Role</button>
        @endcan
        <h3>User Roles in Travellers Inn</h3>
    </div>
    <div class="">
        <div class="widget bg-lightblue-1 animated fadeInDown row">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-header">
                            <h2><strong>Roles</strong> List</h2>
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
                                            <th>Id</th>
                                            <th>Name</th>
                                            {{--<th>Description</th>--}}
                                            @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'role.update'])
                                                <th width="40">Update</th>
                                            @endcan
                                            @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'role.delete'])
                                                <th width="40">Remove</th>
                                            @endcan
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <th>{{ $role->id }}</th>
                                                <td ><a href="{{ route('role.show',$role->id)}}"> {{ $role->display_name }}</a></td>
                                                {{--<td>{{ $role->description }}</td>--}}
                                                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'role.update'])

                                                    <td>
                                                        @if($role->id != \App\Utils\Globals\AppGlobal::SUPER_ADMIN)
                                                            <a href="#" class="btn btn-xs btn-darkblue-2 edit" data-value="{{ route('role.edit', $role->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                                        @endif
                                                    </td>

                                                @endcan
                                                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'role.delete'])
                                                    <td>
                                                        @if($role->id != \App\Utils\Globals\AppGlobal::SUPER_ADMIN)
                                                        {{ Form::open(['route' => ['role.destroy', $role->id], 'method' => 'DELETE']) }}
                                                        <button class="btn btn-xs btn-danger md-trigger" type="button" data-modal="confirmDelete" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Role" data-message="Are you sure you want to delete {{ $role->name }} Role ?">
                                                            <i class="glyphicon glyphicon-trash"></i> Delete
                                                        </button>
                                                        {{ Form::close() }}
                                                        {{--<a class="btn btn-danger md-trigger" role="button" data-modal="modal-delete-{{ $role->id }}">Delete</a>--}}
                                                        @endif
                                                    </td>
                                                @endcan
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
            @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'role.store'])
        </div>
        @endcan


    </div>


    @include('travellers-inn.admin.role.partials.edit')
    @include('travellers-inn.admin.includes.delete-modal')

@endsection
@section('modal')
    @include('travellers-inn.admin.role.partials.create')
@endsection


@section('script')
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/pages/datatables.js') }}"></script>
    <script src="{{ asset('js/role/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-panel-assets/js/delete-modal.js') }}" type="text/javascript"></script>
    <script>
        $('#role-create-form').parsley();
    </script>
@endsection