<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {

    ####################### Start user guest routes ############################
    Route::group(['namespace'=>'App\Http\Controllers\Site'/*, 'middleware' => 'guest'*/],function () {
        //////////////////////// Home page /////////////////////////////
        Route::get('/','HomeController@home')->name('home')->middleware('VerifiedUser');
        /////////////////////// products page & product details page /////////////////////
        Route::get('/category/{slug}','CategoryController@productBySlug')->name('category');
        Route::get('/product/{slug}','ProductController@productBySlug')->name('product.details');
    });
    ####################### End user guest routes ############################

    Route::group(['namespace'=>'App\Http\Controllers\Site','middleware'=>['auth:web','VerifiedUser']],function () {
        //authenticated & verified user
        ////////////////////// Cart transactions & payment methods ///////////////////////

        /////////////////////// wishlist /////////////////////
        Route::post('wishlist','WishListController@store')->name('wishlist.store');
        Route::delete('wishlist','WishListController@destroy')->name('wishlist.destroy');
        Route::get('wishlist/products','WishListController@index')->name('wishlist.index');
        ////////////////////// add to cart ///////////////////
        Route::group(['prefix' => 'cart'], function () {
            Route::get('/', 'CartController@getIndex')->name('site.cart.index');
            Route::post('/cart/add/{slug?}', 'CartController@postAdd')->name('site.cart.add');
            Route::post('/update/{slug}', 'CartController@postUpdate')->name('site.cart.update');
            Route::post('/update-all', 'CartController@postUpdateAll')->name('site.cart.update-all');
        });
        Route::post('payment', 'PaymentController@processPayment') -> name('payment');
        Route::get('/callback', 'PaymentController@paymentCallBack')->name('success.callback');
        Route::get('/callbackerror', 'PaymentController@paymentError');
    });
    Route::group(['namespace'=>'App\Http\Controllers\Site','middleware'=>'auth:web'],function () {
        //authenticated & not verified user

        Route::post('verify_code','VerificationCodeController@verify')->name('verify-name');
        Route::get('verify','VerificationCodeController@getVerify')->name('verify_page');


    });

});


