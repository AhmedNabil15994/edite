<?php

/*----------------------------------------------------------
User Card
----------------------------------------------------------*/
Route::group(['prefix' => '/userCards'] , function () {
    Route::get('/', 'UserCardControllers@index');
    Route::get('/charts', 'UserCardControllers@charts');
    Route::post('/fastEdit', 'UserCardControllers@fastEdit');
    Route::get('/delete/{id}', 'UserCardControllers@delete');
});