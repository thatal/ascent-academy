@extends('admin.auth.app')
@section('title')
Login
@endsection
@section('content')

<form class="card" action="{{ route('password.update') }}" method="post">
  @csrf

  <input type="hidden" name="token" value="{{ $token }}">
 
    <div class="card-body p-6">
       @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
       @endif
      <div class="card-title">{{ __('Reset Password') }}</div>
     
      <div class="form-group">
        <label class="form-label">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label class="form-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label class="form-label">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

        @if ($errors->has('password_confirmation'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
    
<div class="form-group">
</div>
<div class="form-footer">
    <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
</div>
</div>
</form>

@endsection

