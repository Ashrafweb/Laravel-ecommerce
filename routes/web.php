<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TaxController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('admin',[AdminController::class,'index']);

Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::get('/',[FrontController::class,'index']);
Route::get('/product_detail/{id}',[FrontController::class,'index']);
Route::get('/category',[FrontController::class,'category']);
Route::get('/category/{slug}',[FrontController::class,'category']);
Route::post('/add_to_cart/{id}',[FrontController::class,'add_to_cart']);
Route::get('/account',[FrontController::class,'account']);
Route::post('/account_register',[FrontController::class,'account_register']);
Route::post('/account_login',[FrontController::class,'account_login']);
Route::get('/user_logout',[FrontController::class,'user_logout']);
Route::get('/cart',[FrontController::class,'cart']);
Route::get('/cart/delete/{id}',[FrontController::class,'cart']);
Route::get('/checkout',[FrontController::class,'checkout']);
Route::post('/checkout/confirm',[FrontController::class,'confirm_checkout']);
Route::get('/verification/{rand_id}',[FrontController::class,'verify_email']);
Route::get('/wishlist',[FrontController::class,'wishlist_view']);
Route::get('/wishlist/add/{id}',[FrontController::class,'add_to_wishlist']);
Route::get('/wishlist/delete/{id}',[FrontController::class,'wishlist_remove']);
Route::post('/search',[FrontController::class,'search_product']);
Route::get('/add_to_cart/{id}',[FrontController::class,'front_add_to_cart']);






Route::group(['middleware'=>'admin_auth'],function(){

    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);
    Route::post('admin/category/manage_category/insert',[CategoryController::class,'insert']);
    Route::get('admin/category/manage_category/edit/{id}',[CategoryController::class,'manage_category']);
    //Route::get('admin/category/manage_category/edit/{id}',[CategoryController::class,'update']);
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('admin/category/manage_category/status/{id}',[CategoryController::class,'status']);
  
    Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);
    Route::get('admin/coupon',[CouponController::class,'index']);
    Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);

    Route::post('admin/coupon/manage_coupon/insert',[CouponController::class,'insert']);
    Route::get('admin/coupon/manage_coupon/edit/{id}',[CouponController::class,'manage_coupon']);
    Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);
    Route::get('admin/coupon/manage_coupon/status/{id}',[CouponController::class,'status']);
 
    /*Size--routes*/
    Route::get('admin/size',[SizeController::class,'index']);
    Route::get('admin/size/manage_size',[SizeController::class,'manage_size']);
    Route::post('admin/size/manage_size/insert',[SizeController::class,'insert']);
    Route::get('admin/size/manage_size/edit/{id}',[SizeController::class,'manage_size']);
    Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);
    Route::get('admin/size/manage_size/status/{id}',[SizeController::class,'status']);
 
    /*Color--routes*/
    Route::get('admin/color',[ColorController::class,'index']);
    Route::get('admin/color/manage_color',[ColorController::class,'manage_color']);
    Route::post('admin/color/manage_color/insert',[ColorController::class,'insert']);
    Route::get('admin/color/manage_color/edit/{id}',[ColorController::class,'manage_color']);
    Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);
    Route::get('admin/color/manage_color/status/{id}',[ColorController::class,'status']);
 
    /*Brand--routes*/
    Route::get('admin/brand',[BrandController::class,'index']);
    Route::get('admin/brand/manage_brand',[BrandController::class,'manage_brand']);
    Route::post('admin/brand/manage_brand/insert',[BrandController::class,'insert']);
    Route::get('admin/brand/manage_brand/edit/{id}',[BrandController::class,'manage_brand']);
    Route::get('admin/brand/delete/{id}',[BrandController::class,'delete']);
    Route::get('admin/brand/manage_brand/status/{id}',[BrandController::class,'status']);
 
    /*products--routes*/

    Route::get('admin/products',[ProductsController::class,'index']);
    Route::get('admin/products/manage_products',[ProductsController::class,'manage_products']);

    Route::post('admin/products/manage_products/insert',[ProductsController::class,'insert']);
    Route::get('admin/products/manage_products/edit/{id}',[ProductsController::class,'manage_products']);
    Route::get('admin/products/delete/{id}',[ProductsController::class,'delete']);
    Route::get('admin/products/manage_products/status/{id}',[ProductsController::class,'status']);
    Route::get('admin/products/manage_products/edit/delete_attr/{del_sku}',[ProductsController::class,'delete_attr']);
  
    /* Banner-routes */

    Route::get('admin/banner',[BannerController::class,'index']);
    Route::get('admin/banner/manage_banner',[BannerController::class,'manage_banner']);
    Route::post('admin/banner/manage_banner/insert',[BannerController::class,'insert']);
    Route::get('admin/banner/manage_banner/edit/{id}',[BannerController::class,'manage_banner']);
    Route::get('admin/banner/delete/{id}',[BannerController::class,'delete']);
    Route::get('admin/banner/manage_banner/status/{id}',[BannerController::class,'status']);
  
    /* Order */
    Route::get('admin/order',[OrderController::class,'index']);
    Route::get('admin/order/order_detail/{id}',[OrderController::class,'order_details']);
  
    Route::post('admin/order/order_detail/update',[OrderController::class,'update']);
   // Route::get('admin/order/delete/{id}',[OrderController::class,'delete']);
   // Route::get('admin/order/manage_order/status/{id}',[OrderController::class,'status']);

   /*Tax*/
   Route::get('admin/tax',[TaxController::class,'index']);
   Route::get('admin/tax/manage_tax',[TaxController::class,'manage_tax']);

     /*Customers*/
     Route::get('admin/customers',[CustomerController::class,'index']);
   

})
;

Route::get('admin/admin_logout', function () {
    session()->forget('ADMIN_LOGIN',true);
    session()->forget('ADMIN_ID');
    session()->flash('success','Logout Successfully');
    return redirect('admin');
});