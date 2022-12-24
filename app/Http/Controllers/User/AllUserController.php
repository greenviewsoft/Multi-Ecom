<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AllUserController extends Controller
{
    

public function UserAccountPage()
{
     $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.userdashboard.account_details',compact('userData'));
} // End Method



public function UserChangePassword()
{
   
   return view('frontend.userdashboard.user_change_password');
} //End Method



public function UserOrderPage()
{
    $id = Auth::user()->id;
    $orders = Order::where('user_id',$id)->orderBy('id','desc')->get();
      return view('frontend.userdashboard.user_order_page',compact('orders'));
}



public function UserOrderDetails($order_id)
{
   $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::user()->id)->first();
   $orderitem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

   return view('frontend.order.order_details',compact('order','orderitem'));
}// End Method




   public function UserOrderInvoice($order_id){
      $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('frontend.order.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOption([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
   }




}
