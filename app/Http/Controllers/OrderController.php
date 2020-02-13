<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Order;
use App\Restaurant;
use App\OrderItem;

class OrderController extends Controller
{
    //

    // public function start($id){
    //     return view('/order/add');
    // }
    public function index(){
        $user = Auth::user();
        
        if($user->id ==1){
            $orders = Order::all();
        }else{
            $orders = Order::where('user_id', $user->id)->get();
        }
        return view('orders.index')->with('orders', $orders);
    }


    public function place($r_id){
        $user = Auth::user();
        $restaurant = Restaurant::find($r_id);
        $sum = $user->cart->sum('total_price');
        $cart = $user->cart;
        $order = new Order([
            'user_id' => $user->id,
            'restaurant_id' => $r_id,
            'restaurant_name' => $restaurant->name,
            'total_price' => $sum*1.25
        ]);
        $order->save();
        foreach ($cart as $c) {
            $o_item = new OrderItem([
                'name' => $c->item_name,
                'order_id' => $order->id,
                'price' => $c->total_price
            ]);
            $o_item->save();
        }
        DB::table('carts')->where('user_id', $user->id)->delete();
        if($user->id ==1){
            $orders = Order::all();
        }else{
            $orders = Order::where('user_id', $user->id)->get();
        }
        return redirect('/order/index')->with('orders', $orders);
    }

    public function done($order_id){
        $order = Order::find($order_id);
        DB::table('order_items')->where('order_id', $order_id)->delete();
        $order->delete();
        return redirect()->back();redirect(Request::url());

    }

    public function show($order_id){
        $order = Order::find($order_id);
        $items = $order->orderItems;
        return view('orders.show')->with('items', $items);

    }
}
