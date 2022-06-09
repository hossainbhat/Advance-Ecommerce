<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/admin')->namespace('Admin')->group(function(){

    Route::match(['get','post'],'/', [App\Http\Controllers\Admin\AdminController::class, 'login']);
    
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard']);
        Route::get('/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout']);
        Route::match(['get','post'],'/profile', [App\Http\Controllers\Admin\AdminController::class, 'profile']);
        Route::get('/delete-profile-image/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteProfileImage']);
        Route::post('/check-pwd', [App\Http\Controllers\Admin\AdminController::class, 'chkPassword']);
        Route::post('/update-pwd', [App\Http\Controllers\Admin\AdminController::class, 'updatePassword']);

        //sections
        Route::get('/sections', [App\Http\Controllers\Admin\SectionController::class, 'sections']);
        Route::post('update-section-status', [App\Http\Controllers\Admin\SectionController::class, 'updateSectionStatus']);
        Route::match(['get','post'],'/add-edit-section/{id?}', [App\Http\Controllers\Admin\SectionController::class, 'addEditSection']);
        Route::get('delete-section/{id}', [App\Http\Controllers\Admin\SectionController::class, 'deleteSection']);
        //brands
        Route::get('/brands', [App\Http\Controllers\Admin\BrandController::class, 'brands']);
        Route::post('update-brand-status', [App\Http\Controllers\Admin\BrandController::class, 'updateBrandStatus']);
        Route::match(['get','post'],'/add-edit-brand/{id?}', [App\Http\Controllers\Admin\BrandController::class, 'addEditBrand']);
        Route::get('delete-brand/{id}', [App\Http\Controllers\Admin\BrandController::class, 'deleteBrand']);
        //categories
        Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'categories']);
        Route::post('update-category-status', [App\Http\Controllers\Admin\CategoryController::class, 'updateCategoryStatus']);
        Route::match(['get','post'],'/add-edit-category/{id?}',[App\Http\Controllers\Admin\CategoryController::class, 'addEditCategory']);
        Route::post('appendcategorieslavel', [App\Http\Controllers\Admin\CategoryController::class, 'appendCategoriesLevel']);
        Route::get('delete-category-image/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategoryImage']);
        Route::get('delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory']);
        //products
        Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'products']);
        Route::post('update-product-status', [App\Http\Controllers\Admin\ProductController::class, 'updateProductStatus']);
        Route::match(['get','post'],'/add-edit-product/{id?}', [App\Http\Controllers\Admin\ProductController::class, 'addEditProduct']);
        Route::get('delete-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteProduct']);
        Route::get('delete-product-image/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteProductImage']);
        Route::get('delete-product-video/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteProductVideo']);
        //product attribute
        Route::match(['get','post'],'/add-edit-product-attribute/{id?}', [App\Http\Controllers\Admin\ProductController::class, 'addEditProductAttribute']);
        Route::post('edit-attribute/{id}', [App\Http\Controllers\Admin\ProductController::class, 'editAttributes']);
        Route::post('update-attribute-status', [App\Http\Controllers\Admin\ProductController::class, 'updateAttributeStatus']);
        Route::get('/delete-attribute/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteAttribute']);
        //product images
        Route::match(['get','post'],'/add-edit-product-image/{id?}', [App\Http\Controllers\Admin\ProductController::class, 'addEditProductImage']);
        Route::get('delete-proImages/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteproductImages']);
        Route::post('update-image-status', [App\Http\Controllers\Admin\ProductController::class, 'updateImageStatus']);
        //banner
        Route::get('/banners', [App\Http\Controllers\Admin\BannerController::class, 'banners']);
        Route::post('/update-banner-status', [App\Http\Controllers\Admin\BannerController::class, 'updateBannerStatus']);
        Route::match(['get','post'],'/add-edit-banner/{id?}', [App\Http\Controllers\Admin\BannerController::class, 'addEditBanner']);
        Route::get('/delete-banner-image/{id}', [App\Http\Controllers\Admin\BannerController::class, 'deleteBannerImages']);
        Route::get('/delete-banner/{id}', [App\Http\Controllers\Admin\BannerController::class, 'deleteBanner']);
        //coupon
        Route::get('/coupons', [App\Http\Controllers\Admin\CouponController::class, 'coupons']);
        Route::post('/update-coupon-status', [App\Http\Controllers\Admin\CouponController::class, 'updateCouponStatus']);
        Route::match(['get','post'],'/add-edit-coupon/{id?}', [App\Http\Controllers\Admin\CouponController::class, 'addEditCoupon']);
        Route::get('/delete-coupon/{id}', [App\Http\Controllers\Admin\CouponController::class, 'deleteCoupon']);
        //orders
        Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'orders']);
        Route::get('/order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'orderDetails']);
        Route::post('/update-order-status', [App\Http\Controllers\Admin\OrderController::class, 'updateOrderStatus']);
        Route::get('/view-order-invoice/{id}', [App\Http\Controllers\Admin\OrderController::class, 'viewOrderInvoice']);
        Route::get('/print-pdf-invoice/{id}', [App\Http\Controllers\Admin\OrderController::class, 'printPDFInvoice']);
        //shipping-charges 
        Route::get('/shipping-charges', [App\Http\Controllers\Admin\ShippingChargeController::class, 'shippingCharge']);
        Route::post('/update-shipping-status', [App\Http\Controllers\Admin\ShippingChargeController::class, 'updateShippingChargeStatus']);
        Route::match(['get','post'],'/edit-shipping-charges/{id}', [App\Http\Controllers\Admin\ShippingChargeController::class, 'editShippingCgarges']);
        //cms page
        Route::get('/cms-pages', [App\Http\Controllers\Admin\CmsController::class, 'cmsPages']);
        Route::post('/update-cms-status', [App\Http\Controllers\Admin\CmsController::class, 'updateCmsStatus']);
        Route::match(['get','post'],'/add-edit-cms/{id?}', [App\Http\Controllers\Admin\CmsController::class, 'addEditCms']);
        Route::get('/delete-cms/{id}', [App\Http\Controllers\Admin\CmsController::class, 'deleteCms']);


    }); 
});  

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
use App\Models\Category;
use App\Models\CmsPage;

Route::namespace('Front')->group(function(){
    
    Route::get('/', [App\Http\Controllers\Front\IndexController::class, 'index']);
    Route::match(['get','post'],'contact', [App\Http\Controllers\Front\CmsController::class, 'contact']);

    $catUrls = Category::select('url')->where('status',1)->get()->pluck('url')->toArray();
    // echo "<pre>"; print_r($catUrls); die;
    foreach ($catUrls as $url) {
        Route::get('/'.$url, [App\Http\Controllers\Front\ProductController::class, 'listing']);

    }
    $cmsUrl = CmsPage::select('url')->where('status',1)->get()->pluck('url')->toArray();
    // echo "<pre>"; print_r($cmsUrl); die;
    foreach ($cmsUrl as $url) {
        Route::get('/'.$url, [App\Http\Controllers\Front\CmsController::class, 'cmspage']);

    }

    //login register 
    Route::get('login-register', [App\Http\Controllers\Front\UserController::class, 'LoginRegister'])->name('login');
    // Route::get('login-register',['as' =>'login', 'uses'=> [App\Http\Controllers\Front\UserController::class, 'LoginRegister']]);
    //login user
    Route::post('login', [App\Http\Controllers\Front\UserController::class, 'loginUser']);
    //register user
    Route::post('register', [App\Http\Controllers\Front\UserController::class, 'registerUser']);
    //check email
    Route::match(['get','post'],'check-email', [App\Http\Controllers\Front\UserController::class, 'checkEmail']);
    //active email confarmation
    Route::match(['get','post'],'/confirm/{code}', [App\Http\Controllers\Front\UserController::class, 'confirmAccount']);

    Route::match(['get','post'],'/forgot-password', [App\Http\Controllers\Front\UserController::class, 'UserforgotPassword']);

    Route::group(['middleware' => ['auth']], function () {

        Route::match(['get','post'],'/account', [App\Http\Controllers\Front\UserController::class, 'Account']);
        Route::post('check-user-pwd', [App\Http\Controllers\Front\UserController::class, 'checkUserPassword']);
        Route::post('update-user-pwd', [App\Http\Controllers\Front\UserController::class, 'updateUserPassword']);
        //apply coupon
        Route::post('/apply-coupon', [App\Http\Controllers\Front\ProductController::class, 'applyCoupon']);
        Route::match(['get','post'],'/checkout', [App\Http\Controllers\Front\ProductController::class, 'checkout']);
        Route::match(['get','post'],'/add-edit-dalivary-address/{id?}', [App\Http\Controllers\Front\ProductController::class, 'addEditDalivaryAddress']);
        Route::get('/delete-dalivary-address/{id}', [App\Http\Controllers\Front\ProductController::class, 'deleteDalivaryAddress']);
        Route::get('/thanks', [App\Http\Controllers\Front\ProductController::class, 'thanks']);
        //wish list
        Route::post('/update-wishlist', [App\Http\Controllers\Front\ProductController::class, 'Wishlist']);
        Route::get('/wishlist-item', [App\Http\Controllers\Front\ProductController::class, 'wishListItem']);
        Route::post('/delete-wishlist-item', [App\Http\Controllers\Front\ProductController::class, 'deleteWishListItem']);

        Route::get('/orders', [App\Http\Controllers\Front\OrderController::class, 'orders']);
        Route::get('/orders/{id}', [App\Http\Controllers\Front\OrderController::class, 'orderDetails']);


    });


     //register user
     Route::get('logout', [App\Http\Controllers\Front\UserController::class, 'logoutUser']);
    
    //cart page
    Route::get('/cart', [App\Http\Controllers\Front\ProductController::class, 'cart']);
  
    //updaet cart item qty
    Route::post('/update-cart-item-qty',[App\Http\Controllers\Front\ProductController::class, 'updateCartItemQty']);
    //delete cart item
    Route::post('/delete-cart-item',[App\Http\Controllers\Front\ProductController::class, 'deleteCartItem']);
   //product details
    Route::get('/{id}', [App\Http\Controllers\Front\ProductController::class, 'product']);
    //add to Cart
    Route::post('add-to-cart', [App\Http\Controllers\Front\ProductController::class, 'addtocart']);
    //get product price
    Route::post('/get-product-price', [App\Http\Controllers\Front\ProductController::class, 'getProductPrice']);
    //wishlist



 
});