<?php
use App\Models\Application;
use App\Models\Student;
use App\Models\Subject;
use App\Models\TempUid;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::get('/down', function () {
    $message = Session::get('message');
    return view('errors.down', compact('message'));
})->name('down');

// Route::group(['middleware' => 'apply-time'], function () {
Route::get('/', function () {
    return redirect()->route('student.application.index');
});
Route::get('/report_calculation', ["uses" => "Admin\TestController@report_calculation", "as" => "report.report_calculation"]);
// Route::get('/dashboard',[
//   'as'=>'student.dashboard.index',
//   'uses' => 'Student\DashboardController@index'
// ]);
Route::group(['prefix' => 'application'], function () {
    Route::get('/', [
        'as' => 'student.application.index',
        'uses' => 'Student\ApplicationController@index',
    ]);
    Route::get('/create', [
        'as' => 'student.application.create',
        'uses' => 'Student\ApplicationController@create',
    ])->middleware('apply-time');
    Route::post('/create', [
        'as' => 'student.application.store',
        'uses' => 'Student\ApplicationController@store',
    ])->middleware('apply-time');
    Route::get('/show/{application}', [
        'as' => 'student.application.show',
        'uses' => 'Student\ApplicationController@show',
    ]);
    Route::get('/confirm/{application}', [
        'as' => 'student.application.confirm',
        'uses' => 'Student\ApplicationController@confirm',
    ])->middleware('apply-time');
    Route::get('/edit/{application}', [
        'as' => 'student.application.edit',
        'uses' => 'Student\ApplicationController@edit',
    ])->middleware('apply-time');
    Route::post('/edit/{application}', [
        'as' => 'student.application.update',
        'uses' => 'Student\ApplicationController@update',
    ])->middleware('apply-time');
    Route::get('/download-application/{application}', [
        'as' => 'student.application.download-application',
        'uses' => 'Student\ApplicationController@downloadApplication',
    ]);
    // for application payment
    Route::post('/make-payment', [
        'as' => 'student.application.make-payment',
        'uses' => 'Student\ApplicationController@makePayment',
    ])->middleware('apply-time');
    Route::post('/payment-response', [
        'as' => 'student.application.payment-response',
        'uses' => 'Student\ApplicationController@paymentResponse',
    ])->middleware('apply-time');
    Route::get('/payment-receipt/{application}', [
        'as' => 'student.application.payment-receipt',
        'uses' => 'Student\ApplicationController@paymentReceipt',
    ]);
});

// for admission payment
Route::group(['prefix' => 'admission'], function () {
    Route::post('/fee-detail', [
        'as' => 'student.admission.fee-detail',
        'uses' => 'Student\AdmissionController@feeDetail',
    ]);
    Route::post('/make-payment', [
        'as' => 'student.admission.make-payment',
        'uses' => 'Student\AdmissionController@makePayment',
    ])->middleware('admission-time');
    Route::post('/payment-response', [
        'as' => 'student.admission.payment-response',
        'uses' => 'Student\AdmissionController@paymentResponse',
    ])->middleware('admission-time');
    Route::get('/payment-receipt/{application}', [
        'as' => 'student.admission.payment-receipt',
        'uses' => 'Student\AdmissionController@paymentReceipt',
    ]);
});

Route::group(['prefix' => 'api'], function () {
    Route::get('/semester', [
        'as' => 'common.api.semester.index',
        'uses' => 'Common\GetController@getSemester',
    ]);
    Route::get('/subject', [
        'as' => 'common.api.subject.index',
        'uses' => 'Common\GetController@getSubjects',
    ]);
    Route::get('/moresubject', [
        'as' => 'common.api.moresubject.index',
        'uses' => 'Common\GetController@getMoreSubjects',
    ]);
});

Route::group(['prefix' => '/'], function () {
    Route::get('/login', 'Student\Auth\LoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'Student\Auth\LoginController@login');
    Route::post('/renewal/login', 'Student\Auth\LoginController@renewal')->name('student.renewal.login');
    Route::get('/logout', 'Student\Auth\LoginController@logout')->name('student.logout');

    Route::get('/renewal/personal-info', 'Student\DashboardController@personalInfoEdit')->name('student.renewal.personal-info.edit');
    Route::post('/renewal/personal-info', 'Student\DashboardController@personalInfoUpdate');

    Route::get('/register', 'Student\Auth\RegisterController@showRegistrationForm')->name('student.register')->middleware('apply-time');
    Route::get('/otp', 'Student\Auth\RegisterController@otp')->name('student.otp');
    Route::post('/otp', 'Student\Auth\RegisterController@otpCheck');
    Route::get('/otp-resend', 'Student\Auth\RegisterController@otpResend')->name('student.otp-resend');
    Route::post('/register', 'Student\Auth\RegisterController@register')->middleware('apply-time');

    Route::post('password/email', 'Student\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('password/reset', 'Student\Auth\ResetPasswordController@reset')->name('password.email');
    Route::get('password/reset', 'Student\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('password/reset/{token}', 'Student\Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
});

Route::get("/image_test", function () {
    // return response(storage_path('app/public/' . 'chart.png'));
    // return Storage::disk('public')->response('chart.png', 'chart.png');
    $file = Storage::disk('public')->get('tiger_4k.jpg', 'tiger_4k.jpg');
    // $url_file = Storage::disk('public')->url('public/tiger_4k.jpg', 'tiger_4k.jpg');
    $img = Image::make($file)->fit(500);

    return $img->response('jpg');
});
Route::get("/no-script", function () {
    dump((String) \Str::uuid());
    return bcrypt(Request::get('no'));
    return "<h1 style='text-align:center;'>Please Enable Javascript to Proceed.</h1>";
});
Route::get("/percentage-correction", ["uses" => "Admin\TestController@percentageCorrection"]);

Route::get("/add-category", ["uses" => "Admin\TestController@addCategory"]);

// Route::get("/pusher-test", ["uses" => "Admin\TestController@pusherTest"]);

Route::get("/merit-list-change", function () {
    event(new \App\Events\MeritListChange('Message'));
    return 'data send';
});

Route::get("/change-student-table-prev-student", function () {
    // dd('not authorized');
    $students = Student::whereDate('created_at', '2019-01-01 00:00:00')->get();
    foreach ($students as $student) {
        $data = [
            'uuid' => (String) Str::uuid(),
            'password' => bcrypt($student->mobile_no),
            'is_person_info_updated' => 0,
        ];
        Student::where('id', $student->id)->update($data);
    }
    dd('done');
});
Route::get("/reject-non-admitted-application", function () {
    DB::beginTransaction();
    try {
        Application::where('course_id', 1)
                                ->whereIn('status', [0, 1, 2])
                                ->whereDate('created_at', '!=', '2019-01-01 00:00:00')
                                // ->orderBy('id','DESC')
                                ->update(['status'=> 7]);
    } catch (\Exception $e) {
        DB::rollback();
        dd($e);
    }
    DB::commit();
    dd('done');
});
Route::get("/change-application-table-prev-student", function () {
    DB::beginTransaction();
    try {

        $applications = Application::whereDate('created_at', '2019-01-01 00:00:00')->get();
        foreach ($applications as $application) {
            if ($application->caste_id == 2 || $application->caste_id == 6) {
                $category_id = 2;
            } else {
                $category_id = $application->caste_id;
            }

            $data = [
                'uuid' => (String) Str::uuid(),
                'category_id' => $category_id,
            ];
            Application::where('id', $application->id)->update($data);
        }
    } catch (\Exception $e) {
        DB::rollback();
        dd($e);
    }
    DB::commit();
    dd('done');
});
Route::get("/change-subject-table-with-semester", function () {
    DB::beginTransaction();
    try {
        $subjects = Subject::get();
        foreach ($subjects as $subject) {
            if (in_array($subject->stream_id, [1, 2, 3])) {
                $data['semester_id'] = 1;
            } elseif (in_array($subject->stream_id, [4, 5, 6, 7, 8, 9, 10])) {
                $data['semester_id'] = 3;
            }
            Subject::where('id', $subject->id)->update($data);
        }
    } catch (\Exception $e) {
        DB::rollback();
        dd($e);
    }
    DB::commit();
    // dump($applications);
    dd('done');
});
Route::get("/delete-failed-student", function () {
    DB::beginTransaction();
    try {
        $failed_students = DB::table('failed_student')->get();
        foreach ($failed_students as $failed_student) {
            $temp = TempUid::where('uid',$failed_student->uid)->first();
            Student::where('id',$temp->student_id)->delete();
            TempUid::where('uid',$failed_student->uid)->delete();
        }
    } catch (\Exception $e) {
        DB::rollback();
        dd($e);
    }
    DB::commit();
    // dump($applications);
    dd('done');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\LoginController@login');
    Route::get('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

    Route::get('/register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Admin\Auth\RegisterController@register');

    Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
    Route::post('/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.password.email');
    Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
    Route::get('/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'staff'], function () {
    Route::get('/', function () {
        return redirect()->route('staff.login');
    });
    Route::get('/login', 'Staff\Auth\LoginController@showLoginForm')->name('staff.login');
    Route::post('/login', 'Staff\Auth\LoginController@login');
    Route::get('/logout', 'Staff\Auth\LoginController@logout')->name('staff.logout');

    Route::get('/register', 'Staff\Auth\RegisterController@showRegistrationForm')->name('staff.register');
    Route::post('/register', 'Staff\Auth\RegisterController@register');

    Route::post('/password/email', 'Staff\Auth\ForgotPasswordController@sendResetLinkEmail')->name('staff.password.request');
    Route::post('/password/reset', 'Staff\Auth\ResetPasswordController@reset')->name('staff.password.email');
    Route::get('/password/reset', 'Staff\Auth\ForgotPasswordController@showLinkRequestForm')->name('staff.password.reset');
    Route::get('/password/reset/{token}', 'Staff\Auth\ResetPasswordController@showResetForm');
});
