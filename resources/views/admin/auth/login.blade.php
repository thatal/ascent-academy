@extends('admin.auth.app')
@section('title')
Login
@endsection
@section('content')

<form class="card" action="{{route('admin.login')}}" method="post">
  @if ($errors)
  @foreach($errors as $error)
  {{$error}}
  @endforeach
  @endif
  @if(Auth::check())
  {{Auth::user()->name}}
  @endif
  <div class="card-body p-6">
    <div class="card-title">Login to admin account</div>
    @include('common/layouts/alert')
    @csrf
    <div class="form-group">
      <label class="form-label">User Name</label>
      <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User Name" required autofocus>
      @if ($errors->has('username'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('username') }}</strong>
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
  <div class="form-footer">
    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
  </div>
</div>
</form>

  @endsection
