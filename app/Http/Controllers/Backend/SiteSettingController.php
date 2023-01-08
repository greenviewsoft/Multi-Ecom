<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Intervention\Image\Facades\Image As Image;
class SiteSettingController extends Controller
{



    public function SiteSetting()
    {
      
   $SiteSetting = SiteSetting::find(1);
   return view('backend.setting.update_setting',compact('SiteSetting'));

    }// End Method 

    public function StoreSiteSetting(Request $request)
    {
        
     $site_id = $request->id;
      
        if ($request->file('logo')) {

        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(180,56)->save('upload/logo/'.$name_gen);
        $save_url = 'upload/logo/'.$name_gen;

       

        SiteSetting::findOrFail($site_id)->update([
            'support_phone' => $request->support_phone,
            'phone_one' => $request->phone_one,
            'email' => $request->email,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'copyright' => $request->copyright,
            'logo' => $save_url,
        ]);

       $notification = array(
            'message' => 'Site Setting Updated with image Successfully',
            'alert-type' => 'success'
        );

         return redirect()->back()->with($notification);

        } else {

             SiteSetting::findOrFail($site_id)->update([
            'support_phone' => $request->support_phone,
            'phone_one' => $request->phone_one,
            'email' => $request->email,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'copyright' => $request->copyright,
        ]);

       $notification = array(
            'message' => 'Site Setting  Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } // end else

    }// End Method


}
