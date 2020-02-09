@extends('layouts.app')
@section('content')

<div class="container">
    
    
    

    <div class="row">
        <img class="avatar" style="transform:scale(0.2);margin:-18%;border-radius:150px;border: 1px solid grey;" src="{{ asset('img/avatar.png') }}">
        <h1>{{$restaurant['name']}}</h1>  
        
        <div class="row">
            <div class="col-sm-2"><h3>{{$restaurant['cuisine']}}</h3></div>
            <div class="col-sm-4"><h3>{{$restaurant['hotline']}}</h3></div>
        </div>  
        
        
    </div>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Options</th>
            </tr>
            </thead>
        <tbody>

            @foreach($items as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['price']}}</td>
                <td>{{$item['category']}}</td>
                <td>
                    <a href="{{action('CartController@add',$item['id'])}}">Add to Order</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    @foreach($cart as $c)
        <h4>{{$c['item_name']}} -&gt; Price:{{$c['total_price']}} &nbsp; <a style="cursor:pointer;text-decoration:none;" href="{{action('CartController@remove',$c['id'])}}"><b>X</b></a></h4>


    @endforeach
    <h4>Total Price: {{$sum}} EGP</h4>
    
</div>


@endsection