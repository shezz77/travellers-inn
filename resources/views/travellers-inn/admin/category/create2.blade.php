@extends('travellers-inn.layouts.admin-panel-main')

@section('title', 'Categories')

@section('content')
    <div class="page-heading">
        <h1><i class='fa fa-check'></i> Create New Category</h1>
        <a href="{{ route('category.index') }}" class="btn btn-darkblue-1 pull-right"><i class="fa fa-backward"></i> Back to Category List</a>
    </div>
    <br/>
    <div class="row">
            <div class="col-md-6">
                <div class="widget">
                    <div class="widget-header transparent">
                        <h2><strong>Create</strong> Content</h2>
                        <div class="additional-btn">
                            <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                            <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                            <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                        </div>
                    </div>
                    <div class="widget-content padding">
                        <div id="basic-form">
                            <form action="{{ route('category.store') }}" method="POST" role="form">
                                @include('travellers-inn.admin.category.partials.content-form')
                                <button type="submit" class="btn btn-primary">Create Content</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="widget">
                    <div class="widget-header transparent">
                        <h2><strong>Create</strong> Continent</h2>
                        <div class="additional-btn">
                            <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                            <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                            <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                        </div>
                    </div>
                    <div class="widget-content padding">
                        <div id="basic-form">
                            <form action="{{ route('category.store') }}" method="POST" role="form">
                                @include('travellers-inn.admin.category.partials.continent-form')
                                <button type="submit" class="btn btn-primary">Create Continent</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection