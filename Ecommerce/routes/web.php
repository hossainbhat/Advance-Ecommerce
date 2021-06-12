<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/admin')->namespace('Admin')->group(function(){


 Route::match(['get','post'],'/', 'AdminController@login');


 Route::group(['middleware' => ['admin']], function () {

  Route::get('/dashboard', 'AdminController@dashboard');
  Route::get('/setting', 'AdminController@settings');
  Route::post('/check-pwd','AdminController@chkPassword');
  Route::post('/update-pwd','AdminController@updatePassword');
  Route::match(['get','post'],'/admin-details','AdminController@adminDetails');
  Route::get('/logout', 'AdminController@logout');

  //sections
   Route::get('/sections', 'SectionController@sections');
   Route::post('/update-section-status','SectionController@updateSectionStatus');
   Route::match(['get','post'],'/add-edit-section/{id?}','SectionController@addEditSection');
   Route::get('delete-section/{id}','SectionController@deleteSection');
   //brands
    Route::get('/brands', 'BrandController@brands');
    Route::post('/update-brand-status','BrandController@updateBrandStatus');
    Route::match(['get','post'],'/add-edit-brand/{id?}','BrandController@addEditBrand');
    Route::get('delete-brand/{id}','BrandController@deleteBrand');
   //categories
   Route::get('/categories','CategoryController@categories');
   Route::post('/update-category-status','CategoryController@updateCategoryStatus');
   Route::match(['get','post'],'/add-edit-category/{id?}','CategoryController@addEditCategory');
   Route::post('appendcategorieslavel','CategoryController@appendCategoriesLevel');
   Route::get('delete-category-image/{id}','CategoryController@deleteCategoryImage');
   Route::get('delete-category/{id}','CategoryController@deleteCategory');

   //products
  Route::get('/products','ProductController@products');
  Route::post('/update-product-status','ProductController@updateProductStatus');
  Route::get('delete-product/{id}','ProductController@deleteProduct');
  Route::match(['get','post'],'/add-edit-product/{id?}','ProductController@addEditProduct');
  Route::get('delete-product-image/{id}','ProductController@deleteProductImage');
  Route::get('delete-product-video/{id}','ProductController@deleteProductVideo');

  //product attribute
  Route::match(['get','post'],'/add-edit-product-attribute/{id?}','ProductController@addEditProductAttribute');
  Route::post('edit-attribute/{id}','ProductController@editAttributes');
  Route::post('update-attribute-status','ProductController@updateAttributeStatus');
  Route::get('delete-attribute/{id}','ProductController@deleteAttribute');

  //product images
  Route::match(['get','post'],'/add-edit-product-image/{id?}','ProductController@addEditProductImage');
  Route::get('delete-proImages/{id}','ProductController@deleteproductImages');
  Route::post('/update-image-status','ProductController@updateImageStatus');

  //banner
  Route::get('/banners','BannerController@banners');
  Route::match(['get','post'],'/add-edit-banner/{id?}','BannerController@addEditBanner');
  Route::post('/update-banner-status','BannerController@updateBannerStatus');
  Route::get('delete-banner-image/{id}','BannerController@deleteBannerImages');
  Route::get('delete-banner/{id}','BannerController@deleteBanner');
});

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

use App\Category;


Route::namespace('Front')->group(function(){
  Route::get('/', 'IndexController@index');
  // Route::get('/{url}', 'ProductController@listing');
  //category url
  $catUrls = Category::select('url')->where('status',1)->get()->pluck('url')->toArray();
  //echo "<pre>"; print_r($catUrls); die;
  foreach ($catUrls as $url) {
    Route::get('/'.$url, 'ProductController@listing');
  }
  //cart page
  Route::get('/cart','ProductController@cart');
  //product details
  Route::get('/{id}','ProductController@product');
  //add to Cart
  Route::post('add-to-cart','ProductController@addtocart');
  //get product price
  Route::post('/get-product-price','ProductController@getProductPrice');

});
