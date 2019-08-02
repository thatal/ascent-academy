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
                  <label class="form-label">Course</label>
                  <select name="course_id" class="form-control">
                    <option value="">All</option>
                    @foreach($courses as $course)
                  <option value="{{$course->id}}" {{Input::get('course_id')==$course->id?'selected':''}}>{{$course->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Semester</label>
                  <select name="semester_id" class="form-control">
                    <option value="">All</option>
                    @foreach($semesters as $semester)
                  <option value="{{$semester->id}}" {{Input::get('semester_id')==$semester->id?'selected':''}}>{{$semester->name}}</option>
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
                <h3 class="card-title">Application Fee Collections (Total Applications: {{$receipts->total()}})</h3>
              </div>
              <div class="col-auto">
                Total Amount: {{getDecimal($total_amount)}}
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
                      <th>Receipt No</th>
                      <th>Uid</th>
                      <th>Application ID</th>
                      <th>Student ID</th>
                      <th>Student Name</th>
                      <th>Course</th>
                      <th>Semester</th>
                      <th>Total</th>
                      <th>Is Online</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($receipts as $key => $receipt)
                    <tr>
                      <td>{{ $key+ 1 + ($receipts->perPage() * ($receipts->currentPage() - 1)) }}</td>
                      <td>{{$receipt->receipt_no}}</td>
                      <td>{{$receipt->uid}}</td>
                      <td>{{$receipt->application_id}}</td>
                      <td>{{$receipt->student_id}}</td>
                      <td>{{$receipt->application->fullname}}</td>
                      <td>{{$receipt->application->course->name}}</td>
                      <td>{{$receipt->application->semester->name}}</td>
                      <td>{{$receipt->total}}</td>
                      <td>{{$receipt->is_online?'Yes':'No'}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="10">No Data</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                {{$receipts->render()}}
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


