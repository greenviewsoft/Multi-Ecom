<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image as Image;

class ProductController extends Controller
{
    public function AllProduct()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_all', compact('products'));
    } // End Method

    public function AddProduct()
    {
        $activeVendor = User::where('status', 'active')->where('role', 'vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.product_add', compact('brands', 'categories', 'activeVendor'));
    } // End Method

    public function StoreProduct(Request $request)
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
            'vendor_id' => $request->vendor_id,
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
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.product')->with($notification);

    } // End Method

    public function EditProduct($id)
    {
        $multyImg = MultiImg::where('product_id', $id)->get();
        $activeVendor = User::where('status', 'active')->where('role', 'vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('brands', 'categories', 'activeVendor', 'products', 'subcategory', 'multyImg'));
    } // End Method

    public function UpdateProduct(Request $request)
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

            'vendor_id' => $request->vendor_id,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.product')->with($notification);

    } // End Method

    ////////////////////////// multi product image delete Start  ////////////////////////////////
    public function DeleteProduct($id)
    {

        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $product->id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Products Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    } // End Method
    ////////////////////////// multi product image deletes end  ////////////////////////////////

    public function UpdateProductThobonail(Request $request)
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
            'message' => 'Product Thobonail Updated   Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    } //end method

    /////////////////// Multi image update method //////////////////////////

    public function UpdateProductMultiimage(Request $request)
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
            'message' => 'Product Multi Image Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    } // End Method

    public function ProductMultiimageDelete($id)
    {

        $MultiImg = MultiImg::findOrFail($id);
        $img = $MultiImg->photo_name;
        unlink($img);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'multi Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    } // end method

    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Product Inactive Successfully',
            'alert-type' => 'success');

        return redirect()->back()->with($notification);
    } // End Method

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Product active Successfully',
            'alert-type' => 'success');

        return redirect()->back()->with($notification);
    } // End Method


public function ProductStock(){
   
    $products = Product::latest()->get();
        return view('backend.product.product_stock',compact('products')); 
}// End Method



}
