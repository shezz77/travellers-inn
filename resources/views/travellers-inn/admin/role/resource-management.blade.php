@extends('travellers-inn.layouts.admin-panel-main')

@section('title', "$role->display_name Resource Management")

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="page-heading">
        <div class="row">
            <div class="col-md-8">
                <h1><i class='fa fa-tachometer'></i> <strong>{{ $role->display_name }}</strong>'s Resource Management Panel</h1>
                <h3>Resource Management in Travellers Inn</h3>
                <h4> Total user attached to {{ $role->display_name }}  <span class="label label-primary">{{ sizeof($role->users) }}</span></h4>
            </div>
            <div class="col-md-2 col-lg-offset-2">
                <a href="{{ route('role.show',$role->id)}}" class="btn btn-primary btn-block">Back</a>
            </div>
        </div>
    </div>
    <!-- Page Heading End-->				<!-- Your awesome content goes here -->

    {{--<div class="well">--}}
    {{--<div class="widget bg-lightblue-1 animated fadeInDown row">--}}
    {{--<div class="row">--}}

    {{--<div class="col-md-12">--}}
    {{--<div class="widget">--}}
    {{--<div class="widget-header">--}}
    {{--<h2><strong>All</strong> Resources List</h2>--}}
    {{--<div class="additional-btn">--}}
    {{--<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>--}}
    {{--<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>--}}
    {{--<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="widget-content">--}}
    {{--<br>--}}
    {{--<div class="table-responsive">--}}
    {{--{!! Form::open(['route' => ['resource.attach', $role->id], 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) !!}--}}
    {{--<table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th>Id</th>--}}
    {{--<th>Role Name</th>--}}
    {{--<th>Description</th>--}}
    {{--<th>Assign/De-Assign</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}

    {{--<tfoot>--}}
    {{--<tr>--}}
    {{--<th>Id</th>--}}
    {{--<th>Resource Name</th>--}}
    {{--<th>Description</th>--}}
    {{--<th>Assign/De-Assign</th>--}}
    {{--</tr>--}}
    {{--</tfoot>--}}

    {{--<tbody>--}}
    {{--@foreach ($resources as $resource)--}}
    {{--<tr>--}}
    {{--<td>{{ $resource->id }}</td>--}}
    {{--<td ><a href="{{ route('resource.show',$resource->id)}}"> {{ $resource->display_name }}</a></td>--}}
    {{--<td>{{ $resource->description }}</td>--}}
    {{--<td>--}}
    {{--<div class="checkbox">--}}
    {{--<label>--}}
    {{--<input name="{{ $resource->name }}" type="checkbox" {{ $role->hasResource($resource->name) ? 'checked' : '' }}>--}}

    {{--</label></div>--}}
    {{--</td>--}}

    {{--</tr>--}}
    {{--@endforeach--}}
    {{--<tr>--}}
    {{--<td colspan="4">{{$resources->links()}}</td>--}}
    {{--</tr>--}}
    {{--</tbody>--}}
    {{--</table>--}}


    {{--{{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) }}--}}
    {{--{!! Form::close() !!}--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    <div class="well">
        <div class="widget bg-lightblue-1 animated fadeInDown row">
            <div class="row">

                <div class="col-sm-12">
                    <div class="widget">
                        <div class="widget-header">
                            <h2><strong>All</strong> Resources List</h2>
                            <div class="additional-btn">
                                <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                                <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                            </div>
                        </div>
                        <div class="widget-content padding">
                            <br>
                            <div class="container">
                                {!! Form::open(['route' => ['resource.attach', $role->id], 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                                <div class="row">

                                    <div class="col-sm-5 panel panel-default" style="margin-right: 15px">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordiondemo" href="#accordion1" aria-expanded="false" class="collapsed">
                                                    Post Permissions
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="accordion1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="check" id="checkAllPost"> Check All
                                                    </label>
                                                </div>
                                                @foreach ($resources as $resource)
                                                    @if($resource->for == 'post')
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" class="checkPost" name="{{ $resource->name }}" {{ $role->hasResource($resource->name) ? 'checked' : '' }}>{{ $resource->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 panel panel-default" style="margin-right: 15px">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordiondemo" href="#accordion2" aria-expanded="false" class="collapsed">
                                                    Admin Permissions
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="accordion2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="check" id="checkAllAdmin"> Check All
                                                    </label>
                                                </div>
                                                @foreach ($resources as $resource)
                                                    @if($resource->for == 'admin')
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" class="checkAdmin" name="{{ $resource->name }}" {{ $role->hasResource($resource->name) ? 'checked' : '' }}>{{ $resource->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 panel panel-default" style="margin-right: 15px">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordiondemo" href="#accordion3" aria-expanded="false" class="collapsed">
                                                    User Permissions
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="accordion3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="check" id="checkAllUser"> Check All
                                                    </label>
                                                </div>
                                                @foreach ($resources as $resource)
                                                    @if($resource->for == 'user')
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" class="checkUser" name="{{ $resource->name }}" {{ $role->hasResource($resource->name) ? 'checked' : '' }}>{{ $resource->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 panel panel-default" style="margin-right: 15px">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordiondemo" href="#accordion4" aria-expanded="false" class="collapsed">
                                                    Category Permissions
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="accordion4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="check" id="checkAllCategory"> Check All
                                                    </label>
                                                </div>
                                                @foreach ($resources as $resource)
                                                    @if($resource->for == 'category')
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" class="checkCategory" name="{{ $resource->name }}" {{ $role->hasResource($resource->name) ? 'checked' : '' }}>{{ $resource->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 panel panel-default" style="margin-right: 15px">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordiondemo" href="#accordion5" aria-expanded="false" class="collapsed">
                                                    Role Permissions
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="accordion5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="check" id="checkAllRole"> Check All
                                                    </label>
                                                </div>
                                                @foreach ($resources as $resource)
                                                    @if($resource->for == 'role')
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" class="checkRole" name="{{ $resource->name }}" {{ $role->hasResource($resource->name) ? 'checked' : '' }}>{{ $resource->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 panel panel-default" style="margin-right: 15px">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordiondemo" href="#accordion6" aria-expanded="false" class="collapsed">
                                                    Resource Permissions
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="accordion6" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="check" id="checkAllResource"> Check All
                                                    </label>
                                                </div>
                                                @foreach ($resources as $resource)
                                                    @if($resource->for == 'resource')
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" class="checkResource" name="{{ $resource->name }}" {{ $role->hasResource($resource->name) ? 'checked' : '' }}>{{ $resource->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 panel panel-default" style="margin-right: 15px">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordiondemo" href="#accordion7" aria-expanded="false" class="collapsed">
                                                    Hashtag Permission
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="accordion7" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="check" id="checkAllHashTags"> Check All
                                                    </label>
                                                </div>
                                                @foreach ($resources as $resource)
                                                    @if($resource->for == 'hashtags')
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" class="checkHashTag" name="{{ $resource->name }}" {{ $role->hasResource($resource->name) ? 'checked' : '' }}>{{ $resource->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 panel panel-default" style="margin-right: 15px">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordiondemo" href="#accordion8" aria-expanded="false" class="collapsed">
                                                    Slider Permission
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="accordion8" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="check" id="checkAllSliders"> Check All
                                                    </label>
                                                </div>
                                                @foreach ($resources as $resource)
                                                    @if($resource->for == 'slider')
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" class="checkSlider" name="{{ $resource->name }}" {{ $role->hasResource($resource->name) ? 'checked' : '' }}>{{ $resource->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{ Form::submit('Save Changes', ['class' => 'btn btn-primary ']) }}
                                {!! Form::close() !!}
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
    <script src="{{ asset('js/role/custom.js') }}" type="text/javascript"></script>
@endsection