<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-auto mr-auto">
                <h3 class="card-title">Application List (Total: {{$applications->total()}})</h3>
              </div>
              <div class="col-auto">
                @if(Input::get('stream')!=null)
                  {{-- <a href="{{ auth()->guard('admin')->check()? route('admin.application.live-merit-list') : route('staff.application.live-merit-list')}}?stream={{Input::get('stream')}}&order_by_percentage=DESC" class="btn btn-success" target="_blank">Merit List</a> --}}
                  {{-- <a href="{{ auth()->guard('admin')->check()? route('admin.application.live-seat-available') : route('staff.application.live-seat-available')}}?stream={{Input::get('stream')}}&order_by_percentage=DESC" class="btn btn-success" target="_blank">Seat Available</a> --}}
                @endif
                <form method="post" action="{{Request::url().'?'.http_build_query(Request::query())}}">
                  @csrf
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-file-excel-o" aria-hidden="true"></i> Export
                  </button>
                </form>
              </div>
            </div>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-12 table-responsive">
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Application ID</th>
                      <th>Fullname</th>
                      <th>Course</th>
                      <th>Semester</th>
                      <th>Stream</th>
                      <th>Caste</th>{{-- 
                      <th>Co Curricular</th>
                      <th>Differently Abled</th> --}}
                      <th>Total Marks</th>
                      <th>Percentage</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($applications as $key => $application)
                    <tr>
                      <td>{{ $key+ 1 + ($applications->perPage() * ($applications->currentPage() - 1)) }}</td>
                      <td>{{$application->id}}</td>
                      <td>{{ $application->fullname }}</td>
                      <td>{{ $application->course->name  ?? ""}}</td>
                      <td>{{ $application->semester->name ?? "" }}</td>
                      <td>{{ $application->appliedStream->stream->name }}</td>
                      <td>{{ $application->caste->name }}</td>
                      {{-- <td>
                        @if($application->co_curricular==1)Yes @else No @endif
                      </td>
                      <td>
                        @if($application->differently_abled==1)Yes @else No @endif
                      </td> --}}
                      <td>{{ $application->all_total_marks }}</td>
                      <td>{{ $application->percentage }}%</td>
                      <td>
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
                      </td>
                      <td>
                        <div class="btn-group">
                          <a href="{{ auth()->guard('admin')->check()? route('admin.application.show',$application->uuid) : route('staff.application.show',$application->uuid)}}" class="btn btn-default" target="_blank"><i class="fa fa-eye"></i></a>

                          @if($application->status<4) 
                            <a href="{{ auth()->guard('admin')->check()? route('admin.application.edit',$application->uuid): route('staff.application.edit',$application->uuid) }}" class="btn btn-warning" target="_blank"><i class="fa fa-edit"></i> Edit</a>
                          @endif
                          @if($application->status>2 && $application->status<4) 
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModel{{$key}}"><i class="fa fa-times"></i> Reject</button>
                            {{-- <a href="" class="btn btn-danger" target="_blank"><i class="fa fa-times"></i> Reject</a> --}}
                          @endif
                          @if($application->status == 0)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifyModel{{$key}}"><i class="fa fa-check"></i> Verify</button>
                            <button type="button" class="btn btn-gray" data-toggle="modal" data-target="#onHoldModel{{$key}}"><i class="fa fa-times"></i> On Hold</button>
                          @elseif($application->status==1||$application->status==2)
                            <a href="{{ auth()->guard('admin')->check()? route('admin.subject-allocation.create',$application->uuid) : route('staff.subject-allocation.create',$application->uuid) }}" class="btn btn-primary" target="_blank"><i class="fa fa-tasks"></i> Allocate Subject</a>
                          @elseif($application->status==3)
                            <a href="{{ auth()->guard('admin')->check()? route('admin.subject-allocation.show',$application->uuid) : route('staff.subject-allocation.show',$application->uuid) }}" class="btn btn-primary" target="_blank"><i class="fa fa-eye"></i> Allocated Subjects</a>
                            <a href="{{ auth()->guard('admin')->check()? route('admin.admission.create',$application->uuid) : route('staff.admission.create',$application->uuid) }}" class="btn btn-success" target="_blank"><i class="fa fa-arrow-right"></i> Proceed for Admission</a>
                          @elseif($application->status==4)
                            <a href="{{ auth()->guard('admin')->check()? route('admin.admission.receipt',$application->uuid): route('staff.admission.receipt',$application->uuid) }}" class="btn btn-success"><i class="fa fa-list-alt"></i> Receipt</a>
                             
                          @endif
                        </div>
                        <!-- The Verify Modal -->
                      <div class="modal" id="verifyModel{{$key}}">
                        <div class="modal-dialog">
                          <form method="post" action="{{ auth()->guard('admin')->check()? route('admin.application.verify',$application->uuid) : route('staff.application.verify',$application->uuid) }}" target="_blank">
                            @csrf
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Confirm Verification</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-6">
                                    <p>Fullname </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->fullname }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Course </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->course->name ?? "" }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Semester </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->semester->name  ?? ""}}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Stream </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->appliedStream->stream->name }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Caste </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->caste->name }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Total Marks </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->all_total_marks }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Percentage </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->percentage }}%</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Marksheet </p>{{-- {{dd(url(get_attachment('marksheet', $application)))}} --}}
                                  </div>
                                  <div class="col-6">
                                    <p>
                                      <a href="{{url((String)get_attachment('marksheet', $application))}}" target="_blank">View</a>
                                    </p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Caste Certificate</p>
                                  </div>
                                  <div class="col-6">
                                    <p>
                                      @if(get_attachment('caste_certificate', $application))
                                      <a href="{{url((String)get_attachment('caste_certificate', $application))}}" target="_blank">View</a>
                                      @else
                                      NA
                                      @endif
                                    </p>
                                  </div>
                                </div>
                                {{-- <div class="row">
                                  <div class="col-6">
                                    <p>Category </p>
                                  </div>
                                  <div class="col-6">
                                    <select name="category" class="form-control" required>
                                      @foreach($castes as $caste)
                                      <option value="{{$caste->id}}">{{$caste->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div> --}}
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                                <a href="{{ auth()->guard('admin')->check()? route('admin.application.edit',$application->uuid): route('staff.application.edit',$application->uuid) }}" class="btn btn-warning" target="_blank"><i class="fa fa-edit"></i> Edit</a>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                              </div>

                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- /The Verify Modal -->

                      <!-- The On Hold Modal -->
                      <div class="modal" id="onHoldModel{{$key}}">
                        <div class="modal-dialog">
                          <form method="post" action="{{ auth()->guard('admin')->check()? route('admin.application.on-hold',$application->uuid) : route('staff.application.on-hold',$application->uuid) }}" target="_blank">
                            @csrf
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Confirm On Hold</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-6">
                                    <p>Fullname </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->fullname }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Course </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->course->name ?? "" }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Semester </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->semester->name ?? "" }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Stream </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->appliedStream->stream->name }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Caste </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->caste->name }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Percentage </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->percentage }}%</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Reason </p>
                                  </div>
                                  <div class="col-6">
                                    <textarea name="reason" class="form-control" required></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                              </div>

                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- /The On Hold Modal -->
                      <!-- The Reject Modal -->
                      <div class="modal" id="rejectModel{{$key}}">
                        <div class="modal-dialog">
                          <form method="post" action="{{ auth()->guard('admin')->check()? route('admin.application.reject',$application->uuid) : route('staff.application.reject',$application->uuid) }}" target="_blank">
                            @csrf
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Confirm Rejection</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-6">
                                    <p>Fullname </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->fullname }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Course </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->course->name ?? "" }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Semester </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->semester->name ?? "" }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Stream </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->appliedStream->stream->name }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Caste </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->caste->name }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Percentage </p>
                                  </div>
                                  <div class="col-6">
                                    <p>{{ $application->percentage }}%</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <p>Reason </p>
                                  </div>
                                  <div class="col-6">
                                    <textarea name="reason" class="form-control" required></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                              </div>

                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- /The Reject Modal -->
                      
                      </td>
                      
                    </tr>
                    @empty
                    <tr>
                      <td colspan="11">No Data</td>
                    </tr>
                    @endforelse

                  </tbody>
                </table>
                {{$applications->appends(request()->all())->links()}}
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