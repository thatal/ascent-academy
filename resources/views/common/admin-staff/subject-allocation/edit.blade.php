@php
    $guard = (auth()->guard("admin")->check() ? "admin" : (auth()->guard("staff")->check() ? "staff" : ""));
    $subjects            = $application->appliedStream->stream->subjects;
    $major_subjects      = $subjects->where("is_major", 1);
    $compulsory_subjects = $subjects->where("is_compulsory", 1);
    $other_subjects      = $subjects->where("is_compulsory", 0)->where("is_major", 0);
@endphp
<div class="row">
    {{-- first row --}}
    <div class="col-6">
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-auto mr-auto">
                <h3 class="card-title">Edit Allocated subjects.</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form name="subject-allocation-form" id="subject-allocation-form" method="post" action="{{route($guard.'.subject-allocation.update',$application->uuid)}}">
              @csrf
                @include("common.admin-staff.subject-allocation.main")
                <div class="text-right">
                    <button type="submit" class="btn btn-primary"> Update</button>
                </div>
            </form>
          </div>
        </div>
    </div>

    {{-- second row --}}
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-auto mr-auto">
                        <h3 class="card-title">Candidate Information</h3>
                    </div>
                    <div class="col-auto">
                        <a href="{{route($guard.'.application.show', $application->uuid)}}" target="_blank" ><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View</button></a>
                    </div>
                </div>
            </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <p> Fullname</p>
              </div>
              <div class="col-6">
                <p>: <strong>{{$application->fullname}} </strong></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p> Gender</p>
              </div>
              <div class="col-6">
                <p>: <strong>{{$application->gender}} </strong></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p> Course</p>
              </div>
              <div class="col-6">
                <p>: <strong>{{$application->course->name}} </strong></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p> Semester</p>
              </div>
              <div class="col-6">
                <p>: <strong>{{$application->semester->name}} </strong></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p> Stream</p>
              </div>
              <div class="col-6">
                <p>: <strong>{{$application->appliedStream->stream->name}} </strong></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p> Caste</p>
              </div>
              <div class="col-6">
                <p>: <strong>{{$application->caste->name}} </strong></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p> Religion</p>
              </div>
              <div class="col-6">
                <p>: <strong>{{$application->religion}} </strong></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p> Co-Curricular</p>
              </div>
              <div class="col-6">
                <p>: <strong>{{$application->co_curricular==0?'No':'Yes'}}</strong></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p> Differently Abled</p>
              </div>
              <div class="col-6">
                <p>: <strong>{{$application->differently_abled==0?'No':'Yes'}}</strong></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p> Free Admission Applied</p>
              </div>
              <div class="col-6">
                <p>: <strong>{{$application->free_admission== "yes"?'Yes':'No'}}</strong></p>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
