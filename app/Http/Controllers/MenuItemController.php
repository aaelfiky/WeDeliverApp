<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuItem;
use App\Restaurant;
use App\Http\Controllers\Redirect;

class MenuItemController extends Controller
{
    //
    public function view($id){
        $r = Restaurant::find($id);
        return view('menuItems.view',compact('r'));
    }

    public function store(Request $request){

        $id = $request->get('restaurant_id');
        $menuItem = new MenuItem([
            'name' => $request->get('name'),
            'restaurant_id' => $request->get('restaurant_id'),
            'price' => $request->get('price'),
            'category' => $request->get('category')
          ]);
  
        $view = '/restaurant/'.$id;
        $menuItem->save();
        return redirect($view);
    }


    public function delete($id)
    {
        $item = MenuItem::find($id);
        $item->delete();
        return redirect()->back();redirect(Request::url());


    }

}
