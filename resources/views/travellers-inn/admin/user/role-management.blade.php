@extends('travellers-inn.layouts.admin-panel-main')

@section('title', "$user->user_name Roles Management")

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="page-heading">
                <h1><i class='fa fa-table'></i> {{ $user->user_name }}</h1>
                <h3>Role Management in Travellers Inn</h3>
            </div>
        </div>
        <div class="col-md-2 col-lg-offset-2">
            <a href="{{ route('admin.user.show',$user->id)}}" class="btn btn-primary btn-block">Back to User Detail</a>
        </div>
    </div>
    <!-- Page Heading End-->				<!-- Your awesome content goes here -->
    <div class="row">

        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <h2><strong>{{ $user->user_name }}</strong> Role Management Panel</h2>
                    <div class="additional-btn">
                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                        <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                        <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                    </div>
                </div>
                <div class="widget-content">
                    <br>
                    {!! Form::open(['route' => ['role.attach', $user->id], 'method' => 'post']) !!}
                    <div class="table-responsive">

                        <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Role Name</th>
                                <th>Description</th>
                                <th>Assign/De-Assign</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Role Name</th>
                                <th>Description</th>
                                <th>Assign/De-Assign</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th>{{ $role->id }}</th>
                                    <td ><a href="{{ route('role.show',$role->id)}}"> {{ $role->name }}</a></td>
                                    <td>{{ $role->description }}</td>
                                    <td><input name="{{ $role->name }}" type="checkbox" {{ $user->hasRole($role->name) ? 'checked' : '' }}></td>
                                </tr>
                            @endforeach
                            {{--<tr>--}}
                            {{--<td colspan="4">{{$resources->links()}}</td>--}}
                            {{--</tr>--}}
                            </tbody>
                        </table>

                    </div>
                    {{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) }}
                    {!! Form::close() !!}
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