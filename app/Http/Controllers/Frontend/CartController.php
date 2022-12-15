<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

        $product   = Product::findOrFail($id);

        if ($product->discount_price == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);


            }//if end

            else{
                Cart::add([

                    'id' => $id,
                    'name' => $request->product_name,
                    'qty' => $request->quantity,
                    'price' => $product->discount_price,
                    'weight' => 1,
                    'options' => [
                        'image' => $product->product_thambnail,
                        'color' => $request->color,
                        'size' => $request->size,
                    ],
                ]);

       return response()->json(['success' => 'Successfully Added on Your Cart' ]);

            }

    }// End Method






    public function AddMiniCart(){

        $cartQty = Cart::count();
        $cartTotal = Cart::total();

            $carts = Cart::content();
            return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal

        ));
    }// End Method




    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);

    }// End Method



    public function AddToCartDetails(Request $request, $id){

        $product   = Product::findOrFail($id);

        if ($product->discount_price == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);


            }//if end

            else{
                Cart::add([

                    'id' => $id,
                    'name' => $request->product_name,
                    'qty' => $request->quantity,
                    'price' => $product->discount_price,
                    'weight' => 1,
                    'options' => [
                        'image' => $product->product_thambnail,
                        'color' => $request->color,
                        'size' => $request->size,
                    ],
                ]);

       return response()->json(['success' => 'Successfully Added on Your Cart' ]);

            }

    }// End Method

    public function MyCart(){
        return view('frontend.mycart.view_mycart');
    } # End Method

    public function GetCartProduct(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal

        ));

    }// End Method
    public function CartRemove($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Cart']);

    }// End Method


    public function CartDecrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty -1);

        return response()->json('Decrement');

    }// End Method


    public function CartIncrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty +1);

        return response()->json('increment');

    }// End Method


    public function ApplyCoupon(Request $request)
    {
    
$coupons = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

if ($coupons ) {
   Session::put('coupon',[
    'coupon_name' => $coupons->coupon_name,
    'coupon_discount' => $coupons->coupon_discount,
    'discount_amount'   => round(Cart::total() * $coupons->coupon_discount/100),
    'total_amount' => round(Cart::total() - Cart::total() * $coupons->coupon_discount/100),


   ]);

   return response()->json(array(
    'validity' => true,
    'success' => 'Coupon Apply Successfully'

   ));

} else{
  return response()->json(['error' => 'Invalid coupon']);

}

    } //End Method

    

    public function CouponCalculation()
    {
         if (Session::has('coupon')) {

            return response()->json(array(
             'subtotal' => Cart::total(),
             'coupon_name' => session()->get('coupon')['coupon_name'],
             'coupon_discount' => session()->get('coupon')['coupon_discount'],
             'discount_amount' => session()->get('coupon')['discount_amount'],
             'total_amount' => session()->get('coupon')['total_amount'], 
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));
        } 
    }// End Method

}
