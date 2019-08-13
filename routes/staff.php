<?php

Route::get('/dashboard',[
	'as'=>'dashboard.index',
	'uses' => 'Staff\DashboardController@index'
]);


Route::group(['prefix' => 'application'], function () {
	Route::get('/',[
		'as'=>'application.index',
		'uses' => 'Staff\ApplicationController@index'
	]);
	Route::post('/',[
		'as'=>'application.index',
		'uses' => 'Staff\ApplicationController@indexExport'
	]);
	Route::get('/create',[
		'as'=>'application.create',
		'uses' => 'Staff\ApplicationController@create'
	]);
	Route::post('/create',[
		'as'=>'application.store',
		'uses' => 'Staff\ApplicationController@store'
	]);
	Route::get('/show/{application}',[
		'as'=>'application.show',
		'uses' => 'Staff\ApplicationController@show'
	]);
	Route::get('/edit/{application}',[
		'as'=>'application.edit',
		'uses' => 'Staff\ApplicationController@edit'
	]);
	Route::post('/edit/{application}',[
		'as'=>'application.update',
		'uses' => 'Staff\ApplicationController@update'
	]);
	Route::get('/delete/{application}',[
		'as'=>'application.delete',
		'uses' => 'Staff\ApplicationController@destroy'
	]);
	Route::post('/verify/{application}',[
		'as'=>'application.verify',
		'uses' => 'Staff\ApplicationController@verify'
	]);
	Route::post('/on-hold/{application}',[
		'as'=>'application.on-hold',
		'uses' => 'Staff\ApplicationController@onHold'
	]);
	Route::post('/reject/{application}',[
		'as'=>'application.reject',
		'uses' => 'Staff\ApplicationController@reject'
	]);
	// Route::post('/select/{application}',[
	// 	'as'=>'application.select',
	// 	'uses' => 'Staff\ApplicationController@select'
	// ]);
	Route::get('/download-application/{application}',[
		'as'=>'application.download-application',
		'uses' => 'Staff\ApplicationController@downloadApplication'
	]);

	Route::get("/live-merit-list", [
		'as'=>'application.live-merit-list',
		'uses' => 'Staff\ApplicationController@liveMeritList'
	]);
	Route::get("/live-seat-available", [
		'as'=>'application.live-seat-available',
		'uses' => 'Staff\ApplicationController@liveSeatAvailable'
	]);
	Route::get('/i-card',[
		'as'=>'application.i-card',
		'uses' => 'Staff\ApplicationController@icard'
	]);

	Route::post('/i-card',[
		'as'=>'application.i-card.show',
		'uses' => 'Staff\ApplicationController@showIcard'
	]);

    // subject allocation of application

    Route::group(['prefix' => 'subject-allocation'], function () {
        Route::get('/create/{application}',[
            'as'=>'subject-allocation.create',
            'uses' => 'Staff\SubjectAllocationController@create'
        ]);
        Route::post('/create/{application}',[
            'as'=>'subject-allocation.store',
            'uses' => 'Staff\SubjectAllocationController@store'
        ]);
        Route::get('/edit/{application}',[
            'as'=>'subject-allocation.edit',
            'uses' => 'Staff\SubjectAllocationController@edit'
        ]);
        Route::post('/edit/{application}',[
            'as'=>'subject-allocation.update',
            'uses' => 'Staff\SubjectAllocationController@update'
        ]);
        Route::get('/show/{application}',[
            'as'=>'subject-allocation.show',
            'uses' => 'Staff\SubjectAllocationController@show'
        ]);
    });
});

Route::group(['prefix' => 'admission'], function () {
	Route::get('/create/{application}',[
		'as'=>'admission.create',
		'uses' => 'Staff\AdmissionController@create'
	]);
	Route::post('/create/{application}',[
		'as'=>'admission.store',
		'uses' => 'Staff\AdmissionController@store'
	]);
	Route::get('/receipt/{application}',[
		'as'=>'admission.receipt',
		'uses' => 'Staff\AdmissionController@receipt'
    ]);
    Route::post('/receipt-collected-by-update/',[
		'as'=>'admission.receipt-collected-by-update',
		'uses' => 'Staff\AdmissionController@receiptCollectedByUpdate'
	]);
});

// Route::group(['prefix' => 'fee-head'], function () {
// 	Route::get('/',[
// 		'as'=>'fee-head.index',
// 		'uses' => 'Staff\FeeHeadController@index'
// 	]);
// 	Route::get('/create',[
// 		'as'=>'fee-head.create',
// 		'uses' => 'Staff\FeeHeadController@create'
// 	]);
// 	Route::post('/create',[
// 		'as'=>'fee-head.store',
// 		'uses' => 'Staff\FeeHeadController@store'
// 	]);
// 	Route::get('/show/{fee_head}',[
// 		'as'=>'fee-head.show',
// 		'uses' => 'Staff\FeeHeadController@show'
// 	]);
// 	Route::get('/edit/{fee_head}',[
// 		'as'=>'fee-head.edit',
// 		'uses' => 'Staff\FeeHeadController@edit'
// 	]);
// 	Route::post('/edit/{fee_head}',[
// 		'as'=>'fee-head.update',
// 		'uses' => 'Staff\FeeHeadController@update'
// 	]);
// 	Route::get('/delete/{fee_head}',[
// 		'as'=>'fee-head.delete',
// 		'uses' => 'Staff\FeeHeadController@destroy'
// 	]);
// });
// Route::group(['prefix' => 'fee'], function () {
// 	Route::get('/',[
// 		'as'=>'fee.index',
// 		'uses' => 'Staff\FeeController@index'
// 	]);
// 	Route::get('/create',[
// 		'as'=>'fee.create',
// 		'uses' => 'Staff\FeeController@create'
// 	]);
// 	Route::post('/create',[
// 		'as'=>'fee.store',
// 		'uses' => 'Staff\FeeController@store'
// 	]);
// 	Route::get('/show/{fee_head}',[
// 		'as'=>'fee.show',
// 		'uses' => 'Staff\FeeController@show'
// 	]);
// 	Route::get('/edit/{fee_head}',[
// 		'as'=>'fee.edit',
// 		'uses' => 'Staff\FeeController@edit'
// 	]);
// 	Route::post('/edit/{fee_head}',[
// 		'as'=>'fee.update',
// 		'uses' => 'Staff\FeeController@update'
// 	]);
// 	Route::get('/delete/{fee_head}',[
// 		'as'=>'fee.delete',
// 		'uses' => 'Staff\FeeController@destroy'
// 	]);
// });

