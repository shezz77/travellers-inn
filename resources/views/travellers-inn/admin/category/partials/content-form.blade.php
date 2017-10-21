{{ csrf_field() }}
<div class="form-group">
    <label for="exampleInputEmail1">Select Parent Category</label>
    <select class="form-control select-plugin" id="select-country" name="parent_id">
        <option disabled selected value>- Select Category -</option>
        @foreach($contents as $content)
            <option value='{{ $content->id }}'>{{ $content->title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Category Title</label>
    <input type="text" class="form-control" id="" placeholder="Title" name="title" required>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Category Genre</label>
    <input type="text" class="form-control" id="" placeholder="Genre" name="genre" required>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Category Detail</label>
    <input type="text" class="form-control" id="" placeholder="Detail" name="detail" required>
</div>