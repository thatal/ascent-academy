@extends('student.auth.app')
@section('title')
Register
@endsection
@section('content')

<form class="card" action="{{ route('student.register') }}" method="post">
  @if ($errors)
  @foreach($errors as $error)
  {{$error}}
  @endforeach
  @endif
  @if(Auth::check())
  {{Auth::user()->name}}
  @endif
  <div class="card-body p-6">
    <div class="card-title">Student Registration Form</div>
    @include('common/layouts/alert')
    @csrf
    <div class="form-group">
      <label class="form-label">Name</label>
      <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" required autofocus>
      @if ($errors->has('name'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label class="form-label">Mobile No</label>
      <input type="number" name="mobile_no" value="{{ old('mobile_no') }}" class="form-control" placeholder="Mobile No" required>
      @if ($errors->has('mobile_no'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mobile_no') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label class="form-label">Email</label>
      <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
      @if ($errors->has('email'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label class="form-label">
        Password
      </label>
      <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
      @if ($errors->has('password'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label class="form-label">
        Confirm Password
      </label>
      <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" placeholder="Confirm Password">
      {{-- <label class="form-label">
        <a href="{{ route('student.password.request') }}" class="float-right small">I forgot password</a>
      </label> --}}
      @if ($errors->has('password'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
  </div>
  <div class="form-footer">
    <button type="submit" class="btn btn-primary btn-block">Sign Up (New Registration)</button>
    <a href="{{route('student.login')}}" class="btn btn-info btn-block">Sign In (Already Registered)</a>
  </div>
</div>
</form>

@endsection
