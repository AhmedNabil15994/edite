<?php

/*----------------------------------------------------------
Home
----------------------------------------------------------*/
Route::group(['prefix' => '/'] , function () {
    Route::get('/', 'HomeControllers@index');
    Route::post('/contactUs', 'HomeControllers@postContactUs');

    Route::get('/events', 'HomeControllers@events');
    Route::get('/registeration', 'HomeControllers@registeration');
    Route::post('/registeration', 'HomeControllers@postOrder');
    Route::get('/done', 'HomeControllers@done');

    Route::get('/registeration/{id}', 'HomeControllers@registerationCheck');
    Route::post('/registeration/{id}', 'HomeControllers@postRegisterationCheck');
    
    Route::get('/complete/{id}', 'HomeControllers@complete');
    Route::post('/complete/{id}', 'HomeControllers@postComplete');

    Route::get('/payment/{id}', 'HomeControllers@payment');
    Route::get('/paymentGateway/{type}','HomeControllers@paymentGateway');
    Route::get('/checkPayment', 'HomeControllers@checkPayment');
    Route::get('/paymentFailed', 'HomeControllers@paymentFailed');
    Route::get('/paymentSuccess', 'HomeControllers@paymentSuccess');

    Route::get('/verify', 'HomeControllers@verify');
    Route::post('/verify', 'HomeControllers@postVerify');
});
