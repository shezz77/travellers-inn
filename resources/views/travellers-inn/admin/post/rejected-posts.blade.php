@extends('travellers-inn.layouts.admin-panel-main')

@section('title', "Rejected Posts")

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="page-heading">
        <h1><i class='fa fa-pencil'></i>  Rejected Posts</h1>
        <h3>Rejected Post in Travellers Inn</h3>            	</div>
    <!-- Page Heading End-->				<!-- Your awesome content goes here -->
    <div class="row">

        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <h2><strong>Post</strong> List</h2>
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
                                    <th>Post Title</th>
                                    {{--<th>Created</th>--}}
                                    @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'admin.user.show'])
                                        <th>Author</th>
                                    @endcan
                                    <th>Status</th>
                                    @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'posts.show'])
                                        <th>Detail</th>
                                    @endcan
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($posts as $post)
                                    @if($post->is_rejected == 1)
                                        <tr>
                                            <th>{{ $post->id }}</th>
                                            <td>{{ $post->post_title }}</td>
{{--                                            <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>--}}
                                            @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'admin.user.show'])
                                            <td> <a href="{{ route('admin.user.show', $post->user->id) }}"> {{ $post->user->user_name }}</a></td>
                                            @endcan
                                                <td> Rejected</td>
                                            @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'posts.show'])
                                            <td> <a href="{{ route('posts.show', $post->id) }}" class="h4"><i class="glyphicon glyphicon-eye-open"></i></a></td>
                                            @endcan
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('travellers-inn.admin.includes.reject-modal')

@endsection
@section('script')
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/pages/datatables.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/delete-modal.js') }}" type="text/javascript"></script>
@endsection