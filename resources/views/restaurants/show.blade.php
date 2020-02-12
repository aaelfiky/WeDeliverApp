@extends('layouts.app')
@section('content')

<div class="container">
    
    
    

    <div class="row">

        @if (is_null($restaurant->imageUrl))

            <img class="avatar" style="transform:scale(0.2);margin:-18%;
            border-radius:150px;border: 1px solid grey;" src="{{ asset('img/avatar.png') }}">

        @else

            <img style='width: 12%; height:145px; border-radius:80%;
            border: 2px solid white; margin:1%; box-shadow: 5px 5px 5px #888888;' 
            src="{{ asset('uploads/' . $restaurant->imageUrl) }}">

        @endif
        
        <div class="row">
            <div class="col-sm-3"><h1 style="margin:0">{{$restaurant['name']}}</h1></div>
            @if (Auth::user()->id == 1)
                <div class="col-sm-2"> <a href="{{action('RestaurantController@edit', $restaurant['id'])}}" class="btn btn-warning">Edit</a></div>
            @endif
        </div>
       

        
        <div class="row">
            <div class="col-sm-3"><h3><i class="fa fa-cutlery"></i> &nbsp;{{$restaurant['cuisine']}}</h3></div>
            <div class="col-sm-2"><h3><i class="fa fa-phone"></i> &nbsp;{{$restaurant['hotline']}}</h3></div>
        </div>  
        
        
    </div>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Desription</th>

                @if (Auth::user()->id == 1)
                    <th>Options</th>
                @endif
            </tr>
            </thead>
        <tbody>

            @foreach($items as $item)
            <tr>
                <td>{{$item['name']}}</td>
                <td>{{$item['price']}} L.E.</td>
                <td>{{$item['category']}}</td>
                <td>{{$item['description']}}</td>
                @if (Auth::user()->id == 1)
                    <td>
                        <a class="btn btn-danger" href="{{action('MenuItemController@delete',$item['id'])}}"><i class="fa fa-trash"></i> Remove</a>
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    @if (Auth::user()->id == 1)
        <a class="btn btn-primary" style="text-decoration:none;" href="{{action('MenuItemController@view',$restaurant['id'])}}"> <i class="fa fa-plus"></i> &nbsp;Add Menu Item  </a>
    @endif

    
    
    <a class="btn btn-success"  href="{{action('UserController@order',$restaurant['id'])}}"><i class="fa fa-shopping-cart"></i> &nbsp;Place an Order</a>

</div>
<br>


@endsection