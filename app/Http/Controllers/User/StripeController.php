<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){
        

\Stripe\Stripe::setApiKey('sk_test_51MFvcaJbxLGhffnrOLatYlxR098g4RR666wckI69QtVQx6ai0dxD6pvfQmfQk3pyJ6fEh3yvfpEiTH947pIQj7M500ueOcQ1tC');

$token = $_POST['stripeToken'];

$charge = \Stripe\Charge::create([
  'amount' => 999*100,
  'currency' => 'usd',
  'description' => 'Green Shop',
  'source' => $token,
  'metadata' => ['order_id' => '6735'],
]);

dd($charge);

    } // End Method
}
