{{csrf_field()}}
<div class="form-group">
    <label for="post_title">Title:</label>
    <input type="text" name="post_title" class="form-control" id="post_title" minlength="5" maxlength="255" data-parsley-errors-container="#ebook-title-error" required>
    <p id="ebook-title-error" style="color: #B94A48; margin-top: 10px"></p>
</div>

<div class="form-group">
    <label for="post_description">Description:</label>
    <textarea name="post_description" class="form-control" id="post_description" data-parsley-errors-container="#ebook-description-error" minlength="20" maxlength="25000"></textarea>
    <p id="ebook-description-error" style="color: #B94A48; margin-top: 10px"></p>
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

<div class="col-md-12 tips">
    <div class="form-group col-md-6 tips">
        <label for="select-country-ebook" class="panel-heading tips-align post-images">Country</label>
        <select class="form-control select-plugin" id="select-country-ebook" name="country_id" data-parsley-errors-container="#ebook-country-error"  required style="width:100%">
            <option disabled selected value>- Select your Country -</option>

            @foreach($CountriesArray as $value => $country )
                <option value="{{$value}}">{{ $country }}</option>
            @endforeach
        </select>
        <p id="ebook-country-error" style="color: #B94A48; margin-top: 10px"></p>
    </div>

    <input class="form-control search-input" data-url="{{ url('categories/state/list') }}" name="input-name" type="hidden" id="get-state-url">

    <div class="form-group col-md-6 state">
        <label for="select-state-ebook" class="panel-heading tips-align post-images">State</label>
        <select class="form-control select-plugin select-state-tip" id="select-state-ebook" name="state_id" data-parsley-errors-container="#ebook-state-error" style="width:100%">
            <option disabled selected value>- Select your State -</option>
        </select>
        <p id="ebook-state-error" style="color: #B94A48; margin-top: 10px"></p>
    </div>
</div>


<div class="form-group">
    <label for="ebook_title">Ebook Title:</label>
    <input type="text" name="ebook_title" class="form-control" id="ebook_title" data-parsley-errors-container="#ebook-error"  minlength="5" maxlength="255" required>
    <p id="ebook-error" style="color: #B94A48; margin-top: 10px"></p>
</div>

<div class="form-group">
    <label for="ebook_link">Ebook URL:</label>
    <input type="url" name="ebook_link" class="form-control" id="ebook_link" data-parsley-errors-container="#ebook-url-error" required>
    <p id="ebook-url-error" style="color: #B94A48; margin-top: 10px"></p>
</div>

<input type="hidden" value="ebook" name="title">

<div class="form-group">
    @include('travellers-inn.post.partials._hash-tags')
</div>

<div class="" >
    <label class="control-label">Select File</label>
    <input name="post_upload[]" type="file"   class="image-upload" multiple data-parsley-max-file-size="1000" data-parsley-errors-container="#error">
    <p id="error" style="color: #B94A48; margin-bottom: 10px"></p>
</div>

<button class="btn buttonCustomPrimary btn-block" type="submit" name="submit">Create Post</button>
