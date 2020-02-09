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
                    <a href="{{action('MenuItemController@delete',$item['id'])}}">Remove</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    <a style="text-decoration:none;" href="{{action('MenuItemController@view',$restaurant['id'])}}">Add Menu Item  &nbsp;  &nbsp; </a>
    <a style="text-decoration:none;" href="{{action('UserController@order',$restaurant['id'])}}">Place an Order</a>

</div>


@endsection