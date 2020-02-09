@extends('layouts.app')
@section('content')
  <div class="container">
  
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Restaurant</th>
        <th>Hotline</th>
        <th>Cuisine</th>
        <th>Address</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>

      @foreach($restaurants as $rest)
      <tr>
        <td>{{$rest['id']}}</td>
        <td><a href="{{action('RestaurantController@show',$rest['id'])}}">{{$rest['name']}}</a></td>
        
        <td>{{$rest['hotline']}}</td>
        <td>{{$rest['cuisine']}}</td>
        <td>{{$rest['address']}}</td>
        <td><a href="{{action('RestaurantController@delete',$rest['id'])}}">Remove</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <button type="button" class="btn btn-primary" onclick="window.location='{{ url("restaurant/create") }}'">Add Restaurant</button>

  </div>
@endsection