<?php

// 工作总结列表页
Route::get('/summarys', '\\App\Http\Controllers\SummaryController@index');
// 工作总结详情页
Route::get('/summarys/{summary}', '\App\Http\Controllers\SummaryController@show');
// 创建工作总结
Route::get('/summarys/create', '\App\Http\Controllers\SummaryController@create');
Route::post('/summarys', '\App\Http\Controllers\SummaryController@store');
// 编辑工作总结
Route::get('/summarys/{summary}\edit', '\App\Http\Controllers\SummaryController@edit');
Route::put('/summarys/{summary}', '\App\Http\Controllers\SummaryController@update');
// 删除工作总结
Route::get('/summarys/delete', '\App\Http\Controllers\SummaryController@delete');