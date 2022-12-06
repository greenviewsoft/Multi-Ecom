<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{

public function Index()
{
    $skip_category_category_0 = Category::skip(3)->first();
    $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_category_0->id)->orderBy('id','DESC')->limit(5)->get();


   $skip_category_category_2 = Category::skip(5)->first();
   $skip_product_2 = Product::where('status',1)->where('category_id',$skip_category_category_2->id)->orderBy('id','DESC')->limit(5)->get();


   $skip_category_category_3 = Category::skip(1)->first();
   $skip_product_3 = Product::where('status',1)->where('category_id',$skip_category_category_3->id)->orderBy('id','DESC')->limit(5)->get();

   $skip_category_category_4 = Category::skip(10)->first();
   $skip_product_4 = Product::where('status',1)->where('category_id',$skip_category_category_4->id)->orderBy('id','DESC')->limit(5)->get();


   $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();

   $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();

   $recently_deals = Product::where('status',1)->orderBy('id','DESC')->limit(3)->get();

   $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();


    return view('frontend.index',compact('skip_category_category_0','skip_product_0','skip_category_category_2','skip_product_2','skip_category_category_3','skip_product_3', 'skip_category_category_4','skip_product_4','hot_deals','special_offer','recently_deals','special_deals'));
}




    public function ProductDetails($id,$slug)
    {

         $product = Product::findOrFail($id);
         $color = $product->product_color;
         $product_color = explode(',', $color);

         $size = $product->product_size;
         $product_size = explode(',', $size);

         $multiImage = MultiImg::where('product_id',$id)->get();
         $cat_id = $product->category_id;
         $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(4)->get();



        return view('frontend.product.product_details', compact('product','product_color','product_size','multiImage','relatedProduct'));
    } // End Method


public function VendorDetails($id)
{
      $vendor = user::findOrFail($id);
    $vproduct = Product::where('vendor_id',$id)->get();
 return view('frontend.vendor.vendor_details',compact('vendor','vproduct'));
}// End Method


public function VendorAll()
{

  $vendors = User::where('status','active')->where('role','vendor')->orderBy('id','DESC')->get();


  return view('frontend.vendor.vendor_all',compact('vendors'));

}// End Method


public function CatWiseProducts(Request $request, $id,$slug)
{
      $product = Product::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
      $categories = Category::orderBy('category_name', 'ASC')->get();
      $breadcat = Category::where('id',$id)->first();


    return view('frontend.product.category_view',compact('product','categories','breadcat'));
}// End Method



}
