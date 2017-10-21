<!--Modal Logout-->
<div class="md-modal md-3d-slit" id="cerate-hashtag-modal">
    <div class="md-content">
        <h3><strong>Create Hash Tags</strong> </h3>

        <div style="padding: 5px 22px 48px;">

            {!! Form::open(['route' => 'hash-tags.store', 'method' => 'post', 'id' => 'hashTags-create-form']) !!}
            @include('travellers-inn.admin.hash-tags.partials.form')
            <br>
            <button type="button" class="btn btn-darkblue-1 md-close" style="float: right;margin-left: 10px;padding: 7px;">Cancel</button>
            <button type="submit" class="btn btn-darkblue-1" style="float: right;background-color: #68C39F !important">Create New HashTag</button>
            {{--{{ Form::submit('Create New HashTag', ['class' => 'btn btn-darkblue-1']) }}--}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
