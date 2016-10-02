<?php

Route::group(['prefix' => 'api/v1' ,'middleware' =>'api'],function()
{
    Route::get('lessions/{id}/tags', 'TagsController@index');
    Route::resource('lessions','LessionsController');
    Route::resource('tags','TagsController');
});





