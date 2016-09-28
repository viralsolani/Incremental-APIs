<?php

Route::group(['prefix' => 'api/v1' ,'middleware' =>'api'],function(){
    Route::resource('lessions','LessionsController');
});





