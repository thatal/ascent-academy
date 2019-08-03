<?php

Route::get('/dashboard',[
	'as'=>'dashboard.index',
	'uses' => 'Admin\DashboardController@index'
]);


Route::group(['prefix' => 'application'], function () {
	Route::get('/',[
		'as'=>'application.index',
		'uses' => 'Admin\ApplicationController@index'
	]);
	Route::post('/',[
		'as'=>'application.index',
		'uses' => 'Admin\ApplicationController@indexExport'
	]);
	Route::get('/create',[
		'as'=>'application.create',
		'uses' => 'Admin\ApplicationController@create'
	]);
	Route::post('/create',[
		'as'=>'application.store',
		'uses' => 'Admin\ApplicationController@store'
	]);
	Route::get('/show/{application}',[
		'as'=>'application.show',
		'uses' => 'Admin\ApplicationController@show'
	]);
	Route::get('/edit/{application}',[
		'as'=>'application.edit',
		'uses' => 'Admin\ApplicationController@edit'
	]);
	Route::post('/edit/{application}',[
		'as'=>'application.update',
		'uses' => 'Admin\ApplicationController@update'
	]);
	Route::get('/delete/{application}',[
		'as'=>'application.delete',
		'uses' => 'Admin\ApplicationController@destroy'
	]);
	Route::post('/verify/{application}',[
		'as'=>'application.verify',
		'uses' => 'Admin\ApplicationController@verify'
	]);
	Route::post('/on-hold/{application}',[
		'as'=>'application.on-hold',
		'uses' => 'Admin\ApplicationController@onHold'
	]);
	Route::post('/reject/{application}',[
		'as'=>'application.reject',
		'uses' => 'Admin\ApplicationController@reject'
	]);


	// Route::post('/select/{application}',[
	// 	'as'=>'application.select',
	// 	'uses' => 'Admin\ApplicationController@select'
	// ]);
	Route::get('/download-application/{application}',[
		'as'=>'application.download-application',
		'uses' => 'Admin\ApplicationController@downloadApplication'
	]);
	Route::get("/live-merit-list", [
		'as'=>'application.live-merit-list',
		'uses' => 'Admin\ApplicationController@liveMeritList'
	]);
	Route::get("/live-seat-available", [
		'as'=>'application.live-seat-available',
		'uses' => 'Admin\ApplicationController@liveSeatAvailable'
	]);
	Route::get('/i-card',[
		'as'=>'application.i-card',
		'uses' => 'Admin\ApplicationController@icard'
	]);

	Route::post('/i-card',[
		'as'=>'application.i-card.show',
		'uses' => 'Admin\ApplicationController@showIcard'
	]);

    // Subject allocation of application.
    Route::group(['prefix' => 'subject-allocation'], function () {
        Route::get('/create/{application}',[
            'as'=>'subject-allocation.create',
            'uses' => 'Admin\SubjectAllocationController@create'
        ]);
        Route::post('/create/{application}',[
            'as'=>'subject-allocation.store',
            'uses' => 'Admin\SubjectAllocationController@store'
        ]);
        Route::get('/edit/{application}',[
            'as'=>'subject-allocation.edit',
            'uses' => 'Admin\SubjectAllocationController@edit'
        ]);
        Route::post('/edit/{application}',[
            'as'=>'subject-allocation.update',
            'uses' => 'Admin\SubjectAllocationController@update'
        ]);
        Route::get('/show/{application}',[
            'as'=>'subject-allocation.show',
            'uses' => 'Admin\SubjectAllocationController@show'
        ]);
    });
});

Route::group(['prefix' => 'admission'], function () {
	Route::get('/create/{application}',[
		'as'=>'admission.create',
		'uses' => 'Admin\AdmissionController@create'
	]);
	Route::post('/create/{application}',[
		'as'=>'admission.store',
		'uses' => 'Admin\AdmissionController@store'
	]);
	Route::get('/receipt/{application}',[
		'as'=>'admission.receipt',
		'uses' => 'Admin\AdmissionController@receipt'
	]);
});

Route::group(['prefix' => 'fee-head'], function () {
	Route::get('/',[
		'as'=>'fee-head.index',
		'uses' => 'Admin\FeeHeadController@index'
	]);
	Route::get('/create',[
		'as'=>'fee-head.create',
		'uses' => 'Admin\FeeHeadController@create'
	]);
	Route::post('/create',[
		'as'=>'fee-head.store',
		'uses' => 'Admin\FeeHeadController@store'
	]);
	Route::get('/show/{fee_head}',[
		'as'=>'fee-head.show',
		'uses' => 'Admin\FeeHeadController@show'
	]);
	Route::get('/edit/{fee_head}',[
		'as'=>'fee-head.edit',
		'uses' => 'Admin\FeeHeadController@edit'
	]);
	Route::post('/edit/{fee_head}',[
		'as'=>'fee-head.update',
		'uses' => 'Admin\FeeHeadController@update'
	]);
	Route::get('/delete/{fee_head}',[
		'as'=>'fee-head.delete',
		'uses' => 'Admin\FeeHeadController@destroy'
	]);
});
Route::group(['prefix' => 'fee'], function () {
	Route::get('/',[
		'as'=>'fee.index',
		'uses' => 'Admin\FeeController@index'
	]);
	Route::get('/create',[
		'as'=>'fee.create',
		'uses' => 'Admin\FeeController@create'
	]);
	Route::post('/create',[
		'as'=>'fee.store',
		'uses' => 'Admin\FeeController@store'
	]);
	Route::get('/show/{fee}',[
		'as'=>'fee.show',
		'uses' => 'Admin\FeeController@show'
	]);
	Route::get('/edit/{fee}',[
		'as'=>'fee.edit',
		'uses' => 'Admin\FeeController@edit'
	]);
	Route::post('/edit/{fee}',[
		'as'=>'fee.update',
		'uses' => 'Admin\FeeController@update'
	]);
	Route::get('/delete/{fee}',[
		'as'=>'fee.delete',
		'uses' => 'Admin\FeeController@destroy'
	]);
});
Route::group(['prefix' => 'staff'], function () {
	Route::get('/',[
		'as'=>'staff.index',
		'uses' => 'Admin\StaffController@index'
	]);
	Route::get('/create',[
		'as'=>'staff.create',
		'uses' => 'Admin\StaffController@create'
	]);
	Route::post('/create',[
		'as'=>'staff.store',
		'uses' => 'Admin\StaffController@store'
	]);
	Route::get('/show/{staff}',[
		'as'=>'staff.show',
		'uses' => 'Admin\StaffController@show'
	]);
	Route::get('/edit/{staff}',[
		'as'=>'staff.edit',
		'uses' => 'Admin\StaffController@edit'
	]);
	Route::post('/edit/{staff}',[
		'as'=>'staff.update',
		'uses' => 'Admin\StaffController@update'
	]);
	Route::get('/delete/{staff}',[
		'as'=>'staff.delete',
		'uses' => 'Admin\StaffController@destroy'
	]);
});

Route::group(['prefix' => 'report'], function () {
	Route::get('/application-fees-collection',[
		'as'=>'report.application-fees-collection.index',
		'uses' => 'Admin\ReportController@applicationFeeCollection'
    ]);
    Route::get('/receipt',[
		'as'=>'report.receipt.index',
		'uses' => 'Admin\ReportController@receipt'
	]);
});

Route::group(['prefix' => 'miscellaneous'], function () {
	Route::get('/online-application-fee-create',[
		'as'=>'miscellaneous.online-application-fee.create',
		'uses' => 'Admin\MiscellaneousController@ApplicationFeeCreate'
    ]);
    Route::post('/online-application-fee-create',[
		'as'=>'miscellaneous.online-application-fee.store',
		'uses' => 'Admin\MiscellaneousController@ApplicationFeeStore'
    ]);
    Route::get('/online-admission-fee-create',[
		'as'=>'miscellaneous.online-admission-fee.create',
		'uses' => 'Admin\MiscellaneousController@AdmissionFeeCreate'
    ]);
    Route::post('/online-admission-fee-create',[
		'as'=>'miscellaneous.online-admission-fee.store',
		'uses' => 'Admin\MiscellaneousController@AdmissionFeeStore'
	]);
});


