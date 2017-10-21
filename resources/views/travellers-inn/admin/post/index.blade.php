@extends('travellers-inn.layouts.admin-panel-main')

@section('title', "Users")

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="page-heading">
        <h1><i class='fa fa-pencil'></i> Posts</h1>
        <h3>Post in Travellers Inn</h3>            	</div>
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
                                    <th>Author</th>
                                    <th>Status</th>
                                    @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'posts.edit'])
                                        <th width="40">Edit</th>
                                    @endcan
                                    @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'posts.delete'])
                                        <th width="40">Delete</th>
                                    @endcan
                                    @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'posts.show'])
                                        <th width="40">Detail</th>
                                    @endcan
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th>{{ $post->id }}</th>
                                        <td>{{ substr($post->post_title, 0, 30)  }}{{ strlen($post->post_title) > 30 ? "....." : "" }}</td>
                                        <td> <a href="{{ route('admin.user.show', $post->user->id) }}"> {{ $post->user->first_name }}</a></td>
                                        <td>@if($post->status == 1)
                                                Active
                                            @elseif($post->status == 0 && $post->is_rejected == 1)
                                                Rejected
                                            @else
                                                Pending
                                            @endif</td>
                                        {{--                                        <td> <a href="{{ route('post.feature', $post->id) }}" class="btn btn-xs btn-darkblue-2"> <i class="glyphicon glyphicon-thumbs-up"></i>Featured</a></td>--}}
                                        @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'posts.edit'])
                                        <td> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-darkblue-2"> <i class="glyphicon glyphicon-edit"></i> Edit</a></td>
                                        @endcan
                                        @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'posts.delete'])
                                            <td> {!! Form::open(['route' => ['admin.posts.delete', $post->id], 'method' => 'DELETE']) !!}

                                            <button class="btn btn-xs btn-danger md-trigger" type="button" data-modal="confirmDelete" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Post" data-message="Are you sure you want to delete Post ?">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>

                                            {!! Form::close() !!}
                                            </td>
                                        @endcan
                                        @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'posts.show'])
                                        <td> <a href="{{ route('posts.show', $post->id) }}" class="h4"><i class="glyphicon glyphicon-eye-open"></i></a></td>
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


    @include('travellers-inn.admin.includes.delete-modal')

@endsection
@section('script')
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/pages/datatables.js') }}"></script>
    <script src="{{ asset('admin-panel-assets/js/delete-modal.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datepicker/jqDatePicker.min.js') }}" type="text/javascript"></script>
@endsection