@extends('student.auth.app')
@section('title')
Login
@endsection
@section('content')
<div class="card">
    <div class="card-body p-6">
        <div class="card-title">Student Login Form</div>
        @include('common/layouts/alert')
        <form action="{{ route('student.login') }}" method="post">
            @csrf
            <div class="form-group">
                <label class="form-label">Mobile No</label>
                <input type="number" name="mobile_no" value="{{ old('mobile_no') }}" class="form-control"
                    placeholder="Mobile No" required autofocus>
                @if ($errors->has('mobile_no'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mobile_no') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">
                    Password
                </label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                    placeholder="Password">
                <label class="form-label">
                    <a href="{{route("password.reset")}}" class="float-right small">I forgot password</a>
                </label>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">Sign In (Already Registered)</button>
                @if(config('constants.current_time') >= strtotime(config('constants.apply_up_time')) &&
                config('constants.current_time') <= strtotime(config('constants.apply_down_time'))) <a
                    href="{{route('student.register')}}" class="btn btn-info btn-block">Sign Up (New Registration)</a>
                    @endif
            </div>
        </form>
    </div>
</div>
@if(config('constants.current_time') >= strtotime(config('constants.admission_up_time')) &&
config('constants.current_time') <= strtotime(config('constants.admission_down_time'))) <div class="card">
    <div class="card-body p-6">
        <div class="card-title">Renewal Form</div>
        @include('common/layouts/alert')
        <form action="{{ route('student.renewal.login') }}" method="post">
            @csrf
            <div class="form-group">
                <label class="form-label">UID</label>
                <input type="text" name="uid" value="{{ old('uid') }}" class="form-control" placeholder="UID" required
                    autofocus>
                @if (Session::has('error_uid'))
                <span class="invalid-feedback" role="alert" style="display: contents">
                    <strong>{{ Session::get('error_uid') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">Sign In (Already Admitted)</button>
                @if(config('constants.current_time') >= strtotime(config('constants.apply_up_time')) &&
                config('constants.current_time') <= strtotime(config('constants.apply_down_time'))) <a
                    href="{{route('student.register')}}" class="btn btn-info btn-block">Sign Up (New Registration)</a>
                    @endif
            </div>
        </form>
    </div>
    </div>
    @endif

    @endsection
