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
              <div class="col-auto">
                @if($application->is_confirmed)
                  <span>Confirmed</span>
                @endif
                @if($application->payment_status)
                  <span> & Payment Success</span>
                @endif
                @if($application->status==1)
                  & Verified
                @elseif($application->status==2)
                  <span class="tag tag-red"> & On Hold because of {{$application->on_hold_reason}}</span>
                @endif
                <a href="{{ auth()->guard('admin')->check()? route('admin.application.index') : route('staff.application.index') }}" class="btn btn-success">Application List</a>
                <a href="{{ auth()->guard('admin')->check()? route('admin.application.download-application',$application->uuid) : route('staff.application.download-application',$application->uuid) }}" class="btn btn-primary">Download</a>
                {{-- <a href="{{ route('admin.application.edit',[$application->uuid]) }}" class="btn btn-warning">Edit</a> --}}
              </div>
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