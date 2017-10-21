{{csrf_field()}}
<div class="form-group">
    <label for="post_title">Video Title:</label>
    <input type="text" name="post_title" class="form-control" id="post_title" minlength="5" maxlength="255" data-parsley-errors-container="#video-title-error" required>
    <p id="video-title-error" style="color: #B94A48; margin-top: 10px"></p>
</div>

<div class="form-group">
    <label for="post_description">Description:</label>
    <textarea name="post_description" class="form-control" id="post_description" data-parsley-errors-container="#video-description-error" minlength="20" maxlength="25000"></textarea>
    <p id="video-description-error" style="color: #B94A48; margin-top: 10px"></p>
</div>

<div class="form-group">
    <label for="select-dairy" class="panel-heading tips-align" style="display: block">Dairy :</label>
    <select class="form-control select-plugin" id="select-dairy" name="diary_id" data-parsley-errors-container="#diary-error" style="width:100%">
        <option disabled selected value>- Select your Dairy -</option>
        @foreach($diariesArray as $value => $diary )
            <option value="{{$value}}">{{ $diary }}</option>
        @endforeach
    </select>
    <p id="diary-error" style="color: #B94A48; margin-top: 10px"></p>
</div>

<div class="form-group">
    <label for="post_upload">Video Link:</label>
    <input type="url" name="post_upload" class="form-control" id="post_upload" data-parsley-errors-container="#video-url-error" required>
    <p id="video-url-error" style="color: #B94A48; margin-top: 10px"></p>
</div>

<input type="hidden" value="video" name="title">

<div class="col-md-12 tips">
    <div class="form-group col-md-6 tips">
        <label class="panel-heading tips-align post-images">Country</label>
        <select class="form-control select-plugin" id="select-country-video" name="country_id" data-parsley-errors-container="#video-country-error" required style="width:100%">
            <option disabled selected value>- Select your Country -</option>
            @foreach($CountriesArray as $value => $country )
                <option value="{{$value}}">{{ $country }}</option>
            @endforeach
        </select>
        <p id="video-country-error" style="color: #B94A48; margin-top: 10px"></p>
    </div>

    <input class="form-control search-input" data-url="{{ url('categories/state/list') }}" name="input-name" type="hidden" id="get-state-url">

    <div class="form-group col-md-6 state">
        <label class="panel-heading tips-align post-images">State</label>
        <select class="form-control select-plugin select-state-tip" id="select-state-video" name="state_id" data-parsley-errors-container="#video-state-error" required style="width:100%">
            <option disabled selected value>- Select your State -</option>
        </select>
    </div>
    <p id="video-state-error" style="color: #B94A48; margin-top: 10px"></p>
</div>


<div class="form-group">
    @include('travellers-inn.post.partials._hash-tags')
</div>


<button class="btn buttonCustomPrimary btn-block" type="submit" name="submit">Create Post</button>
