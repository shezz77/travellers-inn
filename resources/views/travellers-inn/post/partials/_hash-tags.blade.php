<label class="panel-heading tips-align post-images">Hash Tags</label>
<select class="form-control select2-multi" name="tags[]" multiple="multiple" data-parsley-errors-container="#hashTag-error" required style="width:100%">
    @foreach($hashTags as $hashTag)
        <option value='{{ $hashTag->name }}'>{{ $hashTag->name }}</option>
    @endforeach
</select>
<p id="hashTag-error" style="color: #B94A48; margin-top: 10px"></p>