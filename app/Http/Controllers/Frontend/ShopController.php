<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\MultiImg;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function ShopPage(){

        $products = Product::query();

        if (!empty($_GET['category'])) {
            $slugs = explode(',',$_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug',$slugs)->pluck('id')->toArray();
           $products = Product::whereIn('category_id',$catIds)->get();
        } else{
             $products = Product::where('status',1)->orderBy('id','DESC')->get();
         }

        $categories = Category::orderBy('category_name', 'ASC')->get();
        $newProduct = Product::OrderBy('id','DESC')->limit(3)->get();


      return view('frontend.product.shop_page',compact('products','categories','newProduct'));
    }



    public function ShopFilter(Request $request){
        $data = $request->all();

        /// Filter For Category

        $catUrl = "";
        if (!empty($data['category'])) {
            foreach($data['category'] as $category){
                if (empty($catUrl)) {
                    $catUrl .= '&category='.$category;
                }else{
                    $catUrl .= ','.$category;
                }
            }
        }



        return redirect()->route('shop.page',$catUrl);
    }




}
