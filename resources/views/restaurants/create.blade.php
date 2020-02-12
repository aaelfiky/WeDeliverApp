@extends('layouts.app')

@section('content')




<div class="container">
<h1>Add Restaurant</h1>
  <form method="post" action="{{action('RestaurantController@store')}}" enctype="multipart/form-data">
    <div class="form-group row">
      {{csrf_field()}}

      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Restaurant Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="name" name="name">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Hotline:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="hotline" name="hotline">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Cuisine:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Cuisine" name="cuisine">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Main Address:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Address" name="address">
      </div>
    </div>

    
      <label>Select image to upload:</label>
      
      <input type="file" name="image_file" id="file">
      @if ($errors->has('image'))
          <span class="help-block">
              <strong>{{ $errors->first('image') }}</strong>
          </span>
      @endif
   
    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-primary">
    </div>
  </form>
</div>

@stop