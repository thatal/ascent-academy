@extends('common.student-app')
@section('title')
Application
@endsection

@section('css')
<style>
  .pull-right {
    float: right!important;
  }
</style>
@stop




@section('content')

<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          {{ csrf_field() }}
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-auto mr-auto">
                <h3 class="card-title">Application</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Full Name">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Date of Birth</label>
                    <input type="text" name="dob" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Gender</label>
                    <label class="form-label"><input type="radio" name="gender" id="male" value="male" checked> Male</label>
                    <label class="form-label"><input type="radio" name="gender" id="female" value="female"> Female</label>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Father's Name</label>
                    <input type="text" name="fathers_name" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Mother's Name</label>
                    <input type="text" name="mothers_name" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Reserve Quota Sought</label>
                    <input type="text" name="reserve_quota_sought" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Religion</label>
                    <label class="form-label"><input type="radio" name="religion" value="" checked> Hindu</label>
                    <label class="form-label"><input type="radio" name="religion" value=""> Muslim</label>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Caste</label>
                    @foreach($castes as $key => $caste)
                    <label class="form-label"><input type="radio" name="caste" value="{{$caste->id}}" @if($key==0) checked @endif> {{$caste->name}}</label>
                    @endforeach
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Nationality</label>
                    <input type="text" name="nationality" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">State</label>
                    <input type="text" name="state" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">District</label>
                    <input type="text" name="district" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Pin</label>
                    <input type="text" name="pin" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Present Address</label>
                    <textarea name="present_address" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Parmanent Address</label>
                    <textarea name="parmanent_address" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Year</label>
                    <input type="text" name="year" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Annual Income</label>
                    <input type="text" name="annual_income" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Blood Group</label>
                    <input type="text" name="blood_group" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Last Board/University</label>
                    <input type="text" name="pin" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Total Marks</label>
                    <input type="input" class="form-control" name="total_marks" value="">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Percentage</label>
                    <input type="text" class="form-control" name="precentage" value="" readonly>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Passport Photo</label>
                    <input type="file" name="passport" value="" readonly>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Signature</label>
                    <input type="file" name="sign" value="" readonly>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Course</label>
                    @foreach($courses as $key => $course)
                    <label class="form-label"><input type="radio" name="course" value="{{$course->id}}"  required class="rdCourse" onclick="checkValue('{{$course->id}}','{{route("student.api.semester.index")}}/?course_id=','Semester','semester','1')"> {{$course->name}}</label>
                    @endforeach
                  </div>
                </div>
                  
                <div class='col-md-6 col-lg-6'>
                  <div class='form-group'>
                    <div id="semester"></div>
                  </div>
                </div>

                <div class='col-md-6 col-lg-6'>
                  <div class='form-group'>
                    <div id="stream"></div>
                  </div>
                </div>

                <div class='col-md-6 col-lg-6'>
                  <div class='form-group'>
                    <div id="subject"></div>
                  </div>
                </div>
                  
                  
              </div>
            </form>
          </div>
        <div class="card-footer text-right">
          <div class="d-flex">
            <button type="submit" class="btn btn-primary">Submit</button>
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
 $('.rdCourse').click(function(){

   let courseId = $(this).val();
    $.get("{{route('student.api.semester.index')}}/?course_id="+courseId, function(data, status){
      var semester = " <label class='form-label'>Semester</label>";
      $.each(data.semesters,function(k,v){
          semester += "<label class='form-label'><input type='radio' name='semester' class='rdSemester' value='"+v.id+"'> "+v.name;
      })

      var streams = " <label class='form-label'>Stream</label>";
      $.each(data.streams,function(k,v){
          streams += "<label class='form-label'><input type='radio' name='stream' class='rdStream' value='"+v.id+"'> "+v.name;
      })
      //alert("Data: " + data + "\nStatus: " + status);
      $('#semester').html(semester);
      $('#stream').html(streams);
    });
  });
 $(document).on("click",".rdStream", function(){
  let streamId = $(this).val();
  $.get("{{route('student.api.subject.index')}}/?stream_id="+streamId, function(data, status){
     var subject = " <label class='form-label'>Subject</label>";
     $.each(data.subjects,function(k,v){
          //val = v.id+"#"+v.parent_id;
          subject += "<label class='form-label'><input type='radio' name='subject' class='rdSubject' value='"+v.id+"'> "+v.name;
          subject += "<span id='span"+v.id+"' style='margin-left:40px' class='sub'></span>";
      })
      $('#subject').html(subject);
  });
 });

 $(document).on("click",".rdSubject", function(){
  $('.sub').html('');
  let subjectId = $(this).val();
  let streamId = $("input[name='stream']:checked").val();
  $.get("{{route('student.api.moresubject.index')}}/?stream_id="+streamId+"&parent_id="+subjectId, function(data, status){
    let subject1 = "<div style='margin-left:50px'>";
    if(data.length > 0){
      $.each(data,function(k,v){
          console.log(data);
          subject1 += "<label class='form-label'><input type='radio' name='subject' class='rdSubject' value='"+v.id+"'> "+v.name;
          
      })
     subject1 += "</div>";
     $('#span'+subjectId).html(subject1);
    }
     
  });
 });
</script>
@stop


