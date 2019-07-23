@extends('student.auth.app')

@section('content')

    <form class="form-horizontal card" role="form" method="POST" action="{{ url('password/reset') }}">
        {{ csrf_field() }}
     
        <div class="card-body p-6">
           @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
           @endif
          <div class="card-title">{{ __('Reset Password') }}</div>
             <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">E-Mail Address</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Password</label>
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="control-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
            </div>
        </div>
    </form>
@endsection
