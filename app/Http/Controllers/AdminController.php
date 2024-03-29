<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Order;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Notifications\VendorAproveNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function AdminDashBoard()
    {

    $date = Carbon::today();
    $sales = Order::wheredate('created_at',$date)->sum('amount');
   $weksales = Order::where('created_at', '>=', Carbon::now()->subDays(7))->get();
   $total = $weksales->sum('amount');



        return view('admin.index',compact('sales','total'));

    } // end method

    public function AdminLogin()
    {
        return view('admin.admin_login');
    } // end method

    public function AdminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // end method

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));

    } // end method

    public function AdminProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date("d-m-Y-Hi") . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(

            'message' => 'admin Profile Successfully uploaded',

            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    } // end method

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    } // end mathod

    public function AdminUpdatePassword(Request $request)
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



    public function VendorInactive()
    {
        $inActiveVendor = User::where('status','inactive')->where('role','vendor')->latest()->get();
        return view('backend.vendor.inactive_vendor',compact('inActiveVendor'));
    }// end method

    public function ActiveVendor(){
        $ActiveVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        return view('backend.vendor.active_vendor',compact('ActiveVendor'));

    }// End Method

    public function InactiveVendorDetails($id){

        $inactiveVendorDetails = User::findOrFail($id);
        return view('backend.vendor.inactive_vendor_details',compact('inactiveVendorDetails'));

    }// End Method

    public function ActiveVendorApprove(Request $request){

        $verdor_id = $request->id;
        $user = User::findOrFail($verdor_id)->update([
            'status' => 'active',
        ]);

        $notification = array(
            'message' => 'Vendor Active Successfully',
            'alert-type' => 'success'
        );
        $vuser = User::where('role','vendor')->get();
        Notification::send($vuser, new VendorAproveNotification($request));
        return redirect()->route('active.vendor')->with($notification);

    }// End Method



    public function ActiveVendorDetails($id){

        $activeVendorDetails = User::findOrFail($id);
        return view('backend.vendor.active_vendor_details',compact('activeVendorDetails'));

    }// End Method


     public function InActiveVendorApprove(Request $request){

        $verdor_id = $request->id;
        $user = User::findOrFail($verdor_id)->update([
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Vendor InActive Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('inactive.vendor')->with($notification);

    }// End Method



    ////// admin all methods ////////

    public function AllAdmin(){
 $alladmin_user = User::where('role', 'admin')->latest()->get();
 return view('backend.admin.all_admin', compact('alladmin_user'));

    }// End Method

public function AddAdmin(){
    $roles = Role::all();
return view('backend.admin.add_admin',compact('roles'));

}// End Method


public function AdminUserStore(Request $request){

    $user = new User();
    $user->username = $request->username;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->password = Hash::make($request->password);
    $user->role = 'admin';
    $user->status = 'active';
    $user->save();

    if ($request->roles) {
        $user->assignRole($request->roles);
    }

     $notification = array(
        'message' => 'New Admin User Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.admin')->with($notification);

    } // End Admin User Store

public function EditRolesAdmin($id){

    $user = User::findOrFail($id);
    $roles = Role::all();
    return view('backend.admin.edit_admin',compact('roles','user'));

}// End edit Admin


    public function UpdateRolesAdmin(Request $request, $id){

    $user =  User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->role = 'admin';
    $user->status = 'active';
    $user->save();

    $user->roles()->detach();
    if ($request->roles) {
        $user->assignRole($request->roles);
    }

     $notification = array(
        'message' => 'New Admin Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.admin')->with($notification);

    }// End method


    public function DeleteRolesAdmin($id){
        $user = User::findOrFail($id);
        if (!is_null($user)){
            $user->delete();
        }
        $notification = array(
            'message' => ' Admin user Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End method


}
