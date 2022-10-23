<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class VendorController extends Controller
{

    public function vendorDashBoard()
    {
        return view('vendor.index');

    } //end method

    public function VendorLogin()
    {
        return view('vendor.vendor_login');
    } // end method

    public function VendorDestroy(Request $request)
    {Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    } // end method

    public function VendorProfile()
    {
        $id = Auth::user()->id;
        $vendorData = User::find($id);
        return view('vendor.vendor_profile_view', compact('vendorData'));

    } // end method

    public function VendorProfileStore(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->vendor_join = $request->vendor_join;
        $data->vendor_short_info = $request->vendor_short_info;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/vendor_images/' . $data->photo));
            $filename = date("d-m-Y-Hi") . $file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(

            'message' => 'vendor  Profile Successfully uploaded',

            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    } // end method

    public function VendorChangePassword()
    {
        return view('vendor.vendor_change_password');
    } // end mathod


    public function VendorUpdatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),

        ]);
        return back()->with("status", " Password Changed Successfully");

    } // End Mathod



}
