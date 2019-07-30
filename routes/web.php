<?php

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

Route::get('/', [
'uses'=>'NewShopController@index',
'as'=>'/'
]);

Route::get('/category-product/{id}',[
    'uses'=>'NewShopController@categoryProduct',
    'as'=>'category-product'
]);

Route::get('/show/single-details/{id}',[
    'uses'=>'NewShopController@categoryProductDetail',
    'as'=>'category-product-details'
]);

Route::get('/product/details/{id}/{name}',[
    'uses'=>'NewShopController@productDetails',
    'as'=>'product-details'
]);



Route::post('/cart/add',[
    'uses'=>'CartController@index',
    'as'=>'add-to-cart'
]);




Route::get('/cart/show',[
    'uses'=>'CartController@showCart',
    'as'=>'show-cart'
]);

Route::get('/cart/delete/{id}',[
    'uses'=>'CartController@deleteCart',
    'as'=>'delete-cart-item'
]);

Route::post('/cart/update',[
    'uses'=>'CartController@updateCart',
    'as'=>'update-cart'
]);

Route::get('/checkout',[
    'uses'=>'CheckoutController@index',
    'as'=>'checkout'
]);

Route::post('/customer/registration',[
    'uses'=>'CheckoutController@customerSignUp',
    'as'=>'customer-sign-up'
]);

///////////////////////////////////////////////////////////////menu reg////////////////////////////////////////////
//
//Route::get('/menu-registration',[
//    'uses'=>'MenuSignupController@menuRegistrationForm',
//    'as'=>'menu-registration-form'
//]);
//
//Route::post('/customer/registration',[
//    'uses'=>'MenuSignupController@customerMenuSignUp',
//    'as'=>'customer-menu-sign-up'
//]);



Route::post('/customer/login',[
    'uses'=>'CheckoutController@customerLoginCheck',
    'as'=>'customer-login'
]);


Route::get('/customer/forget-password',[
    'uses'=>'CheckoutController@forgetPassword',
    'as'=>'forget-password'
]);

Route::post('/customer/forgot-password',[
    'uses'=>'CheckoutController@forgotPassword',
    'as'=>'forgot-password'
]);



Route::post('/customer/logout',[
    'uses'=>'CheckoutController@customerLogout',
    'as'=>'customer-logout'
]);

Route::get('/customer/new-login',[
    'uses'=>'CheckoutController@newcustomerLoginCheck',
    'as'=>'new-customer-login'
]);

Route::get('/checkout/shipping',[
    'uses'=>'CheckoutController@shippingForm',
    'as'=>'checkout-shipping'
]);

Route::post('/shipping/save',[
    'uses'=>'CheckoutController@saveShipping',
    'as'=>'new-shipping'
]);

Route::get('/checkout/payment',[
   'uses'=>'CheckoutController@paymentForm',
    'as'=>'checkout-payment'

]);

Route::post('/checkout/order',[
    'uses'=>'CheckoutController@newOrder',
    'as'=>'new-order'
]);

Route::get('checkout/complete-order',[
    'uses'=>'CheckoutController@completeOrder',
    'as'=>'complete-order'

]);


///////////Admin Section
Auth::routes();

Route::get('/home', [
    'uses'=>'HomeController@index',
    'as'=>'/home'
]);

Route::group(['middleware' => 'manageOrder'], function () {
    //
    Route::get('/category/add-category', [
        'uses'=>'CategoryController@addCategory',
        'as'=>'add-category'
    ]);

    Route::post('/category/save' , [
        'uses'=>'CategoryController@saveCategory',
        'as'=>'new-category'
    ]);

    Route::get('/category/manage-category' , [
        'uses'=>'CategoryController@manageCategory',
        'as'=>'manage-category'
    ]);

    Route::get('/category/unpublished/{id}',[
        'uses'=>'CategoryController@unpublishedCategory',
        'as'=>'unpublished-category'
    ]);

    Route::get('/category/published/{id}',[
        'uses'=>'CategoryController@publishedCategory',
        'as'=>'published-category'
    ]);

    Route::get('/category/edit/{id}',[
        'uses'=>'CategoryController@editCategory',
        'as'=>'edit-category'
    ]);

    Route::post('/category/update',[
        'uses'=>'CategoryController@updateCategory',
        'as'=>'update-category'
    ]);

    Route::get('/category/delete/{id}', [
        'uses'=>'CategoryController@deleteCategory',
        'as'=>'delete-category'
    ]);

    Route::get('/brand/add', [
        'uses'=>'BrandController@index',
        'as'=>'add-brand'
    ]);

    Route::post('/brand/save',[
        'uses'=>'BrandController@createBrand',
        'as'=>'new-brand'
    ]);

    Route::get('/brand/manage',[
        'uses'=>'BrandController@manageBrand',
        'as'=>'manage-brand'
    ]);

    Route::get('/brand/unpublished/{id}',[
        'uses'=>'BrandController@unpublishedBrand',
        'as'=>'unpublished-brand'
    ]);

    Route::get('/brand/published/{id}',[
        'uses'=>'BrandController@publishedBrand',
        'as'=>'published-brand'
    ]);

    Route::get('/brand/edit/{id}',[
        'uses'=>'BrandController@editBrand',
        'as'=>'edit-brand'
    ]);

    Route::post('/brand/update',[
        'uses'=>'BrandController@updateBrand',
        'as'=>'update-brand'
    ]);

    Route::get('/brand/delete/{id}',[
        'uses'=>'BrandController@deleteBrand',
        'as'=>'delete-brand'
    ]);

    Route::get('/product/add',[
        'uses'=>'ProductController@index',
        'as'=>'add-product'

    ]);

    Route::post('/product/save' , [
        'uses'=>'ProductController@createProduct',
        'as'=>'new-product'
    ]);

    Route::get('/product/manage-product',[
        'uses'=>'ProductController@manageProduct',
        'as'=>'manage-product'
    ]);

    Route::get('/product/unpublished-product/{id}',[
        'uses'=>'ProductController@unpublishedProduct',
        'as'=>'unpublished-product'
    ]);

    Route::get('/product/published-product/{id}',[
        'uses'=>'ProductController@publishedProduct',
        'as'=>'published-product'
    ]);

    Route::get('/product/edit-product/{id}',[
        'uses'=>'ProductController@editProduct',
        'as'=>'edit-product'
    ]);

    Route::post('/product/update-product',[
        'uses'=>'ProductController@updateProduct',
        'as'=>'update-product'
    ]);


    Route::get('/product/delete/{id}', [
        'uses'=>'ProductController@deleteProduct',
        'as'=>'delete-product'
    ]);

    Route::get('/order/manage-order',[
        'uses'=>'OrderController@manageOrder',
        'as'=>'manage-order',
        'middleware'=>'manageOrder'
    ]);

    Route::get('/order/details/{id}',[
        'uses'=>'OrderController@viewOrderDetails',
        'as'=>'view-order-details'
    ]);

    Route::get('/order/invoice/{id}',[
        'uses'=>'OrderController@viewOrderInvoice',
        'as'=>'view-order-invoice'
    ]);

    Route::get('/order/download/{id}',[
        'uses'=>'OrderController@downloadOrderInvoice',
        'as'=>'download-order-invoice'
    ]);

    Route::get('/order/delete/{id}',[
        'uses'=>'OrderController@deleteOrder',
        'as'=>'delete-order'
    ]);

});


