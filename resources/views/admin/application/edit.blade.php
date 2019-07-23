@extends('common.admin-app')
@section('title')
Application
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
                <h3 class="card-title">Application</h3>
              </div>
            </div>
          </div>
          <form name="application" id="application" method="post" action="{{route('admin.application.update',[$application->uuid])}}">

            @include('common/application/edit')

            <div class="card-footer text-right">
              <div class="d-flex">
                <button type="submit" class="btn btn-primary">Submit</button>
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
@include('common/application/js')


@stop