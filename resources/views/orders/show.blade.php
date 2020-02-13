@extends('layouts.app')

@section('content')
<div class="container">
    <h3><b>Deliverd to:</b> {{$user = $items[0]->order->user->name}}</h3>
    <h4><b>Address:</b> {{$user = $items[0]->order->user->address}}</h4>
    @foreach($items as $item)
        <div class="row">
            <div class="col-xs-4">
                <h5>  <strong>Item Name:</strong> {{$item['name']}}  </h5>
            </div>
            <div class="col-xs-4">
                <h5>  <strong>Price:</strong> {{$item['price']}} EGP  </h5>
            </div>
        </div>
        <hr>
    @endforeach

    <a class="btn btn-primary" href="{{ url('/order/index') }}">Back to Orders</a>
</div>

    

@endsection