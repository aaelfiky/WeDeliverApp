@extends('layouts.app')
@section('content')

<div class="container">
    
    
    

    <div class="row">
    @if (is_null($restaurant->imageUrl))

        <img class="avatar" style="transform:scale(0.2);margin:-18%;
        border-radius:150px;border: 1px solid grey;" src="{{ asset('img/avatar.png') }}">

    @else

        <img style='width: 12%; height:145px; border-radius:80%;
        border: 2px solid white;  box-shadow: 5px 5px 5px #888888;' 
        src="{{ asset('uploads/' . $restaurant->imageUrl) }}">

    @endif
        <h1>{{$restaurant['name']}}</h1>  
        
        <div class="row">
            <div class="col-sm-2"><h3><i class="fa fa-cutlery"></i> {{$restaurant['cuisine']}}</h3></div>
            <div class="col-sm-4"><h3><i class="fa fa-phone"></i> {{$restaurant['hotline']}}</h3></div>
        </div>  
        
        
    </div>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
                <th>Options</th>
            </tr>
            </thead>
        <tbody>

            @foreach($items as $item)
            <tr>
               
                <td>{{$item['name']}}</td>
                <td>{{$item['price']}} L.E.</td>
                <td>{{$item['category']}}</td>
                <td>{{$item['description']}}</td>
                
                <td>
                    <a href="{{action('CartController@add',$item['id'])}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

@if(count($cart)>0)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h4><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</h4>
							</div>
							
						</div>
					</div>
				</div>
				<div class="panel-body">

                    @foreach($cart as $c)


                   
                        <div class="row">
                            <div class="col-xs-2"><img width="40%" height="40%" class="img-responsive" src="{{ asset('img/meal.png') }}">
                            </div>
                            <div class="col-xs-4">
                                <h4 class="product-name"><strong>{{$c['item_name']}}</strong></h4><h4><small>Product description</small></h4>
                            </div>
                            <div class="col-xs-6">
                                <div class="col-xs-8 text-right">
                                    <h6><strong>{{$c['total_price']}} <span class="text-muted">EGP</span></strong></h6>
                                </div>
                               
                                <div class="col-xs-2">
                                    <a href="{{action('CartController@remove',$c['id'])}}"  class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
					
                    <div class="row">
						<div class="text-center">
							<div class="col-xs-10">
								<h5 class="text-right">Subtotal: {{$sum}} EGP (before taxes 0.25%)</h5>
							</div>
							
						</div>
					</div>
					
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Total <strong>{{$sum * 1.25}} EGP</strong></h4>
						</div>
						<div class="col-xs-3">
						

                            <a href="{{action('OrderController@place',$restaurant['id'])}}" class="btn btn-success btn-block">
								Checkout
							</a>
                
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endif


@endsection