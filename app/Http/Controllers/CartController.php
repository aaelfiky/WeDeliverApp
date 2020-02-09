<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderItem;
use App\Cart;
use App\MenuItem;
use Redirect;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add($item_id){
        
        $user_id = Auth::user()->id;
        // $user_id = $user->id;
        // $cart = $user->cart;
        $price = MenuItem::find($item_id)->price;
        $item_name = MenuItem::find($item_id)->name;
        $sum = Auth::user()->cart->sum('total_price');


        $cart_items = Cart::where('user_id', Auth::user()->id)->get();

        $user = Auth::user();
        
        $cart_item = new Cart([
            'user_id' => $user_id,
            'item_id' => $item_id,
            'item_name' => $item_name,
            'total_price' => $price
          ]);


  
        $cart_item->save();

        $cart = $user->cart;
        return Redirect::back()->with('cart',$cart)->with('sum',$sum);
        // return redirect()->back();redirect(Request::url());


    }

    public function remove($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();redirect(Request::url());
    }
}
