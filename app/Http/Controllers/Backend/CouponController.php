<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller{
        public function AllCoupon(){
            $coupons = Coupon::latest()->get();
            return view('backend.coupon.coupon_all',compact('coupons'));
        }
}
