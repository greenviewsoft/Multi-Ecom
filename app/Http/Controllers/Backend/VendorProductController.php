<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Intervention\Image\Facades\Image as Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VendorProductController extends Controller
{
    public function VendorAllProduct(){

        $id = Auth::user()->id;
        $products = Product::where('vendor_id',$id)->latest()->get();
        return view('vendor.backend.product.vendor_product_all',compact('products'));
    } // End Method


    public function VendorAddProduct()
    {

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('vendor.backend.product.vendor_product_add', compact('brands', 'categories',));
    } // End Method



    public function VendorGetSubCategory($category_id){
        $subcategory = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
            return json_encode($subcategory);

    }// End Method

    public function VendorStoreProduct(Request $request)
    {

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 800)->save('upload/products/thumbnail/' . $name_gen);
        $save_url = 'upload/products/thumbnail/' . $name_gen;

        $product_id = Product::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' => $save_url,
            'vendor_id' => Auth::user()->id,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        /// Multiple Image Upload From her //////
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(800, 800)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        } // end foreach

        /// End Multiple Image Upload From her //////

        $notification = array(
            'message' => 'Vendor Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('vendor.all.product')->with($notification);

    } // End Method



    public function VendorEditProduct($id)
    {
        $multyImg = MultiImg::where('product_id', $id)->get();

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('vendor.backend.product.vendor_product_edit', compact('brands', 'categories', 'products', 'subcategory', 'multyImg'));
    } // End Method



    public function VendorUpdateProduct(Request $request)
    {

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'status' => 1,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Vendor Product Updated Without Image Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('vendor.all.product')->with($notification);

    } // End Method


    public function VendorUpdateProductThumbnail(Request $request)
    {

        $pro_id = $request->id;
        $old_image = $request->old_img;

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 800)->save('upload/products/thumbnail/' . $name_gen);
        $save_url = 'upload/products/thumbnail/' . $name_gen;

        if (file_exists($old_image)) {
            unlink($old_image);
        }

        Product::findOrfail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Vendor Product Thobonail Updated   Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    } //end method


    /////////////////// vendor Multi image update method //////////////////////////

    public function VendorUpdateProductMultiimage(Request $request)
    {

        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(800, 800)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);
        } // end foreach

        $notification = array(
            'message' => 'Vendor Product Multi Image Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    } // End Method


    public function VendorDeleteMultiimage($id)
    {

        $MultiImg = MultiImg::findOrFail($id);
        $img = $MultiImg->photo_name;
        unlink($img);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Vendor multi Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    } // end method

}
