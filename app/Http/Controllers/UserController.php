<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Restaurant;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        return redirect('/user');
    }

    public function order($id){
        $user = Auth::user();
        $sum = $user->cart->sum('total_price');
        $cart = $user->cart;
        $restaurant = Restaurant::find($id);
        $items = $restaurant->menuItems;   
        return view('restaurants.order')->with('restaurant', $restaurant)->with('items', $items)->with('cart', $cart)->with('sum',$sum);

    }

    
}
