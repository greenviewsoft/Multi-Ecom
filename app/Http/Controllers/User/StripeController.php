<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){

        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }
        

\Stripe\Stripe::setApiKey('sk_test_51MFvcaJbxLGhffnrOLatYlxR098g4RR666wckI69QtVQx6ai0dxD6pvfQmfQk3pyJ6fEh3yvfpEiTH947pIQj7M500ueOcQ1tC');

$token = $_POST['stripeToken'];

$charge = \Stripe\Charge::create([
  'amount' => $total_amount*100,
  'currency' => 'usd',
  'description' => 'Green Shop',
  'source' => $token,
  'metadata' => ['order_id' => unique()],
]);

// dd($charge);


$order_id = Order::insertGetId([
            'user_id' => Auth::id();
             'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adress' => $request->address,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => $charge->payment_method,
            'payment_method ' => 'Stripe',
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,

            'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'), 
            'status' => 'pending',
            'created_at' => Carbon::now(),  


        ]);

    } // End Method added
}
