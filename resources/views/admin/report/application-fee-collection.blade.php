@extends('common.admin-app')
@section('title')
Report
@endsection

@section('css')
@stop




@section('content')

<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
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
                  <label class="form-label">From Date</label>
                  <input type="text" name="from" id="from" class="form-control"  placeholder="From Date" value="{{Input::get('from')}}">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">To Date</label>
                  <input type="text" name="to" id="to" class="form-control"  placeholder="To Date" value="{{Input::get('to')}}">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Mobile No</label>
                  <input type="text" name="mobile_no" class="form-control"  placeholder="Mobile No" value="{{Input::get('mobile_no')}}">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Application ID</label>
                  <input type="text" name="application_id" class="form-control"  placeholder="Application Id" value="{{Input::get('application_id')}}">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Student ID</label>
                  <input type="text" name="student_id" class="form-control"  placeholder="Student ID" value="{{Input::get('student_id')}}">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-control">
                    <option value="">All</option>
                    <option value="1" {{Input::get('status')=='1'?'selected':''}}>Successfull</option>
                    <option value="0" {{Input::get('status')=='0'?'selected':''}}>Unsuccessfull</option>
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
                <h3 class="card-title">Application Fee Collections (Total: {{$online_payments->total()}})</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 table-responsive">
                <table class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Application ID</th>
                      <th>Student ID</th>
                      <th>Student Name</th>
                      <th>Amount</th>
                      <th>Code</th>
                      <th>Response</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($online_payments as $key => $online_payment)
                    <tr>
                      <td>{{ $key+ 1 + ($online_payments->perPage() * ($online_payments->currentPage() - 1)) }}</td>
                      <td>{{$online_payment->application_id}}</td>
                      <td>{{$online_payment->student_id}}</td>
                      <td>{{$online_payment->application->fullname}}</td>
                      <td>{{$online_payment->amount}}</td>
                      <td>{{$online_payment->code}}</td>
                      <td>{{$online_payment->biller_response}}</td>
                      <td>{{$online_payment->status}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="10">No Data</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                {{$online_payments->render()}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection


@section('js')
<script type="text/javascript">
  $('#from').Zebra_DatePicker({
      format: 'Y-m-d'
  });
  $('#to').Zebra_DatePicker({
      format: 'Y-m-d'
  });
</script>
@stop


