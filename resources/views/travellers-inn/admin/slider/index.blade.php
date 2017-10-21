@extends('travellers-inn.layouts.admin-panel-main')

@section('title', 'Slider')

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="page-heading">
        <h1><i class='fa fa-tags'></i> Slider</h1>
        @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'slider.store'])
            <button class="md-trigger btn btn-darkblue-1 pull-right" data-modal="create-slider-modal" id="create-slider-modal"><i class="fa fa-plus"></i> Create Slider</button>

        @endcan
        <h3>Slider in Travellers Inn</h3>
    </div>
    <!-- Page Heading End-->				<!-- Your awesome content goes here -->

    <div class="well">
        <div class="widget bg-lightblue-1 animated fadeInDown row">
            @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), ''])
                    @endcan
                    <div class="row">

                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-header">
                                    <h2><strong>Slider</strong> List</h2>
                                    <div class="additional-btn">
                                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                        <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                                        <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <br>
                                    <div class="table-responsive">

                                        <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Name</td>
                                                <td>Destination</td>
                                                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'slider.update'])
                                                    <td width="40">Update</td>
                                                @endcan
                                                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'slider.delete'])
                                                    <td width="40">Delete</td>
                                                @endcan

                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($sliders as $slider)
                                                <tr>
                                                    <td>{{ $slider->id }}</td>
                                                    <td><a href="{{ route('slider.show', $slider->id) }}">{{ $slider->name }} <span class="glyphicon glyphicon-new-window"></span></a></td>

                                                    <td>{{ $slider->category_id }}</td>
                                                    @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'slider.update'])
                                                        <td> <a href="#" id="slider-create-form" class="btn btn-xs btn-darkblue-2 edit" data-value="{{ route('slider.edit', $slider->id) }}" ><i class="glyphicon glyphicon-edit" ></i> Edit</a></td>
                                                    @endcan
                                                    @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'slider.delete'])
                                                        <td>
                                                            {{ Form::open(['route' => ['slider.destroy', $slider->id], 'method' => 'DELETE']) }}
                                                            <button class="btn btn-xs btn-danger md-trigger" type="button" data-modal="confirmDelete" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Slider" data-message="Are you sure you want to delete {{ $slider->name }} Slider ?">
                                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                                            </button>
                                                            {{ Form::close() }}
                                                            {{--<a class="btn btn-danger md-trigger" slider="button" data-toggle="modal" data-modal="modal-delete-{{ $hashTag->id }}">Delete</a>--}}
                                                        </td>
                                                    @endcan
                                                </tr>
                                            @endforeach
                                            {{--<tr>--}}
                                            {{--<td colspan="4">{{$resources->links()}}</td>--}}
                                            {{--</tr>--}}
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

        @include('travellers-inn.admin.slider.partials.edit')
        @include('travellers-inn.admin.includes.delete-modal')
        @endsection
        @section('modal')
            @include('travellers-inn.admin.slider.partials.create')
        @endsection

        @section('script')
            <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
            <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
            <script src="{{ asset('admin-panel-assets/js/pages/datatables.js') }}"></script>
            <script src="{{ asset('admin-panel-assets/js/delete-modal.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/slider/custom.js') }}" type="text/javascript"></script>
            <script>
                $('#slider-form').parsley();
            </script>
@endsection
