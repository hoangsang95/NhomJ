<?php
App::setLocale('vi');
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
/*----------------- Route cho trang chủ ----------------*/
    Route::get('/','HomeController@index');
   
   // Route::get('/','HomeController@get_cate');

/* ---------------------------------------------------*/



// Chi tiết sản phẩm
Route::get('san-pham-{id}','MyController@detail');
// Danh sách sản phẩm thuộc chuyên mục
Route::get('chuyen-muc-{id}','MyController@product_list');
// So sanh san pha,
Route::get('so-sanh{id}', 'MyController@product_compare');
Route::get('so-sanh', 'MyController@product_compare1');
/*------ ------------ ----------- --------- ------------
Các Module xử lý
------ ------------ ----------- --------- ------------*/
// Trả vế kết quả tìm kiếm
Route::get('search','MyController@search');
// 
//Liên hệ

Route::get('lien-he', ['as' => 'getLienHe', 'uses' => 'ContactController@get_lienhe']);
Route::post('lien-he', ['as' => 'postLienHe', 'uses' => 'ContactController@post_lienhe']);
/*------------------ Route cho Admin -----------------------*/

/*------------------------ Route cho admin ------------------------*/

Route::get('admin/login', 'Auth\LoginController@dangnhap');
Route::post('admin/login', 'Auth\LoginController@postdangnhap');
Route::get('admin/logout', 'Auth\LoginController@dangxuat');
Route::get('social-login', function(){
    return view('layouts.socialLogin');
});
Route::get('auth/{provider}', 'Auth\SocialLoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialLoginController@handleProviderCallback');
Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    Route::group(['prefix' => 'category'], function () {
        Route::get('category_list', 'CateController@danhsach');
        Route::get('category_delete/{id}', 'CateController@xoa');
        Route::get('category_edit/{id}', 'CateController@sua');
        Route::post('category_edit/{id}', 'CateController@postsua');
        Route::get('category_add', 'CateController@them');
        Route::post('category_add', 'CateController@postthem');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('product_list', 'Admin_Product_Controller@admin_product_list');
        Route::get('product_edit/{id}', 'Admin_Product_Controller@admin_product_edit');
        Route::post('product_edit/{id}', 'Admin_Product_Controller@admin_product_edit_post');
        Route::get('product_delete/{id}', 'Admin_Product_Controller@admin_product_delete');
        Route::get('product_add', 'Admin_Product_Controller@admin_product_add');
        Route::post('product_add', 'Admin_Product_Controller@admin_product_add_post');
    });

    Route::group(['prefix' => 'slide'], function () {
        Route::get('slide_list', 'SlideController@danhsach');
        Route::get('slide_edit/{id}', 'SlideController@sua');
        Route::post('slide_edit/{id}', 'SlideController@postsua');
        Route::get('slide_delete/{id}', 'SlideController@xoa');
        Route::get('slide_add', 'SlideController@them');
        Route::post('slide_add', 'SlideController@postthem');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('user_list', 'UserController@danhsach');
        Route::get('user_delete/{id}', 'UserController@xoa');
        Route::get('user_edit/{id}', 'UserController@sua');
        Route::patch('user_edit/{id}', 'UserController@postsua');
        Route::get('user_add', 'UserController@them');
        Route::post('user_add', 'UserController@postthem');
    });
    
    Route::group(['prefix' => 'contact'], function () {
        Route::get('contact_list', 'ContactController@danhsach');
        Route::get('contact_delete/{id}', 'ContactController@xoa');
        Route::get('contact_edit/{id}', 'ContactController@sua');
        Route::post('contact_edit/{id}', 'ContactController@postsua');

        
    });
});