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
                  <label class="form-label">Course</label>
                  <select name="course" id="course" class="form-control">
                    <option value="">Select Course</option>
                    @foreach($courses as $course)
                    <option value="{{$course->id}}" {{Input::get('course')==$course->id?'selected':''}}>{{$course->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Semester</label>
                  <select name="semester" id="semester" class="form-control">
                    <option value="">Select Semester</option>
                    @foreach($semesters as $semester)
                    <option value="{{$semester->id}}" {{Input::get('semester')==$semester->id?'selected':''}}>{{$semester->name}}</option>
                    @endforeach
                  </select>

                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Stream</label>
                  <select name="stream" id="stream" class="form-control">
                    <option value="">Select Stream</option>
                    @foreach($streams as $stream)
                    <option value="{{$stream->id}}" {{Input::get('stream')==$stream->id?'selected':''}}>{{$stream->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              {{-- <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Stream</label>
                  <select name="stream" id="stream" class="form-control">
                    <option value="">Select Stream</option>
                    @foreach($streams as $stream)
                    <option value="{{$stream->id}}" {{Input::get('stream')==$stream->id?'selected':''}}>{{$stream->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div> --}}
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Board</label>
                  <select name="board" class="form-control">
                    <option value="">Select Board</option>
                    @foreach($boards as $board)
                    <option value="{{$board}}" {{Input::get('board')==$board?'selected':''}}>{{$board}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              {{-- <div class="col-md-3 col-lg-3" id="preference" style="{{(Input::has("preference") ? '':' display:none; ')}}">
                <div class="form-group">
                  <label class="form-label">Preference</label>
                  <select name="preference" id="preference" class="form-control">
                    <option value="">Select Stream</option>
                    @foreach(range(1,3) as $val)
                        <option value="{{$val}}"  {{Input::get('preference')==$val?' selected ':''}}>Preference {{$val}}</option>
                    @endforeach
                  </select>
                </div>
              </div> --}}
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Year</label>
                  <select name="year" class="form-control">
                    <option value="">Select Year</option>
                    @foreach($years as $year)
                    <option value="{{$year->year}}" {{(Input::get('year')==$year->year)?'selected':''}}>{{$year->year}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            {{-- </div> --}}
            {{-- <div class="row"> --}}
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">From Percentage</label>
                  <input type="number" class="form-control required" name="from_percentage" placeholder="From Percentage" value="{{Input::get('from_percentage')}}">
                </div>
              </div>

              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">To Percentage</label>
                  <input type="number" class="form-control required" name="to_percentage" placeholder="To Percentage" value="{{Input::get('to_percentage')}}">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Caste</label>
                  <select class="form-control" name="caste">
                    <option value="">Unreserved</option>
                    @foreach($castes as $caste)
                    <option value="{{$caste->id}}" {{(Input::get('caste')==$caste->id)?'selected':''}}>{{$caste->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              {{-- <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Category</label>
                  <select class="form-control" name="category">
                    <option value="">Select Category</option>
                    <option value="co-curricular" {{(Input::get('category')=='co-curricular')?'selected':''}}>Co-Curricular</option>
                    <option value="differently-abled" {{(Input::get('category')=='differently-abled')?'selected':''}}>Differently Abled</option>
                  </select>
                </div>
              </div> --}}
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Order By Marks</label>
                  <select class="form-control" name="order_by_percentage">
                    <option value="">Select Order By Marks</option>
                    <option value="DESC" {{(Input::get('order_by_percentage')=='DESC')?'selected':''}}>Descending</option>
                    <option value="ASC" {{(Input::get('order_by_percentage')=='ASC')?'selected':''}}>Ascending</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Application Status</label>
                  <select class="form-control" name="status">
                    <option value="">All</option>
                    <option value="pending" {{(Input::get('status')=='pending')?'selected':''}}>Pending</option>
                    {{-- <option value="verified" {{(Input::get('status')=='verified')?'selected':''}}>Verified</option>
                    <option value="on-hold" {{(Input::get('status')=='on-hold')?'selected':''}}>On Hold</option>
                    <option value="subject-allocated" {{(Input::get('status')=='subject-allocated')?'selected':''}}>Subject Allocated</option>
                    <option value="admission-done" {{(Input::get('status')=='admission-done')?'selected':''}}>Admission Done</option>
                    <option value="rejected" {{(Input::get('status')=='rejected')?'selected':''}}>Rejected</option>
                    <option value="already-admitted" {{(Input::get('status')=='already-admitted')?'selected':''}}>Already Admitted</option>
                    <option value="rejected-as-no-seat" {{(Input::get('status')=='rejected-as-no-seat')?'selected':''}}>Rejected As No Seat</option> --}}
                    {{-- <option value="selected" {{(Input::get('status')=='selected')?'selected':''}}>Selected</option> --}}
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Application No</label>
                  <input type="number" class="form-control required" name="application_no" placeholder="Application No" value="{{Input::get('application_no')}}">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Registration No</label>
                  <input type="number" class="form-control required" name="registration_no" placeholder="Registration No" value="{{Input::get('registration_no')}}">
                </div>
              </div>
              {{-- <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">UID</label>
                  <input type="text" class="form-control required" name="uid" placeholder="UID" value="{{Input::get('uid')}}">
                </div>
              </div> --}}
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Limit</label>
                  <input type="number" class="form-control required" name="limit" placeholder="Application No" value="{{Input::get('limit')??100}}">
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer text-right">
            <div class="d-flex flex-row">
              <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
              <a href="{{Request::url().'?limit=100'}}" class="btn btn-danger"><i class="fe fe-close"></i> Reset</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
