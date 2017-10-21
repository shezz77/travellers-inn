<div class="col-xs-12">
    <div class="form-group">
        <input type="text" name="name" class="form-control" value="{{ $diary ? $diary->name : '' }}" placeholder="Name" minlength="5" maxlength="255" data-parsley-errors-container="#name-error" required>
    </div>
    <p id="name-error" style="color: #B94A48; margin-top: 10px; margin-bottom: 10px"></p>
</div>

<div class="col-xs-12">
    <div class="form-group">
        <input type="text" name="description" class="form-control" value="{{ $diary ? $diary->description : '' }}" placeholder="Description" minlength="5" maxlength="255" data-parsley-errors-container="#description-error" required>
    </div>
    <p id="description-error" style="color: #B94A48; margin-top: 10px; margin-bottom: 10px"></p>
</div>