<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{


  public function ReturnRequest(){
    $order  = Order::where('return_order', 1)->orderBy('id', 'desc')->get();

    return view('backend.return_order.return_request',compact('order'));

 } // End Method



}
