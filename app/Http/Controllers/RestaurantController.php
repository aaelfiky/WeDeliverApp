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

        $file = $request->file('image_file');
		$file->move('uploads', $file->getClientOriginalName()); 
        $name = $file->getClientOriginalName();
        $restaurant = new Restaurant([
            'name' => $request->get('name'),
            'hotline' => $request->get('hotline'),
            'cuisine' => $request->get('cuisine'),
            'address' => $request->get('address'),
            'imageUrl' => $name
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


    public function edit($id){
        $restaurant = Restaurant::find($id);
        return view('restaurants.edit')->with('restaurant', $restaurant)->with('id', $id);
    }


    public function update(Request $request,$id){

        if($request->file('image_file')){
            $file = $request->file('image_file');
            $file->move('uploads', $file->getClientOriginalName()); 
            $name = $file->getClientOriginalName();
        }
        $restaurant = Restaurant::find($id);
        // return view('restaurants.addItem',$restaurant);
        $restaurant->name = $request->get('name');
        $restaurant->hotline = $request->get('hotline');
        $restaurant->cuisine = $request->get('cuisine');
        if($request->file('image_file')){
            $restaurant->imageUrl = $name;
        }
        $restaurant->save();
        
        return redirect('/restaurant/index');
    }

}
