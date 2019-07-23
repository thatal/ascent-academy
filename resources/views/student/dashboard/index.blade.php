@extends('common.student-app')
@section('title')
Student Dashboard
@endsection

@section('css')
@stop


@section('content')

<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-auto mr-auto">
                <h3 class="card-title">Application List</h3>
              </div>
              <div class="col-auto">
                @if(auth()->user()->uid)
                UID : {{auth()->user()->uid}}
                @endif
                <a href="{{route('student.application.create')}}" class="btn btn-primary">Apply</a>
              </div>
            </div>
          </div>
          @include('student/application/list')
          <div class="card-footer text-right">
            <div class="d-flex">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('js')

@stop


