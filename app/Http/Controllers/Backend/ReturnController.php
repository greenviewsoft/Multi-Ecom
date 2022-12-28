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

 public function ReturnRequestApproved($order_id)
 {

 Order::where('id',$order_id)->update(['return_order' => 2]);

 $notification = array(
    'message' => 'Return Order Successfully',
    'alert-type' => 'success'
);

return redirect()->back()->with($notification);

 } // End Method


 public function ReturnRequestComplete()
 {
    $order  = Order::where('return_order', 2)->orderBy('id', 'desc')->get();

    return view('backend.return_order.return_request_complete',compact('order'));
 }


}
