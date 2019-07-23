<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-12 table-responsive">
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th style="max-width: 39px">#</th>
                      <th style="max-width: 78px">Application ID</th>
                      <th style="max-width: 119px">Fullname</th>
                      <th style="max-width: 77px">Course</th>
                      <th style="max-width: 62px">Semester</th>
                      <th style="max-width: 156px">Stream</th>
                      <th style="max-width: 48px">Caste</th>
                      <th style="max-width: 41px">Total Marks</th>
                      <th style="max-width: 78px">Percentage</th>
                      <th style="max-width: 147px">Status</th>
                    </tr>
                  </thead>
                </table>
                <div id="contain">  
                    <table border="0" id="table_scroll" class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="max-width: 39px">#</th>
                          <th style="max-width: 78px">Application ID</th>
                          <th style="max-width: 119px">Fullname</th>
                          <th style="max-width: 77px">Course</th>
                          <th style="max-width: 62px">Semester</th>
                          <th style="max-width: 156px">Stream</th>
                          <th style="max-width: 63px">Caste</th>
                          <th style="max-width: 41px">Total Marks</th>
                          <th style="max-width: 78px">Percentage</th>
                          <th style="max-width: 147px">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($applications as $key => $application)
                        <tr tabindex="1" id="tr_{{$application->id}}" class="
                            @if($application->status==0)
                             application-pending
                            @elseif($application->status==1)
                              application-verified
                            @elseif($application->status==2)
                              application-on-hold
                            @elseif($application->status==3)
                              application-subject-allocated
                            @elseif($application->status==4)
                              admission-taken
                            @elseif($application->status==5)
                              application-rejected
                            @elseif($application->status==6)
                              application-cancelled
                            @elseif($application->status==7)
                              application-rejected
                            @endif
                            "
                        >
                          <td style="max-width: 39px" class="serial_no">{{ $key+ 1 }}</td>
                          <td style="max-width: 78px" id="application_id">{{$application->id}}</td>
                          <td style="max-width: 119px" id="fullname">{{ $application->fullname }}</td>
                          <td style="max-width: 77px" id="course_name">{{ $application->course->name }}</td>
                          <td style="max-width: 62px" id="semester_name">{{ $application->semester->name }}</td>
                          <td style="max-width: 156px" id="stream_name">{{ $application->appliedStream->stream->name }}</td>
                          <td style="max-width: 63px" id="caste_name">{{ $application->caste->name }}</td>
                          <td style="max-width: 41px" id="total_marks">{{ $application->all_total_marks }}</td>
                          <td style="max-width: 78px" id="percentage">{{ $application->percentage }}%</td>
                          <td style="max-width: 147px" id="status_button">
                            @if($application->status==0)
                              <button type="button" class="btn btn-default" disabled>Pending</button>
                            @elseif($application->status==1)
                              <button type="button" class="btn btn-primary" disabled>Verified</button>
                            @elseif($application->status==2)
                              <button type="button" class="btn btn-danger" disabled>On Hold</button>
                            @elseif($application->status==3)
                              <button type="button" class="btn btn-success" disabled>Subject Allocated</button>
                            @elseif($application->status==4)
                              <button type="button" class="btn btn-success" disabled>Admission Complete</button>
                            @elseif($application->status==5)
                              <button type="button" class="btn btn-danger" disabled>Rejected</button>
                            @elseif($application->status==6)
                              <button type="button" class="btn btn-default" disabled>Cancelled As Already Admitted</button>
                            @elseif($application->status==7)
                              <button type="button" class="btn btn-default" disabled>Rejected As No Seat Available</button>
                            @endif
                        </tr>
                        @empty
                        <tr>
                          <td colspan="10">No Data</td>
                        </tr>
                        @endforelse

                      </tbody>
                    </table>
                </div>
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
<div class="row">
    <div id="botany" class="seat">100</div>
</div>
<div class="modal fade" id="animateModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Admission Taken</h4>
            </div>
            <div class="modal-body">
                <h3>Admission Taken By Sunil Thatal</h3>
            </div>
        </div>
    </div>
</div>