{{csrf_field()}}
<div class="form-group">
    <label for="post_title">Title:</label>
    <input type="text" name="post_title" class="form-control" id="post_title" minlength="5" maxlength="255" data-parsley-errors-container="#title-error" required>
    <p id="title-error" style="color: #B94A48; margin-top: 10px"></p>
</div>

<div class="form-group">
    <label for="post_description">Description:</label>
    <textarea name="post_description" class="form-control" id="post_description" data-parsley-errors-container="#description-error"></textarea>
    <p id="description-error" style="color: #B94A48; margin-top: 10px"></p>
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

<div class="tips">
    <div class="form-group col-md-6 tips">
        <label for="select-country-tip" class="panel-heading tips-align">Country:</label>
        <select class="form-control select-plugin" id="select-country-tip" name="country_id" data-parsley-errors-container="#country-error" required>
            <option disabled selected value>- Select your Country -</option>
                @foreach($CountriesArray as $value => $country )
                    <option value="{{$value}}">{{ $country }}</option>
                @endforeach
        </select>
        <p id="country-error" style="color: #B94A48; margin-top: 10px"></p>
    </div>

    <input class="form-control search-input" data-url="{{ url('categories/state/list') }}" name="input-name" type="hidden" id="get-state-url">

    <div class="form-group col-md-6 state">
        <label for="select-state-tip" class="panel-heading tips-align">State</label>
        <select class="form-control select-plugin select-state-tip" id="select-state-tip" name="state_id" data-parsley-errors-container="#state-error" required>
            <option disabled selected value>- Select your State -</option>
        </select>
        <p id="state-error" style="color: #B94A48; margin-top: 10px"></p>
    </div>
</div>

<input type="hidden" value="tip" name="title">


<div class="form-group">
    @include('travellers-inn.post.partials._hash-tags')
</div>

<div class="" >
    <label class="control-label">Select File</label>
    <input name="post_upload[]" type="file"   class="image-upload" multiple data-parsley-max-file-size="1000" data-parsley-errors-container="#file-error">
    <p id="file-error" style="color: #B94A48; margin-bottom: 10px"></p>
</div>

<button class="btn buttonCustomPrimary btn-block" type="submit" name="submit">Create Post</button>
