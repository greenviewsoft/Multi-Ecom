<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Auth;

class OrderController extends Controller
{




public function PendingOrder(){   

$order = Order::where('status','pending')->OrderBy('id', 'desc')->get();
return view('backend.orders.pending_orders',compact('order'));


} // end method



public function AdminOrderDetails($order_id){
	$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
   $orderitem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

   return view('backend.orders.admin_order_details',compact('order','orderitem'));
}// End Method




public function AdminConfirmOrder(){

$order = Order::where('status','confirmed')->OrderBy('id', 'desc')->get();
return view('backend.orders.confirmed_orders',compact('order'));

} // end method



public function AdminProcessingOrder(){

$order = Order::where('status','processing') ->OrderBy('id', 'desc')->get();
return view('backend.orders.processing_orders',compact('order'));

} // end method


public function AdminDeliverdOrder(){

$order = Order::where('status','delivered') ->OrderBy('id', 'desc')->get();
return view('backend.orders.deliverd_orders',compact('order'));

} // end method



}
