<?php

// namespace WeDeliver\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;


class RestaurantController extends Controller
{
    //
    public function index(){
        $restaurants = Restaurant::all()->toArray();
        return view('restaurants.index')->with('restaurants',$restaurants);
    }

    public function create()
    {
        return view('restaurants.create');
    }

    public function store(Request $request)
    {
        $restaurant = new Restaurant([
            'name' => $request->get('name'),
            'hotline' => $request->get('hotline'),
            'cuisine' => $request->get('cuisine'),
            'address' => $request->get('address'),
            'imageUrl' => $request->file('select_file')
          ]);
  
        $restaurant->save();
        return redirect('/restaurant/index');
    }

    public function show($id){
        $restaurant = Restaurant::find($id);
        $items = $restaurant->menuItems;   
        return view('restaurants.show')->with('restaurant', $restaurant)->with('items', $items);
    }


    public function delete($id){
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return redirect()->back();redirect(Request::url());
    }


    // public function order($id){
    //     $restaurant = Restaurant::find($id);
    //     $items = $restaurant->menuItems;   
    //     return view('restaurants.order')->with('restaurant', $restaurant)->with('items', $items);
    // }


    // public function addItem($id){
    //     // $restaurant = Restaurant::find($id);
    //     // return view('restaurants.addItem',$restaurant);
    //     return view('menuItems.addItem')->with('restaurant',$restaurant);
    // }

}
