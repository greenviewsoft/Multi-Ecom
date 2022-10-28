<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\vendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;

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

Route::get('/', function () {
    return view('frontend.index');
});
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

});

////////// login Routes /////////
 Route::get('/admin/login', [AdminController::class, 'AdminLogin']);
 Route::get('/vendor/login', [vendorController::class, 'VendorLogin'])->name('vendor.login');
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


});



 // All Inactive Vendor Route
 Route::controller(AdminController::class)->group(function(){
Route::get('/vendor/inactive', 'VendorInactive')->name('inactive.vendor');

});


   }); // End Middleware

