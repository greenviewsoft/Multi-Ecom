<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class ActiveUserController extends Controller
{

    public function AllUser()
    {

        $users = User::where('role', 'user')->latest()->get();

        return view('backend.user.user_all_data', compact('users'));

    } // End Method 





    public function AllVendor()
    {

        $Allvendor = User::where('role', 'vendor')->latest()->get();

        return view('backend.user.vendor_all_data', compact('Allvendor'));

    } // End Method

}
