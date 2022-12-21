<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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
      return view('frontend.userdashboard.user_order_page');
}

}
