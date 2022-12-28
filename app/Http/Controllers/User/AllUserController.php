<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AllUserController extends Controller
{


public function UserAccountPage()
{
     $id = FacadesAuth::user()->id;
        $userData = User::find($id);
        return view('frontend.userdashboard.account_details',compact('userData'));
} // End Method



public function UserChangePassword()
{

   return view('frontend.userdashboard.user_change_password');
} //End Method



public function UserOrderPage()
{
    $id = FacadesAuth::user()->id;
    $orders = Order::where('user_id',$id)->orderBy('id','desc')->get();
      return view('frontend.userdashboard.user_order_page',compact('orders'));
}



public function UserOrderDetails($order_id)
{
   $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',FacadesAuth::user()->id)->first();
   $orderitem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

   return view('frontend.order.order_details',compact('order','orderitem'));
}// End Method




   public function UserOrderInvoice($order_id){
      $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',FacadesAuth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('frontend.order.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOption([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
   }


public function ReturnOrder(Request $request ,$order_id)
{

    Order::findOrFail($order_id)->update([

    'return_date' =>  Carbon::now()->format('d F Y'),
    'return_reason' => $request->return_reason,
    'return_order' => 1,

    ]);


    $notification = array(
        'message' => 'Return Request Send Successfully',
        'alert-type' => 'success',
    );

    return redirect()->route('user.order.page')->with($notification);




}// End Method



public function ReturnOrderPage(){

    $orders =  Order::where('user_id', FacadesAuth::user()->id)->where('return_order', '=', 1)->orderBy('id','desc')->get();
return view('frontend.order.return_order_view',compact('orders'));

} // End Method

}
