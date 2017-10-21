
{{--{{ Form::label('name', Slider Name:') }}--}}
{{--{{ Form::text('name', null, ['class' => 'form-control']) }}--}}
{{--{{ Form::label('description', 'Slider Description:') }}--}}
{{--{{ Form::text('description', null, ['class' => 'form-control']) }}--}}

@section('stylesheet')
    <link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection


<div class="form-group">
    <input type="text" name="name" class="form-control" id="field" placeholder="Slider Name" minlength="5" maxlength="55" required>
</div>
<div class="form-group">
    <input type="text" name="description" class="form-control" id="" placeholder="Slider Description" minlength="5" maxlength="120" required>
</div>

<div class="form-group radio_opt" style="display: -webkit-inline-box; display: -moz-inline-box; margin-bottom: 0; width: 200px; margin-left: 50px;">
    <label for="continent-button" id="continent-button" style="margin-top: 12px;">Continent Slider</label>
    <input type="radio" name="continent-button" class="form-control radio" id="continent-button" value="continent"  style=" width: 20px;
    margin: 5px 0 0 21px;" required>
</div>
<div class="form-group radio_opt" style="display: -webkit-inline-box; display: -moz-inline-box;">
    <label for="country-button" id="continent-button" style="margin-top: 12px;">Country Slider</label>
    <input type="radio" name="continent-button" class="form-control radio" id="country-button" value="country"  style=" width: 20px;
    margin: 5px 0 0 30px;" required>
</div>
{{ csrf_field() }}

<div class="form-group" >
    <select name="category_id" class="form-control" id="continent">
        <option disabled selected value>- Select your Continent -</option>
        @foreach($ContinentsArray as $value => $continent )
            <option value="{{$value}}">{{ $continent}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <select name="category_id" class="form-control" id="counts">
        <option disabled selected value>- Select your Country -</option>
        @foreach($CountriesArray as $value => $country )
            <option value="{{$value}}">{{ $country }}</option>
        @endforeach
    </select>
</div>