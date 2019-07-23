@extends('common.admin-app')
@section('title')
Staff
@endsection

@section('css')
@stop

@section('content')

<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          {{ csrf_field() }}
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-auto mr-auto">
                <h3 class="card-title">Staff</h3>
              </div>
              <div class="col-auto">
                <a href="{{route('admin.staff.index')}}" class="btn btn-success">Staff List</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form name="application" id="application" method="post" action="{{route('admin.staff.update',$staff->uuid)}}">
              @csrf
              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{$staff->name}}" name="name" placeholder="Name" autocomplete="off" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" value="{{$staff->username}}" name="username" placeholder="Username" autocomplete="off" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Password(If you want to change or leave blank)</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                  </div>
                </div>
              </div>

            </div>
            <div class="card-footer text-right">
              <div class="d-flex">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
@stop


