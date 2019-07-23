@extends('common.admin-app')
@section('title')
Application
@endsection

@section('css')
<style>
  .pull-right {
    float: right!important;
  }
  .margin {
    margin-left: 40px;
  }
  .error{
    color: #ff0000;
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
            <form name="application" id="application" method="post" action="{{route('student.application.store')}}">
              @csrf
              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" autocomplete="off" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Date of Birth</label>
                    <input type="text" name="dob" id="dob" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Gender</label>
                    <label class="form-label"><input type="radio" name="gender" id="male" value="Male" checked required> Male</label>
                    <label class="form-label"><input type="radio" name="gender" id="Female" value="female" required> Female</label>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Father's Name</label>
                    <input type="text" name="fathers_name" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Mother's Name</label>
                    <input type="text" name="mothers_name" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Reserve Quota Sought</label>
                    <input type="text" name="reserve_quota" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Religion</label>
                    <label class="form-label"><input type="radio" name="religion" value="Hindu" checked required> Hindu</label>
                    <label class="form-label"><input type="radio" name="religion" value="Muslim" required> Muslim</label>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Caste</label>
                    @foreach($castes as $key => $caste)
                    <label class="form-label"><input type="radio" name="caste_id" value="{{$caste->id}}" @if($key==0) checked @endif required> {{$caste->name}}</label>
                    @endforeach
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Nationality</label>
                    <input type="text" name="nationality" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">State</label>
                    <input type="text" name="state" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">District</label>
                    <input type="text" name="district" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Pin</label>
                    <input type="text" name="pin" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Present Address</label>
                    <textarea name="present_address" class="form-control" required></textarea>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Parmanent Address</label>
                    <textarea name="parmanent_address" class="form-control" required></textarea>
                  </div>
                </div>
{{--                 <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Year</label>
                    <input type="text" name="year" class="form-control">
                  </div>
                </div> --}}
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Annual Income</label>
                    <input type="number" name="annual_income" class="form-control" required>
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
                    <input type="text" name="last_board_or_university" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Last Exam Roll</label>
                    <input type="text" name="last_exam_roll" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Last Exam No</label>
                    <input type="text" name="last_exam_no" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Total Marks</label>
                    <input type="input" class="form-control" name="total_marks" id="total_marks" value="" onchange="getPercentage()" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Percentage</label>
                    <input type="text" class="form-control" name="percentage" id="percentage" value="" readonly>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Passport Photo</label>
                    <input type="file" name="passport" value="">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Signature</label>
                    <input type="file" name="sign" value="">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Course</label>
                    @foreach($courses as $key => $course)
                    <label class="form-label"><input type="radio" name="course_id" value="{{$course->id}}"  required class="rdCourse"> {{$course->name}}</label>
                    @endforeach
                  </div>
                </div>

                <div class='col-md-6 col-lg-6'>
                  <div class="row">
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
                  </div>
                </div>

                {{-- <div class='col-md-6 col-lg-6'>
                  <div class='form-group'>
                    <div id="stream"></div>
                  </div>
                </div> --}}
                {{-- hs science --}}
                @include('student/application/hs/science')
                {{-- /hs science --}}
                {{-- hs arts --}}
                @include('student/application/hs/arts')
                {{-- /hs arts --}}
                {{-- hs commerce --}}
                @include('student/application/hs/commerce')
                {{-- /hs commerce --}}

              </div>

            </div>
            <div class="card-footer text-right">
              <div class="d-flex">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection


@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">
  $('#dob').Zebra_DatePicker({
      format: 'Y-m-d'
  });
</script>
<script type="text/javascript">
$("#application").validate({ 
  rules: { 
    "opt-subject[]": { 
      required: true, 
      minlength: 1 
    } 
  }, 
  messages: { 
    "opt-subject[]": "Please select at least one types of spam."
  } 

}); 

$('.rdCourse').click(function(){

 let courseId = $(this).val();
 $.get("{{route('student.api.semester.index')}}/?course_id="+courseId, function(data, status){
  var semester = " <label class='form-label'>Semester</label>";
  $.each(data.semesters,function(k,v){
    semester += "<label class='form-label'><input type='radio' name='semester_id' class='rdSemester' value='"+v.id+"'> "+v.name;
  })

  var streams = " <label class='form-label'>Stream</label>";
  $.each(data.streams,function(k,v){
    streams += "<label class='form-label'><input type='radio' name='stream_id' class='"+v.name+"' value='"+v.id+"'> "+v.name;
  })
  $('#semester').html(semester);
  $('#stream').html(streams);
});
});
$(document).on("click",".Science", function(){
  $(".hs-subjects-science").removeClass('d-none');
  $(".hs-subjects-arts").addClass('d-none');
  $(".hs-subjects-commerce").addClass('d-none');
});

$(document).on("click",".Arts", function(){
  $(".hs-subjects-science").addClass('d-none');
  $(".hs-subjects-arts").removeClass('d-none');
  $(".hs-subjects-commerce").addClass('d-none');
});

$(document).on("click",".Commerce", function(){
  $(".hs-subjects-arts").addClass('d-none');
  $(".hs-subjects-science").addClass('d-none');
  $(".hs-subjects-commerce").removeClass('d-none');
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

$(document).on("click","#alt-english-mil", function(){
  if($(this).is(":checked") == true){
    $('.alteng-mil').removeClass('d-none');
  }else{
    $('.alteng-mil').addClass('d-none');
  }
})

$(document).on("click","#mil", function(){
  $('.all-mil').removeClass('d-none');
})

$(document).on("click","#mil", function(){
  $('.all-mil').removeClass('d-none');
})

$(document).on("click","#alt-english", function(){
  $('.all-mil').addClass('d-none');
})

$(document).on("click","#hs-history-arts", function(){
  if($(this).is(":checked") == true){
    $('.hs-history-arts').removeClass('d-none');
  }else{
    $('.hs-history-arts').addClass('d-none');
  }
});
$(document).on("click","#hs-geography-arts", function(){
  if($(this).is(":checked") == true){
    $('.hs-geography-arts').removeClass('d-none');
  }else{
    $('.hs-geography-arts').addClass('d-none');
  }
});
$(document).on("click","#hs-logic-arts", function(){
  if($(this).is(":checked") == true){
    $('.hs-logic-arts').removeClass('d-none');
  }else{
    $('.hs-logic-arts').addClass('d-none');
  }
});
$(document).on("click","#hs-home-arts", function(){
  if($(this).is(":checked") == true){
    $('.hs-home-arts').removeClass('d-none');
  }else{
    $('.hs-home-arts').addClass('d-none');
  }
});
$(document).on("click","#hs-sanskrit-arts", function(){
  if($(this).is(":checked") == true){
    $('.hs-sanskrit-arts').removeClass('d-none');
  }else{
    $('.hs-sanskrit-arts').addClass('d-none');
  }
});
$(document).on("click","#hs-commercial-commerce", function(){
  if($(this).is(":checked") == true){
    $('.hs-commercial-commerce').removeClass('d-none');
  }else{
    $('.hs-commercial-commerce').addClass('d-none');
  }
});

function getPercentage() {
  let totalMarks = $('#total_marks').val();
  let percentage = (totalMarks/500)*100;
  $('#percentage').val(percentage);
}
</script>
@stop


