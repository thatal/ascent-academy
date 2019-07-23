@extends('common.admin-app')
@section('title')
Fee Head
@endsection

@section('css')
<style>
  .pull-right {
    float: right!important;
  }
  .margin {
    margin-left: 40px;
  }
  .error{
    color: #ff0000;
  }
</style>
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
                <h3 class="card-title">Fee Head</h3>
              </div>
              <div class="col-auto">
                <a href="{{route('admin.fee-head.index')}}" class="btn btn-success">Fee Head List</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form name="application" id="application" method="post" action="{{route('admin.fee-head.update',$fee_head->uuid)}}">
              @csrf
              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$fee_head->name}}" autocomplete="off" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Applicable On</label>
                    <select class="form-control" name="applicable_on" required>
                      <option value="">Select Applicable On</option>
                      <option value="1" {{$fee_head->applicable_on==1?'selected':''}}>Only at admission time</option>
                      <option value="2" {{$fee_head->applicable_on==2?'selected':''}}>On every semester/year</option>
                    </select>
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


