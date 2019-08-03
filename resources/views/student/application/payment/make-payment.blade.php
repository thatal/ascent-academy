@extends('common.student-app')
@section('title')
Application
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
                <h3 class="card-title">Payment Details</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" action="{{config('constants.url')}}">
              @csrf
              <input type="hidden" name="msg" value="{{ $checksum }}">
              <div class="row">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th>Application ID</th>
                      <td>{{$application->id}}</td>
                    </tr>
                    <tr>
                      <th>Fullname</th>
                      <td>{{$application->fullname}}</td>
                    </tr>
                    <tr>
                      <th>Course</th>
                      <td>{{$application->course->name}}</td>
                    </tr>
                    <tr>
                      <th>Semester/Year</th>
                      <td>{{$application->semester->name}}</td>
                    </tr>
                    <tr>
                      <th>Stream</th>
                      <td>{{$application->appliedStream->stream->name}}</td>
                    </tr>
                    <tr>
                      <th>Payable Amount</th>
                      <td>{{$amount}}.00</td>
                    </tr>
                  </tbody>
                </table>
                @if(config('constants.current_time') >= strtotime(config('constants.admission_up_time')) && config('constants.current_time') <= strtotime(config('constants.admission_down_time')))
                    <button type="submit" class="btn btn-primary">Proceed to Pay</button>
                @endif
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

@stop


