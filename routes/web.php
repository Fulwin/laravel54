<?php

// 会话
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

// 用户激活
Route::get('activation/confirm/{token}', 'UsersController@confirmEmail')->name('confirm.email');

// 重置密码
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// 需要登陆才能访问的页面
Route::group(['middleware' => 'auth:web'], function () {
    // 静态页
    Route::get('/', 'StaticPagesController@home')->name('home');
    Route::get('/help', 'StaticPagesController@help')->name('help');
    Route::get('/about', 'StaticPagesController@about')->name('about');

    // 工作总结
    Route::resource('summaries', 'SummariesController');

    // 用户管理
    Route::resource('users', 'UsersController');

    // 软件管理
    Route::resource('softwares', 'SoftwareController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
});