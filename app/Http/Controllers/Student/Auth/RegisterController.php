<?php

namespace App\Http\Controllers\Student\Auth;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Str, Session, Log;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/application';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('student.auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($student = $this->create($request->all())));

        $message = $student->otp." is your OTP.";

        $mobile = $student->mobile_no;

        sendSMS($mobile,$message);
        session(['student' => $student]);
        return redirect()->route('student.otp');
    }

    public function otp(Request $request)
    {
        return view('student.auth.otp');
    }

    public function otpCheck(Request $request)
    {
        $student = session('student');
        if($request->otp==(int)$student->otp){
            $student->is_otp_verified = 1;
            $student->save();
            $this->guard()->login($student);
            Session::flash('success','Otp Verified Successfully');
            return redirect($this->redirectPath());
        }else{
            Session::flash('error','Invalid Otp');
            return back();
        }
    }

    public function otpResend(Request $request)
    {
        $message = session()->get('student')->otp." is your OTP.";

        $mobile = session()->get('student')->mobile_no;

        sendSMS($mobile,$message);
        Session::flash('success','Otp Send Successfully');
        return back();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobile_no' => ['required', 'numeric', 'unique:students'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(Student::count() == 0){
            \DB::statement('ALTER TABLE students AUTO_INCREMENT = 1000;');
        }


        return Student::create([
            'uuid' => (String) Str::uuid(),
            'name' => $data['name'],
            'mobile_no' => $data['mobile_no'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'otp' => $this->generateOpt(),
        ]);
    }

    protected function generateOpt()
    {
        $otp = mt_rand(100000, 999999);
        return $otp;
    }
}
