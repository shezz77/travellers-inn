@extends('travellers-inn/layouts/frontend-main')
@section('slider')
@endsection
@section('page-title-div-text', 'Edit Post')
@section('plugin-stylesheet')
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/banner.css') }}" rel="stylesheet">
@endsection
@section('title', 'Edit Post - ')
@include('travellers-inn.includes.frontend._page-title')
@section('content')


    <div class="container">
        <div class="border">
            <div class="col-md-8 col-md-offset-2 show well">
                <div class="form-group">
                    <form action="{{ route('posts.update', $post->id) }}" id="edit-form" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="post_title">Title:</label>
                            <input type="text" name="post_title" class="form-control" value="{{ $post ? $post->post_title : '' }}" id="post_title" minlength="5" maxlength="100" required>
                        </div>

                        <div class="form-group">
                            <label for="post_description">Description:</label>
                            {{--<textarea id="editor1 post_description" class="textarea form-control" name="post_description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $post ? $post->post_description : '' }}</textarea>--}}
                            <textarea name="post_description" class="form-control" id="post_description">{{ $post ? $post->post_description : '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="select-dairy" class="panel-heading tips-align">Dairy :</label>
                            <select class="form-control select-plugin" id="select-dairy" name="diary_id" data-parsley-errors-container="#diary-error">
                                <option disabled selected value>{{$diaryName}}</option>
                                @foreach($diariesArray as $value => $diary )
                                    <option value="{{$value}}">{{ $diary }}</option>
                                @endforeach
                            </select>
                            <p id="diary-error" style="color: #B94A48; margin-top: 10px"></p>
                        </div>

                        <div class="col-md-12 tips">
                            <div class="form-group col-md-6 tips">
                                <label for="select-country-tip" class="panel-heading tips-align">Country</label>
                                <select class="form-control select-plugin" id="select-country-tip" name="country_id">
                                    <option disabled selected value>{{$countryName}}</option>

                                    @foreach($CountriesArray as $value => $country )
                                        <option value="{{$value}}">{{ $country }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <input class="form-control search-input" data-url="{{ url('categories/state/list') }}" name="input-name" type="hidden" id="get-state-url">

                            <div class="form-group col-md-6 state">
                                <label for="select-state-tip" class="panel-heading tips-align">State</label>
                                <select class="form-control select-plugin select-state-tip" id="select-state-tip" name="state_id">
                                    <option disabled selected value>{{$stateName}}</option>
                                </select>
                            </div>
                        </div>
                        @if($post->contant_id == 4)
                            <div class="form-group">
                                <label for="post_upload">Video Link:</label>
                                <input type="url" name="post_upload" class="form-control" value="{{ $urlLink}}" id="post_upload" data-parsley-errors-container="#video-url-error">
                                <p id="video-url-error" style="color: #B94A48; margin-top: 10px"></p>
                            </div>
                        @elseif($post->contant_id == 6)
                            <div class="form-group">
                                <label for="ebook_title">Ebook Title:</label>
                                <input type="text" name="ebook_title" class="form-control" id="ebook_title" value="{{ $post ? $post->ebook_title : '' }}" data-parsley-errors-container="#ebook-error"  minlength="5" maxlength="255" required>
                                <p id="ebook-error" style="color: #B94A48; margin-top: 10px"></p>
                            </div>

                            <div class="form-group">
                                <label for="ebook_link">Ebook URL:</label>
                                <input type="url" name="ebook_link" class="form-control" id="ebook_link" value="{{ $post ? $post->ebook_link : '' }}" data-parsley-errors-container="#ebook-url-error" required>
                                <p id="ebook-url-error" style="color: #B94A48; margin-top: 10px"></p>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="panel-heading tips-align post-images">Hash Tags</label>
                            <select class="form-control select2-multi" name="tags[]" multiple="multiple" required style="width:100%">

                                @foreach($postHashTags as $postHashTag)
                                    <option selected value="{{ $postHashTag->name }}"> {{ $postHashTag->name }}</option>
                                @endforeach

                                @foreach($hashTags as $hashTag)
                                    <option value='{{ $hashTag->name }}'>{{ $hashTag->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        @if($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6)
                            <div class="form-group" >
                                <label class="control-label">Select File</label>
                                <input name="post_upload[]" type="file" class="image-upload" multiple data-parsley-max-file-size="1000" data-parsley-errors-container="#error">
                                <p id="error" style="color: #B94A48; margin-bottom: 10px"></p>
                            </div>
                        @endif
                        <div class="col-md-6">
                            {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn buttonCustomPrimary btn-block">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('plugin-script')
    <script src="{{ asset('assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js') }}"></script>
    <script src="{{ asset('js/home/custom.js') }}" type="text/javascript"></script>
@endsection
@section('script')
    <script src="{{ asset('js/fileinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/post/post.js') }}" type="text/javascript"></script>
    <script src="{{ asset('tinymce/tinymce.dev.js') }}" type="text/javascript"></script>
    <script>tinymce.init({ selector:'textarea' });</script>


    <script>
        $('#edit-form').parsley();
        $('.select2-multi').select2();
        $('.select-plugin').select2();
        $('.image-upload').fileinput({'showUpload':false, 'previewFileType':'any'});
    </script>
@endsection