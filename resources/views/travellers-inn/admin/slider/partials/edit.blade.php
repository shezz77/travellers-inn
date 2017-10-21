<div class="modal fade" id="modal" slider="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Slider <span></span></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => 'slider.update', 'method' => 'PUT']) }}
                <form action="{{ route('slider.update') }}" method="post" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{--{{ Form::label('id', 'Slider ID:') }}--}}
                    {{ Form::hidden('id', null, ['id' => 'id1']) }}
                    {{ Form::label('name', 'Slider Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name1']) }}
                    {{ Form::label('description', 'Description:') }}
                    {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description1']) }}
                    {{ Form::label('category_id', 'Destination:') }}


                    <div class="form-group" >
                        <select name="category_id" class="form-control" id="destination">
                        </select>
                    </div>





                    {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    {{--{!! Form::close() !!}--}}
                </form>
            </div>
            <div class="modal-footer">
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            </div>
        </div>
    </div>
</div>


{{--@section('content')--}}
{{--<div class="widget bg-lightblue-1 animated fadeInDown ">--}}
{{--<div class="well">--}}
{{--<h1>Edit Hash Tag <b>{{ $hashTag->name }}</b></h1>--}}
{{--</div>--}}
{{--<div class="well">--}}
{{--<div class="row">--}}
{{--<div class="col-md-4 col-md-offset-4">--}}
{{--{{ Form::model($hashTag, ['route' => ['hash-tags.update', $hashTag->id], 'method' => 'PUT']) }}--}}

{{--{{ Form::label('name', 'Hash Tag Name:') }}--}}
{{--{{ Form::text('name', null, ['class' => 'form-control']) }}--}}
{{--{{ Form::label('description', 'Hash Tag Description:') }}--}}
{{--{{ Form::text('description', null, ['class' => 'form-control']) }}--}}
{{--<br>--}}
{{--{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}--}}
{{--{{ Form::close() }}--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}