<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vendor;

class ActiveUserController extends Controller
{
   public function AllUser()
   {
      

 $AllUser = User::where('role','user')->latest()->get();

 return view('backend.user.user_all_data',compact('AllUser'));

   }// End Method




}
