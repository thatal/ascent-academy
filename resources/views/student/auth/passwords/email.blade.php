@extends('student.auth.app')
@section('title')
Reset password
@endsection
@section('content')

<form class="card" action="{{ url('/password/email') }}" method="post">
  @csrf
 
    <div class="card-body p-6">
       @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
       @endif
      <div class="card-title">{{ __('Reset Password') }}</div>
     
      <div class="form-group">
        <label class="form-label">Email address</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    
<div class="form-group">
    {{-- <label class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
      <span class="custom-control-label">Remember me</span>
  </label> --}}
</div>
<div class="form-footer">
    <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
</div>
</div>
</form>
{{-- <div class="text-center text-muted">
    Don't have account yet? <a href="./register.html">Sign up</a>
</div> --}}

@endsection
