@extends('layouts.app')

@section('content')




<div class="container">
<h2>Add Menu Item for {{$r['name']}}</h2>

  <form method="post" action="{{action('MenuItemController@store')}}">
    <div class="form-group row">
      {{csrf_field()}}

      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="name" name="name">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Price:</label>
      <div class="col-sm-3">
        <input type="number" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Price" name="price">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Category:</label>
      
      <div class="col-sm-3">
        
        <select name="category" class="form-control">
          <option value="Sandwiches">Sandwiches</option>
          <option value="Main Dishes">Main Dishes</option>
          <option value="Appetizers">Appetizers</option>
          <option value="Drinks">Drinks</option>
          <option value="Desserts">Desserts</option>
        </select>
      </div>
    </div>
    
    <input type="hidden" class="form-control form-control-lg" 
    id="lgFormGroupInput" placeholder="Price" value ={{$r['id']}} name="restaurant_id">
    
    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-primary">
    </div>
  </form>
</div>

@stop