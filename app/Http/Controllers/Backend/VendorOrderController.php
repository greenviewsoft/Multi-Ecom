<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class VendorOrderController extends Controller
{



public function VendorOrder()
{

        $id = FacadesAuth::user()->id;
        $orderitem = OrderItem::with('order')->where('vendor_id',$id)->orderBy('id','DESC')->get();
        return view('vendor.orders.pending_orders',compact('orderitem'));
    } // End Method



    public function VendorOrderReturn()
    {
        $id = FacadesAuth::user()->id;
        $orderitem = OrderItem::with('order')->where('vendor_id',$id)->orderBy('id','DESC')->get();
        return view('vendor.orders.return_orders',compact('orderitem'));
    } // End Method


}
