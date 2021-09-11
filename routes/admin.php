<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => LaravelLocalization::setLocale()."/admin",
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){


Route::group(['namespace'=>'App\Http\Controllers\Dashboard','middleware'=>'auth:admin'],function () {
    Route::get('/',"DashboardController@index")->name('admin.dashboard');   //redirect dashboard
    Route::get('/logout',"loginController@logout")->name('admin.logout');   //admin logout

    ######################## Start settings routes ##############################

    Route::group(["prefix"=>'settings','middleware'=>'can:settings'],function (){
        Route::get('shipping-methods\{type}','SettingsController@editShippingMethods')->name('edit.shipping.methods');
        Route::put('shipping-methods\{id}','SettingsController@updateShippingMethods')->name('update.shipping.methods');
    });

    ######################### End settings routes ###############################

    ######################## Start edit profile routes ##############################

    Route::group(["prefix"=>'profile'],function (){
        Route::get('edit','EditProfileController@editProfile')->name('edit.profile');
        Route::put('update','EditProfileController@updateProfile')->name('update.profile');
    });

    ######################### End edit profile routes ###############################

    ######################################## start main-categories routes ##########################################
    Route::group(['prefix' => 'main_categories','middleware'=>'can:main_categories'], function () {
        Route::get('/{type}', 'MainCategoriesController@index')->name('admin.maincategories');
        Route::get('/create/{type}', 'MainCategoriesController@create')->name('admin.maincategories.create');
        Route::post('/store', 'MainCategoriesController@store')->name('admin.maincategories.store');
        Route::get('/edit/{type}/{id}', 'MainCategoriesController@edit')->name('admin.maincategories.edit');
        Route::post('/update/{id}', 'MainCategoriesController@update')->name('admin.maincategories.update');
        Route::get('/delete/{id}', 'MainCategoriesController@destroy')->name('admin.maincategories.delete');
    });
    ######################################## End  main-categories  routes #########################################################    ######################################## start main-categories routes ##########################################

    ######################################## start brands routes ##########################################
    Route::group(['prefix' => 'brands','middleware'=>'can:brands'], function () {
        Route::get('/', 'BrandsController@index')->name('admin.brands');
        Route::get('/create', 'BrandsController@create')->name('admin.brands.create');
        Route::post('/store', 'BrandsController@store')->name('admin.brands.store');
        Route::get('/edit/{id}', 'BrandsController@edit')->name('admin.brands.edit');
        Route::post('/update/{id}', 'BrandsController@update')->name('admin.brands.update');
        Route::get('/delete/{id}', 'BrandsController@destroy')->name('admin.brands.delete');
    });
    ######################################## End  brands  routes #########################################################

    ######################################## start tags routes ##########################################
    Route::group(['prefix' => 'tags','middleware'=>'can:tags'], function () {
        Route::get('/', 'TagsController@index')->name('admin.tags');
        Route::get('/create', 'TagsController@create')->name('admin.tags.create');
        Route::post('/store', 'TagsController@store')->name('admin.tags.store');
        Route::get('/edit/{id}', 'TagsController@edit')->name('admin.tags.edit');
        Route::post('/update/{id}', 'TagsController@update')->name('admin.tags.update');
        Route::get('/delete/{id}', 'TagsController@destroy')->name('admin.tags.delete');
    });
    ######################################## End  brands  routes #########################################################

    ######################################## start tags routes ##########################################
    Route::group(['middleware'=>'can:products'],function (){
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductsController@index')->name('admin.products');

        /////////////////////// crete product routes /////////////////////////////////

        Route::get('/create', 'ProductsController@createGeneral')->name('admin.products.general.create');
        Route::post('/store', 'ProductsController@storeGeneral')->name('admin.products.general.store');

        Route::get('/create_price', 'ProductsController@createGeneralPrice')->name('admin.products.general.create-price');
        Route::post('/store_price', 'ProductsController@storeGeneralPrice')->name('admin.products.general.store-price');

        Route::get('/create_inventory', 'ProductsController@createGeneralInventory')->name('admin.products.general.create-inventory');
        Route::post('/store_inventory', 'ProductsController@storeGeneralInventory')->name('admin.products.general.store-inventory');

        Route::get('/create_images', 'ProductsController@createGeneralImages')->name('admin.products.general.create-images');
        Route::post('/save_images', 'ProductsController@saveImages')->name('admin.products.images.store');
        Route::post('/store_images', 'ProductsController@endGeneralImages')->name('admin.products.save-db');

        Route::get('/create_option', 'ProductsController@createOption')->name('admin.products.create-options');
        Route::post('/store_option', 'ProductsController@storeGeneralOption')->name('admin.products.store-options');
        Route::get('/success_option', 'ProductsController@successOption')->name('admin.products.success-options');

        /////////////////////// update product routes /////////////////////////////////

        Route::get('/edit_general/{id}', 'ProductsController@editGeneral')->name('admin.products.general.edit');
        Route::post('/update_general/{id}', 'ProductsController@updateGeneral')->name('admin.products.general.update');

        Route::get('/edit_price/{id}', 'ProductsController@editGeneralPrice')->name('admin.products.general.edit-price');
        Route::post('/update_price/{id}', 'ProductsController@updateGeneralPrice')->name('admin.products.general.update-price');

        Route::get('/edit_inventory/{id}', 'ProductsController@editGeneralInventory')->name('admin.products.general.edit-inventory');
        Route::post('/update_inventory/{id}', 'ProductsController@updateGeneralInventory')->name('admin.products.general.update-inventory');

        Route::get('/edit_images/{id}', 'ProductsController@editGeneralImages')->name('admin.products.general.edit-images');
        Route::get('/delete_images/{image_id}', 'ProductsController@deleteImages')->name('admin.products.general.delete-images');
        Route::post('/update_images/{id}', 'ProductsController@updateGeneralImages')->name('admin.products.update-db');

        Route::get('/edit_add_option/{id}', 'ProductsController@editAddOption')->name('admin.products.edit-add-options');
        Route::post('/add_option/{id}', 'ProductsController@addOption')->name('admin.products.add-options');
        Route::get('/edit_option/{id}/{optionId}', 'ProductsController@editOption')->name('admin.products.edit-options');
        Route::post('/update_option/{id}/{optionId}', 'ProductsController@updateOption')->name('admin.products.update-options');
        Route::get('/delete_option/{id}/{optionId}', 'ProductsController@deleteOption')->name('admin.products.delete-options');

        ////////////////////////////// delete product ///////////////////////////////

        Route::get('/delete_product/{id}', 'ProductsController@deleteProduct')->name('admin.products.delete-product');
        Route::get('/restore_product/{id}', 'ProductsController@restoreProducts')->name('admin.products.restore-product');
    });
    ######################################## End  brands  routes #########################################################

    ######################################## start attributes routes ##########################################
    Route::group(['prefix' => 'product_attributes'], function () {
        Route::get('/', 'AttributesController@index')->name('admin.attributes');
        Route::get('/create', 'AttributesController@create')->name('admin.attributes.create');
        Route::post('/store', 'AttributesController@store')->name('admin.attributes.store');
        Route::get('/edit/{id}', 'AttributesController@edit')->name('admin.attributes.edit');
        Route::post('/update/{id}', 'AttributesController@update')->name('admin.attributes.update');
        Route::get('/delete/{id}', 'AttributesController@destroy')->name('admin.attributes.delete');
    });
    ######################################## End  attributes  routes #########################################################

    ######################################## start options routes ##########################################
    Route::group(['prefix' => 'options'], function () {
        Route::get('/', 'OptionsController@index')->name('admin.options');
        Route::get('/create', 'OptionsController@create')->name('admin.options.create');
        Route::post('/store', 'OptionsController@store')->name('admin.options.store');
        Route::get('/edit/{id}', 'OptionsController@edit')->name('admin.options.edit');
        Route::post('/update/{id}', 'OptionsController@update')->name('admin.options.update');
        Route::get('/delete/{id}', 'OptionsController@destroy')->name('admin.options.delete');
    });
    ######################################## End  options  routes #########################################################

    ######################################## start slider routes ##########################################
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/create_sliders', 'SliderController@createSliderImages')->name('admin.sliders.create-images');
        Route::post('/save_sliders', 'SliderController@saveSliderImages')->name('admin.sliders.images.store');
        Route::post('/store_sliders', 'SliderController@endSliderImages')->name('admin.sliders.save-db');
        Route::get('/delete_sliders/{image_id}', 'SliderController@deleteSliderImages')->name('admin.sliders.delete-images');
    });
    ######################################## End slider routes ##########################################


    ######################################## start orders routes ##########################################
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/orders', 'OrdersController@index')->name('admin.orders');
        Route::get('/product_orders', 'OrdersController@indexProducts')->name('admin.products_orders');
        Route::get('/delete_orders/{id}', 'OrdersController@deleteOrder')->name('admin.orders.delete');
        Route::get('/delete_product_orders/{id}', 'OrdersController@deleteProductOrder')->name('admin.products_orders.delete');
    });
    ######################################## End  orders  routes #########################################################

    });
    ######################################## End  slider  routes #########################################################

    ######################################## start roles routes ##########################################
    Route::group(['prefix' => 'roles','middleware'=>'can:roles'], function () {
        Route::get('/', 'RolesController@index')->name('admin.roles');
        Route::get('/create', 'RolesController@create')->name('admin.roles.create');
        Route::post('/store', 'RolesController@store')->name('admin.roles.store');
        Route::get('/edit/{id}', 'RolesController@edit')->name('admin.roles.edit');
        Route::post('/update/{id}', 'RolesController@update')->name('admin.roles.update');
    });
    ######################################## End  roles  routes #########################################################

    ######################################## start roles routes ##########################################
    Route::group(['prefix' => 'users','middleware'=>'can:users'], function () {
        Route::get('/', 'UsersController@index')->name('admin.users');
        Route::get('/create', 'UsersController@create')->name('admin.users.create');
        Route::post('/store', 'UsersController@store')->name('admin.users.store');
    });
    ######################################## End  roles  routes #########################################################

});

    ####################### Start admin login routes ############################
Route::group(['namespace'=>'App\Http\Controllers\Dashboard','middleware'=>'guest:admin'],function () {
    Route::get('login',"loginController@getLogin")->name('admin.login');
    Route::post('login',"loginController@postLogin")->name('admin.post.login');
});
    ####################### End admin login routes ############################

});
