@extends('layouts.app')

@section('content')



<div class="container">
  @if(count($orders)>0)
    <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Restaurant Name</th>
        <th>Total Price</th>
        <th>Ordered at</th>
        @if (Auth::user()->id == 1)
          <th>Options</th>
        @endif
        
        
        
      </tr>
    </thead>
    <tbody>

    @foreach($orders as $order)
      <tr>
        
       
        
        <td>{{$order['restaurant_name']}}</td>
        <td>{{$order['total_price']}} EGP</td>
        <td>{{$order['created_at']}}</td>

        @if (Auth::user()->id == 1)
          <td>
              <a class="btn btn-success" href="{{action('OrderController@done',$order['id'])}}">
                <i class="fa fa-check-circle"></i> Ready</a>
              <a class="btn btn-warning" href="{{action('OrderController@show',$order['id'])}}">
                <i class="fa fa-list"></i> Order Details</a>
          </td>
        @endif
        
       
      </tr>
      @endforeach
    </tbody>
  </table>
@else
  <h1> No Current Orders </h1>
@endif
</div>
@endsection