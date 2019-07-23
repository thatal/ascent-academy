@extends('student.auth.app')
@section('title')
Login
@endsection
@section('content')



<form class="card" action="{{ route('student.login') }}" method="post">
  @if ($errors)
  @foreach($errors as $error)
  {{$error}}
  @endforeach
  @endif
  @if(Auth::check())
  {{Auth::user()->name}}
  @endif
  <div class="card-body p-6">
    <div class="card-title">Student Login Form</div>
    @include('common/layouts/alert')
    @csrf
    <div class="form-group">
      <label class="form-label">Mobile No</label>
      <input type="number" name="mobile_no" value="{{ old('mobile_no') }}" class="form-control" placeholder="Mobile No" required autofocus>
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
      <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
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
    @if(config('constants.current_time') >= strtotime(config('constants.up_time')) && config('constants.current_time') <= strtotime(config('constants.down_time')))
      <a href="{{route('student.register')}}" class="btn btn-info btn-block">Sign Up (New Registration)</a>
    @endif
  </div>
</div>
</form>

@endsection
