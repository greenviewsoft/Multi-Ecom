<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use App\Models\ShipState;

class ShippingAreaController extends Controller{
   
     public function AllDivision(){
        $division = ShipDivision::latest()->get();
        return view('backend.ship.divison.division_all',compact('division'));
    } // End Method 


    public function AddDivision()
    {
     return view('backend.ship.divison.division_add');
    }

     public function StoreDivision(Request $request){

              ShipDivision::insert([
                'division_name' => $request->division_name,
                'created_at' => Carbon::now(),

              ]);

              $notification = array(
                'message' => 'Division Added Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.division')->with($notification);


            }// End Method



            public function EditDivision($id)
            {
                $division = ShipDivision::findOrFail($id);
             return view('backend.ship.divison.division_edit',compact('division'));

            } // End Method


            public function UpdateDivision(Request $request)
            {
                 $division_id = $request->id;
               ShipDivision::findOrFail($division_id)->update([
                'division_name' => $request->division_name,
                'updated_at' => Carbon::now(),

              ]);

              $notification = array(
                'message' => 'Division Update Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.division')->with($notification);
            }// End Method
            


public function DeleteDivision($id)
{
   ShipDivision::findOrFail($id)->delete();
   return redirect()->back();
            }// End Method





/////////// District Crud //////////////

  public function AllDistrict(){
        $district = ShipDistricts::latest()->get();
        return view('backend.ship.district.district_all',compact('district'));
    } // End Method 




    public function AddDistrict()
    {
      $division =  ShipDivision::orderBy('division_name','ASC')->get();
     return view('backend.ship.district.district_add',compact('division'));
    }





public function StoreDistrict(Request $request)
{

ShipDistricts::insert([
'division_id' => $request->division_id,
'district_name' => $request->district_name,
'created_at' => Carbon::now(),

]);

$notification = array(
'message'  => 'Ship Districts Inserted Successfully',
'alert-type' => 'success'
);

return redirect()->route('all.district')->with($notification);
  
} //End Method



  public function EditDistrict($id)
            {
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistricts::findOrFail($id);
        return view('backend.ship.district.district_edit',compact('district','division'));

    }   // End Method 

         

public function UpdateDistrict(Request $request)
{
   
$division_id = $request->id;

ShipDistricts::findOrFail($division_id)->update([

'division_id' => $request->division_id,
'district_name' => $request->district_name,
'updated_at' => Carbon::now(),

]);

  $notification = array(
            'message' => 'ShipDistricts Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.district')->with($notification); 


}




public function DeleteDistrict($id)
{
   ShipDistricts::findOrFail($id)->delete();
   return redirect()->back();
            }// End Method



}