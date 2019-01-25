<?php

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

// 工作总结列表页
Route::get('/summaries', 'SummariesController@index');
// 创建工作总结
Route::get('/summaries/create', 'SummariesController@create');
Route::post('/summaries', 'SummariesController@store');
// 工作总结详情页
Route::get('/summaries/{summary}', 'SummariesController@show');
// 编辑工作总结
Route::get('/summaries/{summary}\edit', 'SummariesController@edit');
Route::put('/summaries/{summary}', 'SummariesController@update');
// 删除工作总结
Route::get('/summaries/delete', 'SummariesController@delete');

Route::get('/users/create', 'UsersController@create')->name('users.create');