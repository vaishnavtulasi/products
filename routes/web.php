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

Route::redirect('/', 'admin/login');

Route::group(['namespace' => 'Auth' ], function (){

    Route::group(['middleware' => 'guest:web'], function (){

        Route::get('register', 'RegisterController@register')->name('register');
        Route::post('register', 'RegisterController@postRegister')->name('post:register');

        Route::get('verify/{approveId}','RegisterController@verifyUser')->name('approve');

        Route::get('login' , 'LoginController@login')->name('login');
        Route::post('login' , 'LoginController@postLogin')->name('checkuser');

   });

    Route::group(['middleware' => 'auth:web'], function (){

        Route::get('logout' , 'LoginController@logout')->name('logout');

        Route::view('home', 'welcome')->name('home');
    });

});


Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function(){

    Route::group(['middleware' => 'guest:admin'], function (){

        Route::get('login' , 'LoginController@index')->name('admin.login');

        Route::post('checkAdmin' , 'LoginController@checkAdmin')->name('admin.checkAdmin');

    });
    Route::group(['middleware' => 'auth:admin' ], function (){

        Route::get('home' , 'HomeController@goToHomePage')->name('admin.home');

        Route::resource('users', 'UsersListController');

        Route::resource('categories', 'CategoryController');

        Route::get('logout' , 'LoginController@getLogout')->name('admin.logout');

    });


});



