<?php

Route::get('/', array('as' => 'auth.index', 'uses' => 'AuthController@index'));



Route::group(['middleware'=>['web']],function(){
    Route::group(['prefix' => 'auth'], function (){

        Route::get('login',array('as' => 'auth.login', 'uses' => 'AuthController@login'));
        Route::post('login',array('as' => 'login.attempt', 'uses' => 'AuthController@attempt'));


        Route::get('register',array('as' => 'auth.register', 'uses' => 'AuthController@register'));
        Route::post('register',array('as' => 'register.create', 'uses' => 'AuthController@create'));


        Route::post('logout',array('as'=>'auth.logout', 'uses'=>'AuthController@logout'));



    });

    Route::group(['prefix' => 'dashboard','middleware'=>'auth'],function (){
        Route::get('/',array('as' => 'dashboard', 'uses' => 'DashboardController@index'));


    });

    Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset','Auth\ResetPasswordController@reset');




    Route::get('/perfil',array('as' => 'perfil', 'uses' => 'DashboardController@perfil'));


    Route::get('listEstados/{id}', 'AjaxController@listEstados');
    Route::get('listCidades/{id}', 'AjaxController@listCidades');


    Route::resource('pais','PaisController');
    Route::resource('estados','EstadoController');
    Route::resource('cidades','CidadeController');


    Route::resource('marcas','MarcaController');




});
