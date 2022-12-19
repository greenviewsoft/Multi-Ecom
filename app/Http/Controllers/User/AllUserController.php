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


}
