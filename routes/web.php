<?php

Route::get('/', 'StaticPagesController@home');
Route::get('/help', 'StaticPagesController@help');
Route::get('/about', 'StaticPagesController@about');

// 工作总结列表页
Route::get('/summaries', 'SummaryController@index');
// 创建工作总结
Route::get('/summaries/create', 'SummaryController@create');
Route::post('/summaries', 'SummaryController@store');
// 工作总结详情页
Route::get('/summaries/{summary}', 'SummaryController@show');
// 编辑工作总结
Route::get('/summaries/{summary}\edit', 'SummaryController@edit');
Route::put('/summaries/{summary}', 'SummaryController@update');
// 删除工作总结
Route::get('/summaries/delete', 'SummaryController@delete');