@extends('student.auth.app')
@section('title')
Otp Verification
@endsection
@section('content')

<form class="card" action="{{ route('student.otp') }}" method="post">
  @if ($errors)
  @foreach($errors as $error)
  {{$error}}
  @endforeach
  @endif
  @if(Auth::check())
  {{Auth::user()->name}}
  @endif
  <div class="card-body p-6">
    <div class="card-title">Otp Verification Form</div>
    @include('common/layouts/alert')
    @csrf

    <div class="form-group">
      <label class="form-label">Otp</label>
      <input type="number" name="otp" class="form-control" placeholder="Otp" required>
      <label class="form-label">
        <a href="{{route('student.otp-resend')}}" class="float-right small">Resend otp</a>
      </label>
    </div>
  <div class="form-footer">
    <button type="submit" class="btn btn-primary btn-block">Verify</button>
    <a href="{{route('student.login')}}" class="btn btn-info btn-block">Sign In</a>
  </div>
</div>
</form>

@endsection
