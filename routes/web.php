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
//frontend
Route::get('/','HomeController@index');
Route::get('/trangchu','HomeController@index');
//xem danh muc san pham
Route::get('/danh-muc-san-pham/{category_id}','HomeController@show');
Route::post('/form-login','HomeController@form_login');
Route::post('/form-signup','HomeController@form_signup');
Route::get('/log-out','HomeController@log_out');
Route::get('/show-login','HomeController@show_login');
Route::get('/show-signup','HomeController@show_signup');
Route::post('/product-search','HomeController@product_search');
Route::post('/save-upcoming-product','HomeController@save_upcoming_product');
//backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');
//đơn hàng
Route::get('/shipping','OrderController@shipping');
Route::get('/delete-shipping/{shipping_id}','OrderController@delete_shipping');
Route::get('/order-details','OrderController@order_details');
Route::get('/order','OrderController@order');
//admin comment
Route::get('/comment','CommentController@comment');
Route::post('/reply-comment','CommentController@reply_comment');
Route::get('/delete-comment/{comment_id}','CommentController@delete_comment');
//categoryProduct
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
//Brand Product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');
Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');
//Product
Route::get('/add-product','ProductControlller@add_product');
Route::get('/edit-product/{product_id}','ProductControlller@edit_product');
Route::get('/delete-product/{product_id}','ProductControlller@delete_product');
Route::get('/all-product','ProductControlller@all_product');
Route::post('/save-product','ProductControlller@save_product');
Route::get('/unactive-product/{product_id}','ProductControlller@unactive_product');
Route::get('/active-product/{product_id}','ProductControlller@active_product');
Route::post('/update-product/{product_id}','ProductControlller@update_product');
//Cart
Route::get('/cart','ControllerCart@cart');
Route::post('/save-cart','ControllerCart@save_cart');
Route::get('/delete-to-cart/{rowId}','ControllerCart@delete_to_cart');
Route::post('/order','ControllerCart@order');
//chi tiết sản phẩm
Route::get('/product-details/{product_id}','ProductDetails@product_details');
Route::post('/load-comment','ProductDetails@load_comment');
Route::post('/send-comment','ProductDetails@send_comment');
//checkout
Route::get('/check-login','ControllerCheckout@check_login');
Route::post('/confirm-order','ControllerCheckout@confirm_order');
//slider
Route::get('/add-slider','SliderController@add_slider');
Route::get('/unactive-slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active-slider/{slider_id}','SliderController@active_slider');
Route::get('/all-slider','SliderController@all_slider');
Route::get('/edit-slider/{slider_id}','SliderController@edit_slider');
Route::post('/update-slider/{slider_id}','SliderController@update_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');
//news product
Route::get('/product-news/{product_id}','ControllerNews@product_news');
Route::get('/all-news/{category_id}','ControllerNews@all_news');

//Mã giiamr giá
Route::get('/all-coupon','CouponController@coupon');
