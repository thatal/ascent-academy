@extends('common.admin-app')
@section('title')
Fee
@endsection

@section('css')
@stop

@section('content')

<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form method="get" class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-auto mr-auto">
                <h3 class="card-title">Filter</h3>
              </div>
            </div>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Course</label>
                  <select name="course" id="course" class="form-control">
                    <option value="">Select Course</option>
                    @foreach($courses as $course)
                    <option value="{{$course->id}}" {{Input::get('course')==$course->id?'selected':''}}>{{$course->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Semester</label>
                  <select name="semester" id="semester" class="form-control">
                    <option value="">Select Semester</option>
                    @foreach($semesters as $semester)
                    <option value="{{$semester->id}}" {{Input::get('semester')==$semester->id?'selected':''}}>{{$semester->name}}</option>
                    @endforeach
                  </select>

                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Stream</label>
                  <select name="stream" id="stream" class="form-control">
                    <option value="">Select Stream</option>
                    @foreach($streams as $stream)
                    <option value="{{$stream->id}}" {{Input::get('stream')==$stream->id?'selected':''}}>{{$stream->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Fee Head</label>
                  <select name="fee_head" class="form-control">
                    <option value="">Select Fee Head</option>
                    @foreach($fee_heads as $fee_head)
                    <option value="{{$fee_head->id}}" {{Input::get('fee_head')==$fee_head->id?'selected':''}}>{{$fee_head->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Gender</label>
                  <select name="gender" class="form-control">
                    <option value="">Select Year</option>
                    <option value="Male" {{(Input::get('gender')=='Male')?'selected':''}}>Male</option>
                    <option value="Female" {{(Input::get('gender')=='Female')?'selected':''}}>Female</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Practical</label>
                  <select name="practical" class="form-control">
                    <option value="">Select Year</option>
                    <option value="With" {{(Input::get('practical')=='With')?'selected':''}}>With</option>
                    <option value="Without" {{(Input::get('practical')=='Without')?'selected':''}}>Without</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Financial Year</label>
                  <select name="financial_year" class="form-control" required>
                    <option value="">Select Financial Year</option>
                    @foreach($financial_years as $value)
                    <option value="{{$value->financial_year}}" {{(Input::get('financial_year')==$value->financial_year)?'selected':''}}>{{$value->financial_year}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer text-right">
            <div class="d-flex flex-row">
              <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
              <a href="{{Request::url()}}" class="btn btn-danger"><i class="fe fe-close"></i> Reset</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-auto mr-auto">
                <h3 class="card-title">Fee List</h3>
              </div>
              <div class="col-auto">
                <a href="{{route('admin.fee.create')}}" class="btn btn-success">Add New</a>
              </div>
            </div>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-12">
                @include('admin.fee.list')
                {{$fees->render()}}
              </div>
            </div>

          </div>
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
@include('common.admin-staff.application.js')
@stop


