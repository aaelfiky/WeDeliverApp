<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function start($id){
        return view('/order/add');
    }
}
