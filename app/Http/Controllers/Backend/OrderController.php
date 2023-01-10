<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use DB;
use Carbon\Carbon;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{




public function PendingOrder(){   

$order = Order::where('status','pending')->OrderBy('id', 'desc')->get();
return view('backend.orders.pending_orders',compact('order'));


} // end method



public function AdminOrderDetails($order_id){
	$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
   return view('backend.orders.admin_order_details',compact('order','orderItem'));
}// End Method




public function AdminConfirmOrder(){

$order = Order::where('status','confirm')->OrderBy('id', 'desc')->get();
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


public function PendingToConfirmOrder($order_id){
 Order::findOrFail($order_id)->update(['status' => 'confirm']);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );
    return redirect()->route('admin.confirm.order')->with($notification);


} // End method





public function ConfirmToProcessing($order_id){
 Order::findOrFail($order_id)->update(['status' => 'processing']);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );
    return redirect()->route('admin.processing.order')->with($notification);


} // End method


public function ProcessingToDelivery($order_id){
    $product = OrderItem::where('order_id',$order_id)->get();
foreach($product as $item){
        Product::where('id',$item->product_id)
                ->update(['product_qty' => DB::raw('product_qty-'.$item->qty) ]);
    } 
 Order::findOrFail($order_id)->update(['status' => 'delivered']);

        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );
    return redirect()->route('admin.deliverd.order')->with($notification);


} // End method



    public function AdminInvoiceDownload($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('backend.orders.admin_order_invoice', compact('order','orderItem'))->setPaper('a4')->setOption([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }




}
