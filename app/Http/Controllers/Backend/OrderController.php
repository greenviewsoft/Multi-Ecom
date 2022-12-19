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




public function PendingOrder()
{
   

$order = Order::where('status','pending')->OrderBy('id', 'desc')->get();
return view('backEnd.orders.pending_orders',compact('order'));


} // end method


}
