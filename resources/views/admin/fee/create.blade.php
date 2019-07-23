@extends('common.admin-app')
@section('title')
Fee 
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
  .free-class input{
    border: 1px dotted red;
    background: #cec8c8;
  }
  .required-class{
    background: #f7eef1;
  }

</style>
@stop

@section('content')
<div class="row">
  <div class="col-12">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form name="application" id="application" method="post" action="{{route('admin.fee.store')}}" autocomplete="off">
              <div class="card-header">
                <div class="row justify-content-between">
                  <div class="col-auto mr-auto">
                    <h3 class="card-title">Fee </h3>
                  </div>
                  <div class="col-auto">
                    <a href="{{route('admin.fee.index')}}" class="btn btn-success">Fee List</a>
                  </div>
                </div>
              </div>
              @include('admin.fee.form')
              <div class="card-footer text-right">
                <div class="d-flex">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
@include('admin.fee.js')
@stop