@extends('travellers-inn.layouts.admin-panel-main')

@section('title', 'Categories')

@section('content')
<div class="page-inner" style="min-height:51px !important">

    <div class="page-title">
        <div class="container">
            <h3>{{ $category->title }} Category</h3>
        </div>
    </div>
    <div class="row well">
        <div class="col-md-12">
            <label for="table">Posts related to <em>{{ $category->title }}: </em> <span class="label label-default">{{ count($posts) }}</span></label>
            <table class="table" id="table">
                <thead>
                <tr>
                    {{--<th>#</th>--}}
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        {{--<th>{{ $post->id }}</th>--}}
                        <td>{{ $post->post_title }}</td>
                        <td>@foreach($post->hashTags as $hashTag)
                                <a class="label label-default" href="{{ route('hash-tags.show', $hashTag->id) }}">{{ $hashTag->name }}</a>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection  













