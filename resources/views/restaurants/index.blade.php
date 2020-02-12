@extends('layouts.app')
@section('content')
  <div class="container">
  
    <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Restaurant</th>
        <th>Hotline</th>
        <th>Cuisine</th>
        <th>Address</th>
        @if (Auth::user()->id == 1)
          <th>Options</th>
        @endif
      </tr>
    </thead>
    <tbody>

      @foreach($restaurants as $rest)
      <tr>
        
        <td><a href="{{action('RestaurantController@show',$rest['id'])}}">{{$rest['name']}}</a></td>
        
        <td>{{$rest['hotline']}}</td>
        <td>{{$rest['cuisine']}}</td>
        <td>{{$rest['address']}}</td>
        @if (Auth::user()->id == 1)
          <td><a class="btn btn-danger" href="{{action('RestaurantController@delete',$rest['id'])}}">
                <i class="fa fa-trash"></i> Remove</a>
          </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  @if (Auth::user()->id == 1)
    <button type="button" class="btn btn-primary" onclick="window.location='{{ url("restaurant/create") }}'">Add Restaurant</button>
  @endif

  </div>
@endsection