<div class="container">
    <div class="col-sm-8 col-xs-8 col-sm-offset-2 col-xs-offset-2 tabs">
        <div role="tabpanel" class="tabArea">
            <!-- Tab Panels -->

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tips">
                    <div class="form-group">
                        <form action="{{ route('posts.store')}}" id="tip-create-form" role="form" method="POST" enctype="multipart/form-data">
{{--                        {!! Form::open(array('route' => 'posts.create', 'data-parsley-validate' => '', 'files' => true)) !!}--}}
                        @include('travellers-inn.post.partials.tips-form')
{{--                        {!! Form::close() !!}--}}
                        </form>
                    </div>
                </div>


                <div role="tabpanel" class="tab-pane" id="images">
                    <div class="form-group">
                        <form action="{{ route('posts.store')}}" id="image-create-form" role="form" method="POST" enctype="multipart/form-data">
{{--                        {!! Form::open(array('route' => 'posts.create', 'data-parsley-validate' => '', 'files' => true)) !!}--}}
                        @include('travellers-inn.post.partials.images-form')
{{--                        {!! Form::close() !!}--}}
                        </form>

                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="videos">
                    <div class="form-group">
{{--                        {!! Form::open(array('route' => 'posts.create', 'data-parsley-validate' => '', 'files' => true)) !!}--}}
                        <form action="{{ route('posts.store')}}" id="video-create-form" role="form" method="POST" enctype="multipart/form-data">
                        @include('travellers-inn.post.partials.videos-form')
{{--                        {!! Form::close() !!}--}}
                        </form>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="ebook">
                    <div class="form-group">
                        <form action="{{ route('posts.store')}}" id="ebook-create-form" role="form" method="POST" enctype="multipart/form-data">
{{--                        {!! Form::open(array('route' => 'posts.create', 'data-parsley-validate' => '', 'files' => true)) !!}--}}
                        @include('travellers-inn.post.partials.ebook-form')
                        {{--{!! Form::close() !!}--}}
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>