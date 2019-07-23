<div class="row row-cards">
  <div class="col-6 col-sm-4 col-lg-2">
    <div class="card">
      <div class="card-body p-3 text-center">
        <div class="d-flex align-items-center">
          <span class="stamp stamp-md bg-azure mr-3">
            <i class="fe fe-users"></i>
          </span>
          <div>
            <h4 class="m-0"><a href="javascript:void(0)">{{$total_student}}</a></h4>
            <small class="text-muted">Registrations</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-lg-2">
    <div class="card">
      <div class="card-body p-3 text-center">
        <div class="d-flex align-items-center">
          <span class="stamp stamp-md bg-azure mr-3">
            <i class="fe fe-book"></i>
          </span>
          <div>
            <h4 class="m-0"><a href="javascript:void(0)">{{$total_application}}</a></h4>
            <small class="text-muted">Applications</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-lg-2">
    <div class="card">
      <div class="card-body p-3 text-center ">
        <div class="d-flex align-items-center">
          <span class="stamp stamp-md bg-green mr-3">
            <i class="fe fe-check"></i>
          </span>
          <div>
            <h4 class="m-0"><a href="javascript:void(0)">{{$total_verified_application}}</a></h4>
            <small class="text-muted">Verified</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-lg-2">
    <div class="card">
      <div class="card-body p-3 text-center ">
        <div class="d-flex align-items-center">
          <span class="stamp stamp-md bg-blue mr-3">
            <i class="fe fe-close"></i>
          </span>
          <div>
            <h4 class="m-0"><a href="javascript:void(0)">{{$total_rejected_application}}</a></h4>
            <small class="text-muted">On Hold</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>