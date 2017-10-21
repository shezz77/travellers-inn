@extends('travellers-inn.layouts.admin-panel-main')

@section('title', 'Categories')


@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="page-heading">
                <h1><i class='glyphicon glyphicon-list'></i> Travellers Inn Categories</h1>
            </div>
        </div>
        <div class="pull-right" style="margin-right: 25px">
            <a href="{{route('category.create')}}" class='btn btn-sm btn-primary'><i class='icon-doc-new'></i> Create New</a><br><br>
        </div>
    </div>
<div class="row">
    <div class="page-inner" style="min-height:51px !important">
        <div id="main-wrapper widget" class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">List of Categories</h4>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tblCategories" class="display table" style="width: 100%; cellspacing: 0;">

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Row -->
        </div>
    </div>
</div>
    @include('travellers-inn.admin.includes.delete-modal')
@endsection
@section('script')
    <link href="{{asset('css/dataTables.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/category/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/category/dataTables.treeGrid.js')}}"></script>
    <script>
        $(document).ready(function () {
            var columns = [
                {
                    title: '',
                    target: 0,
                    className: 'treegrid-control',
                    data: function (item) {
                        if (item.children) {
                            return '<span class="glyphicon glyphicon-plus">&nbsp;</span>';
                        }
                        return '';
                    }
                },
                {
                    title: 'Name',
                    target: 1,
                    data: function (item) {
                        return item.title;
                    }
                },
                {
                    title: 'Action',
                    target: 2,
                    data: function (item) {
                        var id = item.id;
                        return `<a href="{{ url('category/${id}') }}">View</a>&nbsp;<a href="{{ url('/category/${id}/edit') }}"> Edit</a>&nbsp;<a href="{{ url('/category/delete/${id}') }}" type="button" onclick="nconfirm()" "> Delete</a>`;
                    }
                },
            ];
//var url = '/fetchcategories';
                    {{--//    var url = "{{route('fetchcategories')}}";--}}
            var url = '{{ route("fetch-category") }}';
            $('#tblCategories').DataTable({
                'columns': columns,
                'ajax': url,
                'treeGrid': {
                    'left': 50,
                    'expandIcon': '<span class="glyphicon glyphicon-plus">&nbsp;</span>',
                    'collapseIcon': '<span class="glyphicon glyphicon-minus">&nbsp;</span>'
                }
            });
        });

    </script>
    <script src="{{ asset('admin-panel-assets/js/delete-modal.js') }}" type="text/javascript"></script>
@stop
