<?php

// 工作总结列表页
Route::get('/summaries', '\\App\Http\Controllers\SummaryController@index');
// 创建工作总结
Route::get('/summaries/create', '\App\Http\Controllers\SummaryController@create');
Route::post('/summaries', '\App\Http\Controllers\SummaryController@store');
// 工作总结详情页
Route::get('/summaries/{summary}', '\App\Http\Controllers\SummaryController@show');
// 编辑工作总结
Route::get('/summaries/{summary}\edit', '\App\Http\Controllers\SummaryController@edit');
Route::put('/summaries/{summary}', '\App\Http\Controllers\SummaryController@update');
// 删除工作总结
Route::get('/summaries/delete', '\App\Http\Controllers\SummaryController@delete');