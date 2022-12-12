<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Carbon;

class CouponController extends Controller{
        public function AllCoupon(){
            $coupons = Coupon::latest()->get();
            return view('backend.coupon.coupon_all',compact('coupons'));
        }

        public function AddCoupon(){



            return view('backend.coupon.coupon_add');

            }// End Method


            public function StoreCoupon(Request $request){

              Coupon::insert([
                'coupon_name' => strtoupper($request->coupon_name),
                'coupon_discount' => $request->coupon_discount,
                'coupon_validity' => $request->coupon_validity,
                'created_at' => Carbon::now(),

              ]);

              $notification = array(
                'message' => 'Coupon Added Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.coupon')->with($notification);


            }// End Method


            public function EditCoupon($id)
            {
              $coupons = Coupon::findOrFail($id);
              return view('backend.coupon.coupon_edit',compact('coupons'));

            }// End Method



            public function UpdateCoupon(Request $request)
            {
                 $coupons_id = $request->id;
               Coupon::findOrFail($coupons_id)->update([
                'coupon_name' => strtoupper($request->coupon_name),
                'coupon_discount' => $request->coupon_discount,
                'coupon_validity' => $request->coupon_validity,
                'updated_at' => Carbon::now(),

              ]);

              $notification = array(
                'message' => 'Coupon Update Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.coupon')->with($notification);
            }// End Method

            public function DeleteCoupon($id)
            {
              
     Coupon::findOrFail($id)->delete();
     return redirect()->back();

            }// End Method  

}
