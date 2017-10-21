@extends('travellers-inn.layouts.admin-panel-main')

@section('content')
    <div class="container show">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Resources</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach ($resources as $resource)
                    <div class="col-md-4">
                        <input type="checkbox" class="col-md-1">
                        <div>{{ $resource->name }}</div>
                        <div class="col-md-offset-1">{{ $resource->description }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection