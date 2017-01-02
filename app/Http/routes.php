<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth.checkrole:admin'], function () {

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'CategoriesController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'CategoriesController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'CategoriesController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CategoriesController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'CategoriesController@update']);
    });


    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'ProductsController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ProductsController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ProductsController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ProductsController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ProductsController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ProductsController@destroy']);
    });

    Route::group(['prefix' => 'clients', 'as' => 'clients.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'ClientsController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ClientsController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ClientsController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ClientsController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ClientsController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ClientsController@destroy']);
    });


    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'OrdersController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'OrdersController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'OrdersController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'OrdersController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'OrdersController@update']);
    });

    Route::group(['prefix' => 'cupons', 'as' => 'cupons.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'CuponsController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'CuponsController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'CuponsController@store']);
    });
});

Route::group(['prefix' => 'costumer', 'as' => 'costumer.', 'middleware' => 'auth.checkrole:client'], function () {
    Route::get('order/create', ['as' => 'order.create', 'uses' => 'CheckoutController@create']);
    Route::post('order/store', ['as' => 'order.store', 'uses' => 'CheckoutController@store']);
    Route::get('order/', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
});

Route::post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['prefix' => 'api', 'as' => 'api.', 'middleware' => 'oauth'], function () {
    Route::group(['prefix' => 'client', 'as' => 'client.', 'middleware' => 'oauth2.checkrole:client'], function () {
        Route::resource('order', 'Api\Client\ClientCheckoutController', ['except' => ['create', 'edit', 'destroy']]);
    });

    Route::group(['prefix' => 'deliveryman', 'as' => 'deliveryman.', 'middleware' => 'oauth2.checkrole:deliveryman'], function () {
        Route::resource('order', 'Api\Deliveryman\DeliverymanCheckoutController', ['except' => ['create', 'edit', 'destroy', 'store']]);
        Route::patch('order/update-status/{id}', ['as' => 'order.update-status', 'uses' => 'Api\Deliveryman\DeliverymanCheckoutController@updateStatus']);
    });

    Route::get('authenticated', function (\CodeDelivery\Repositories\UserRepository $userRepository) {
        return $userRepository->find(Authorizer::getResourceOwnerId());
    });
});