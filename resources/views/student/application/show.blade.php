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
                <h3 class="card-title">Application Details</h3>
              </div>
              @if($application->is_confirmed==0)
              <div class="col-auto">
                <a href="{{ route('student.application.confirm',[$application->uuid]) }}" class="btn btn-success" onclick="return confirm('Are you sure ? You will not be able to edit afterwards.');">Confirm</a>
                <a href="{{ route('student.application.edit',[$application->uuid]) }}" class="btn btn-warning">Edit</a>
              </div>
              @elseif($application->is_confirmed==1)
                @if(is_new_admission($application->semester_id))
                    @if($application->payment_status==0)
                    <div class="col-auto">
                    <form method="post" action="{{ route('student.application.make-payment') }}">
                        @csrf
                        <input type="hidden" name="application_uuid" value="{{$application->uuid}}">
                        <button type="submit" class="btn btn-success">Make Payment</button>
                    </form>
                    </div>
                    @elseif($application->payment_status==1)
                    <a href="{{ route('student.application.download-application',$application->uuid) }}" class="btn btn-primary">Download</a>
                    @endif
                @else
                    @if($application->payment_status==2)
                        <div class="col-auto">
                            <form method="post" action="{{ route('student.admission.fee-detail') }}">
                                @csrf
                                <input type="hidden" name="application_uuid" value="{{$application->uuid}}">
                                <button type="submit" class="btn btn-success">Fee Details</button>
                            </form>
                        </div>
                    @elseif($application->payment_status==3)
                    <a href="{{ route('student.application.download-application',$application->uuid) }}" class="btn btn-primary mr-2">Download</a>
                    <a href="{{ route('student.admission.payment-receipt',$application->uuid) }}" class="btn btn-success">Receipt</a>
                    @endif
                @endif
              @endif
              @if($application->status==1)
              {{-- <button type="button" class="btn btn-primary btn-sm ml-2"><i class="fa fa-print" aria-hidden="true"></i> Print</button> --}}
              @elseif($application->status==2)
              <span class="tag tag-red"> On Hold Because of {{$application->on_hold_reason}}</span>
              @endif
            </div>
          </div>
          @include('common/application/show')
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


