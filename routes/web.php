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
//Frontend
Route::group(['prefix' => ''], function () {
    Route::get('home','Client\HomeController@home');
    Route::get('about','Client\AboutController@about');
    Route::get('contact','Client\ContactController@contact');

    Route::group(['prefix' => 'product'], function () {
        Route::get('cart','Client\SearchController@cart');
        Route::get('','Client\SearchController@search');
        Route::get('success','Client\SearchController@success');
        Route::get('checkout','Client\SearchController@checkout');
        Route::get('detail/{id}','Client\SearchController@detail');
    });




});



//login
       Route::group(['middleware' => ['CheckLogout']], function () {
        Route::get('login','Admin\LoginController@get_login');
        Route::post('login','Admin\LoginController@post_login');
       });
//backend
Route::group(['prefix' => 'admin','namespace'=>'Admin','middleware'=>'CheckLogin'], function () {







        //logout
        Route::get('logout','LoginController@Logout');
        //dashboard
        Route::get('/','DashboardController@index');

        // Admin Product
        Route::group(['prefix' => 'product'], function () {
            Route::get('/add','ProductController@add_product');
            Route::post('/add','ProductController@post_add_product');
            Route::get('/','ProductController@list_product');
            Route::get('/edit/{id}','ProductController@edit_product');
            Route::post('/edit/{id}','ProductController@post_edit_product');
            Route::get('/del/{id}','ProductController@del_product');
            // Route::put('/{product}','ProductController@update');
            // Route::delete('/{product}','ProductController@destroy');

            //attribute
            Route::get('/edit-attr/{id}','ProductController@edit_attr');
            Route::post('/edit-attr/{id}','ProductController@post_edit_attr');
            Route::get('/del-attr/{id}','ProductController@del_attr');

            Route::post('/add-attr','ProductController@post_add_attr');
            Route::get('/detail-attr','ProductController@detail_attr');
            //variant
            Route::get('/edit-variant/{id}','ProductController@edit_variant');
            Route::get('/add-variant/{id}','ProductController@add_variant');
            Route::post('/add-variant/{id}','ProductController@post_add_variant');
            Route::get('/del-variant/{id}','ProductController@del_variant');
            //values
            Route::get('/edit-value','ProductController@edit_value');
            Route::post('/add-value','ProductController@post_add_value');

         });


        // Admin User
        Route::group(['prefix' => 'user'], function() {
            Route::get('/add-user','UserController@add_user');
            Route::post('/add-user','UserController@post_add_user');

            Route::get('/edit/{id}','UserController@edit_user');
            Route::post('/edit/{id}','UserController@post_edit_user');

            Route::get('/','UserController@list_user');

            Route::get('/del-user/{id}','UserController@del_user');
        });

        // Admin Categories
        Route::group(['prefix' => 'category'], function() {
            Route::get('/','CategoryController@list_category');

            Route::get('/add','CategoryController@add_category');
            Route::post('/','CategoryController@post_add_category');



            Route::get('/edit/{cat_id}','CategoryController@edit_category');
            Route::post('/edit/{cat_id}','CategoryController@post_edit_category');

            Route::get('/del/{cat_id}','CategoryController@del_category');


        });

        // Admin Order
        Route::group(['prefix' => 'order'], function () {
            Route::get('/','OrderController@list_order');
            Route::get('/edit','OrderController@detail_order');
            Route::get('/process','OrderController@process_order');
        });

        //attribute

    // });


});


