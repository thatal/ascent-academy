<div class="card-body">

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered" id="myTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Application ID</th>
            <th>Fullname</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($applications as $key => $application)
          <tr>
            <td>{{ $key+ 1 + ($applications->perPage() * ($applications->currentPage() - 1)) }}</td>
            <td>{{ $application->id }}</td>
            <td>{{ $application->fullname }}</td>
            <td>{{ ($application->course ? $application->course->name : "NA") }}</td>
            <td>{{ ($application->semester ? $application->semester->name : "NA") }}</td>
            <td>
              @if($application->is_confirmed==0)
                  <button type="button" class="btn btn-default" disabled>Confirmation Pending</button>
              @elseif($application->is_confirmed==1)
                @if($application->payment_status==0)
                  <button type="button" class="btn btn-default" disabled>Payment Pending</button>
                @elseif($application->payment_status==1)
                  <button type="button" class="btn btn-default" disabled>Payment Done</button>
                @endif
              @endif
            </td>
            <td>
              <div class="btn-group">
                <a href="{{ route('student.application.show',$application->uuid) }}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                @if($application->is_confirmed==0)
                  @if(config('constants.current_time') >= strtotime(config('constants.up_time')) && config('constants.current_time') <= strtotime(config('constants.down_time')))
                  <a href="{{ route('student.application.edit',$application->uuid) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                  <a href="{{ route('student.application.confirm',$application->uuid) }}" class="btn btn-success">Confirm</a>
                  @endif
                @else
                  @if($application->payment_status==0)
                    @if(config('constants.current_time') >= strtotime(config('constants.up_time')) && config('constants.current_time') <= strtotime(config('constants.down_time')))
                      <form method="post" action="{{ route('student.make-payment') }}">
                        @csrf
                        <input type="hidden" name="application_uuid" value="{{$application->uuid}}">
                        <button type="submit" class="btn btn-success">Make Payment</button>
                      </form>
                    @endif
                  @elseif($application->payment_status==1)
                    <a href="{{ route('student.application.download-application',$application->uuid) }}" class="btn btn-success">Download</a>
                  @endif
                @endif
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="10">No Data</td>
          </tr>
          @endforelse
        </tbody>
      </table>
      {{$applications->render()}}
    </div>
  </div>

</div>
