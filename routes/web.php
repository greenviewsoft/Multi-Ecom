<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\vendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\wishlistController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\User\CompareController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;

/**\

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/', [IndexController::class, 'Index']);

Route::middleware(['auth'])->group(function() {

    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');

    }); // Gorup Milldeware End


    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



//////////// Admin dashboard ///////////
Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashBoard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

});


//////////// vendor dashboard ///////////
Route::middleware(['auth','role:vendor'])->group(function(){

   Route::get('/vendor/dashboard', [vendorController::class, 'vendorDashBoard'])->name('vendor.dashboard');
   Route::get('/vendor/logout', [vendorController::class, 'VendorDestroy'])->name('vendor.logout');
   Route::get('/vendor/profile', [vendorController::class, 'VendorProfile'])->name('vendor.profile');
   Route::post('/vendor/profile/store', [vendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');
   Route::get('/vendor/change/password', [vendorController::class, 'VendorChangePassword'])->name('vendor.change.password');
   Route::post('/vendor/update/password', [vendorController::class, 'VendorUpdatePassword'])->name('vendor.update.password');

   // Vendor Add Product All Route
Route::controller(VendorProductController::class)->group(function(){
    Route::get('/vendor/all/products' , 'VendorAllProduct')->name('vendor.all.product');
    Route::get('/vendor/add/products' , 'VendorAddProduct')->name('vendor.add.product');
    Route::post('/vendor/store/products' , 'VendorStoreProduct')->name('vendor.store.product');
    Route::get('/vendor/edit/products/{id}' , 'VendorEditProduct')->name('vendor.edit.product');
    Route::post('/vendor/update/products' , 'VendorUpdateProduct')->name('vendor.update.product');
    Route::post('/vendor/update/product/thumbnail' , 'VendorUpdateProductThumbnail')->name('vendor.update.product.thobonail');
    Route::post('/vendor/update/product/multiimage' , 'VendorUpdateProductMultiimage')->name('vendor.update.product.multiimage');
    Route::get('/vendor/multi/image/delete/products/{id}' , 'VendorDeleteMultiimage')->name('Vendor.delete.product.multiimage');
    Route::get('/vendor/inactive/products/{id}' , 'VendorProductInactive')->name('vendor.product.inactive');
    Route::get('/vendor/active/products/{id}' , 'VendorProductActive')->name('vendor.product.active');
    Route::get('/vendor/Delete/products/{id}' , 'VendorProductDelete')->name('vendor.delete.product');

    Route::get('/vendor/subcategory/ajax/{category_id}' , 'VendorGetSubCategory');


});

}); // end Groups Middleware

////////// login Routes /////////
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);

 Route::get('/become/vendor', [vendorController::class, 'BecomeVendor'])->name('become.vendor');
 Route::post('/vendor/register', [vendorController::class, 'VendorRegister'])->name('vendor.register');



 Route::middleware(['auth','role:admin'])->group(function() {


    // Brand All Route
   Route::controller(BrandController::class)->group(function(){
       Route::get('/all/brand' , 'AllBrand')->name('all.brand');
       Route::get('/add/brand' , 'AddBrand')->name('add.brand');
       Route::post('/store/brand' , 'StoreBrand')->name('store.brand');
       Route::get('/edit/brand/{id}' , 'EditBrand')->name('edit.brand');
       Route::post('/update/brand' , 'UpdateBrand')->name('update.brand');
       Route::get('/delete/brand/{id}' , 'DeleteBrand')->name('delete.brand');
    });


     // Coupon All Route
Route::controller(CouponController::class)->group(function(){
    Route::get('/all/coupon' , 'AllCoupon')->name('all.coupon');
    Route::get('/add/coupon' , 'AddCoupon')->name('add.coupon');
    Route::post('/store/coupon' , 'StoreCoupon')->name('store.coupon');
    Route::get('/edit/coupon/{id}' , 'EditCoupon')->name('edit.coupon');
    Route::post('/update/coupon' , 'UpdateCoupon')->name('update.coupon');
    Route::get('/delete/coupon/{id}' , 'DeleteCoupon')->name('delete.coupon');

});

 // Shipping Division All Route 
Route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/division' , 'AllDivision')->name('all.division');
    Route::get('/add/division' , 'AddDivision')->name('add.division');
    Route::post('/store/division' , 'StoreDivision')->name('store.division');
    Route::get('/edit/division/{id}' , 'EditDivision')->name('edit.division');
    Route::post('/update/division' , 'UpdateDivision')->name('update.division');
    Route::get('/delete/division/{id}' , 'DeleteDivision')->name('delete.division');

}); 



 // Shipping Distic All Route 
Route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/district' , 'AllDistrict')->name('all.district');
    Route::get('/add/district' , 'AddDistrict')->name('add.district');
    Route::post('/store/district' , 'StoreDistrict')->name('store.district');
    Route::get('/edit/district/{id}' , 'EditDistrict')->name('edit.district');
    Route::post('/update/district' , 'UpdateDistrict')->name('update.district');
    Route::get('/delete/district/{id}' , 'DeleteDistrict')->name('delete.district');

}); 



 // Shipping State  All Route 
Route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/state' , 'AllState')->name('all.State');
    Route::get('/add/state' , 'AddState')->name('add.state');
    Route::post('/store/state' , 'StoreState')->name('store.state');
    Route::get('/edit/state/{id}' , 'EditState')->name('edit.state');
    Route::post('/update/state' , 'UpdateState')->name('update.state');

    Route::get('/delete/state/{id}' , 'DeleteState')->name('delete.state');

    Route::get('/district/ajax/{division_id}' , 'GetDistrict');



}); 





    // Category All Route
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/all/category' , 'AllCategory')->name('all.category');
        Route::get('/add/category' , 'AddCategory')->name('add.category');
        Route::post('/store/category' , 'StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}' , 'EditCategory')->name('edit.category');
       Route::post('/update/category' , 'UpdateCategory')->name('update.category');
       Route::get('/delete/category/{id}' , 'DeleteCategory')->name('delete.category');
     });


 // SubCategory All Route
 Route::controller(SubCategoryController::class)->group(function(){
    Route::get('/all/subcategory' , 'AllSubCategory')->name('all.subcategory');
    Route::get('/add/subcategory' , 'AddSubCategory')->name('add.subcategory');
    Route::post('/store/subcategory' , 'StoreSubCategory')->name('store.subcategory');
    Route::get('/edit/subcategory/{id}' , 'EditSubCategory')->name('edit.subcategory');
    Route::post('/update/Subcategory' , 'UpdateSubCategory')->name('update.subcategory');
    Route::get('/delete/subcategory/{id}' , 'DeleteSubCategory')->name('delete.subcategory');

    Route::get('/subcategory/ajax/{category_id}' , 'GetSubCategory');

});



 // All Inactive Vendor Route
    Route::controller(AdminController::class)->group(function(){
    Route::get('/vendor/inactive', 'VendorInactive')->name('inactive.vendor');
    Route::get('/active/vendor' , 'ActiveVendor')->name('active.vendor');
    Route::get('/inactive/vendor/details/{id}' , 'InactiveVendorDetails')->name('inactive.vendor.details');
    Route::post('/active/vendor/approve' , 'ActiveVendorApprove')->name('active.vendor.approve');
    Route::get('/active/vendor/details/{id}' , 'ActiveVendorDetails')->name('active.vendor.details');
    Route::post('/inactive/vendor/approve' , 'InActiveVendorApprove')->name('inactive.vendor.approve');
});


 // Product All Routes
 Route::controller(ProductController::class)->group(function(){
    Route::get('/all/product' , 'AllProduct')->name('all.product');
    Route::get('/add/product' , 'AddProduct')->name('add.product');
    Route::post('/store/product' , 'StoreProduct')->name('store.product');
    Route::get('/edit/product/{id}' , 'EditProduct')->name('edit.product');
    Route::post('/update/product' , 'UpdateProduct')->name('update.product');
    Route::get('/delete/product/{id}' , 'DeleteProduct')->name('delete.product');
    Route::post('/update/product/thombonail' , 'UpdateProductThobonail')->name('update.product.thobonail');
    Route::post('/update/product/multiimage' , 'UpdateProductMultiimage')->name('update.product.multiimage');
    Route::get('/delete/product/multiimage/{id}' , 'ProductMultiimageDelete')->name('delete.product.multiimage');
    Route::get('/product/inactive/{id}' , 'ProductInactive')->name('product.inactive');
    Route::get('/product/active/{id}' , 'ProductActive')->name('product.active');
});




    // SliderController  All Route
    Route::controller(SliderController::class)->group(function(){
        Route::get('/all/slider' , 'AllSlider')->name('all.slider');
        Route::get('/add/slider' , 'AddSlider')->name('add.slider');
        Route::post('/store/slider' , 'StoreSlider')->name('store.slider');
        Route::get('/edit/slider/{id}' , 'EditSlider')->name('edit.slider');
       Route::post('/update/slider' , 'UpdateSlider')->name('update.slider');
       Route::get('/delete/slider/{id}' , 'DeleteSlider')->name('delete.slider');
     });


    // Banner  All Route
    Route::controller(BannerController::class)->group(function(){
        Route::get('/all/banner' , 'AllBanner')->name('all.banner');
        Route::get('/add/banner' , 'AddBanner')->name('add.banner');
        Route::post('/store/banner' , 'StoreBanner')->name('store.banner');
        Route::get('/edit/banner/{id}' , 'EditBanner')->name('edit.banner');
       Route::post('/update/banner' , 'UpdateBanner')->name('update.banner');
       Route::get('/delete/banner/{id}' , 'DeleteBanner')->name('delete.banner');
     });



   }); // Admin End Middleware


/////// Product mini Cart /////////////

Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);

//////// Frontend Product details All Route ////////

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

Route::get('/vendor/details/{id}', [IndexController::class, 'VendorDetails'])->name('vendor.details');

Route::get('/vendor/all', [IndexController::class, 'VendorAll'])->name('all.vendor');

Route::get('/product/category/{id}/{slug}', [IndexController::class, 'CatWiseProducts']);
Route::get('/product/subcategory/{id}/{slug}', [IndexController::class, 'SubCatWiseProducts']);


/////// Product View Modal With Ajax /////////////

Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);


/////// Add to cart  Ajax /////////////
 Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

/////// Add to cart  Remove /////////////
Route::get('/minicart/product/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);


/////// Add to cart To For Products details  Ajax /////////////
Route::post('/dcart/data/store/{id}', [CartController::class, 'AddToCartDetails']);

/////// Add to Wise List /////////////
Route::post('/product/wishlist/add/{product_id}', [wishlistController::class, 'AddToWishList']);



/// Add to Compare
Route::post('/add-to-compare/{product_id}', [CompareController::class, 'AddToCompare']);


/// Front End Apply Coupon
Route::post('/cupon-apply/', [CartController::class, 'ApplyCoupon']);

Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

// Checkout Page Route 
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

 // Cart All Route 
Route::controller(CartController::class)->group(function(){
    Route::get('/mycart' , 'MyCart')->name('mycart');
    Route::get('/get-cart-product' , 'GetCartProduct');
    Route::get('/cart-remove/{rowId}' , 'CartRemove');

    Route::get('/cart-decrement/{rowId}' , 'CartDecrement');
    Route::get('/cart-increment/{rowId}' , 'CartIncrement');
    });

Route::middleware(['auth','role:user'])->group(function(){

    // Whish list Route
    Route::controller(wishlistController::class)->group(function(){
        Route::get('/wishlist' , 'AllWishlist')->name('wishlist');
        Route::get('/get-wishlist-product' , 'GetWishlistProduct');
        Route::get('/wishlist-remove/{id}' , 'WishlistRemove');


    });


     // Compare All Route
    Route::controller(CompareController::class)->group(function(){
        Route::get('/compare' , 'AllCompare')->name('compare');
        Route::get('/get-compare-product' , 'GetCompareProduct');
        Route::get('/compare-remove/{id}' , 'RemoveCompare');
    });


    // state
    Route::controller(CheckoutController::class)->group(function(){
        Route::get('/district-get/ajax/{division_id}' , 'DistrictGetAjax');
        Route::get('/state-get/ajax/{district_id}' , 'StatetGetAjax');
        Route::post('/checkout/store' , 'CheckoutStore')->name('checkout.store');


    });

     // Stripe All Route 
Route::controller(StripeController::class)->group(function(){
    Route::post('/stripe/order' , 'StripeOrder')->name('stripe.order');



}); 

}); //end group User Middleware


