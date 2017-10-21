@extends('travellers-inn.layouts.admin-panel-main')

@section('title', 'Hash Tags')

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="page-heading">
        <h1><i class='fa fa-tags'></i> HashTags</h1>
            <button class="md-trigger btn btn-darkblue-1 pull-right" data-modal="cerate-hashtag-modal" id="create-hashtag-modal"><i class="fa fa-plus"></i> Create HashTags</button>
        <h3>User in Travellers Inn</h3>

    </div>
    <!-- Page Heading End-->				<!-- Your awesome content goes here -->

    <div class="well">
        <div class="widget bg-lightblue-1 animated fadeInDown row">
                <div class="row">

                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-header">
                                <h2><strong>Hash Tags</strong> List</h2>
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
                                                <td>#</td>
                                                <td>Name</td>
                                                {{--<td>Description</td>--}}
                                                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'hash-tags.update'])
                                                    <td width="40">Update</td>
                                                @endcan
                                                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'hash-tags.destroy'])
                                                    <td width="40">Delete</td>
                                                @endcan
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($hashTags as $hashTag)
                                                <tr>
                                                    <td>{{ $hashTag->id }}</td>
                                                    <td><a href="{{ route('hash-tags.show', $hashTag->id) }}">{{ $hashTag->name }} <span class="glyphicon glyphicon-new-window"></span></a></td>
{{--                                                    <td>{{ substr( $hashTag->description, 0, 15 )}}{{ strlen($hashTag->description) > 15 ? "....." : "" }}</td>--}}
                                                    @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'hash-tags.update'])
                                                        <td> <a href="#" class="btn btn-xs btn-darkblue-2 edit" data-value="{{ route('hash-tags.edit', $hashTag->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a></td>
                                                    @endcan
                                                    @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'hash-tags.destroy'])
                                                        <td>
                                                            {{ Form::open(['route' => ['hash-tags.destroy', $hashTag->id], 'method' => 'DELETE']) }}
                                                            <button class="btn btn-xs btn-danger md-trigger" type="button" data-modal="confirmDelete" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Role" data-message="Are you sure you want to delete {{ $hashTag->name }} Role ?">
                                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                                            </button>
                                                            {{ Form::close() }}
                                                            {{--<a class="btn btn-danger md-trigger" role="button" data-toggle="modal" data-modal="modal-delete-{{ $hashTag->id }}">Delete</a>--}}
                                                        </td>
                                                    @endcan
                                                </tr>
                                            @endforeach
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

    @include('travellers-inn.admin.hash-tags.partials.edit')
    @include('travellers-inn.admin.includes.delete-modal')
@endsection
@section('modal')
    @include('travellers-inn.admin.hash-tags.partials.create')
@endsection
@section('script')
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/pages/datatables.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/delete-modal.js') }}" type="text/javascript"></script>

    <script>
        $('#hashTags-create-form').parsley();
    </script>
@endsection
