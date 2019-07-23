@extends('common.student-app')
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
          <form name="application" id="application" method="post" action="{{route('student.application.store')}}"  enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Full Name<span class="form-required">*</span></label>
                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" autocomplete="off" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Date of Birth<span class="form-required">*</span></label>
                    <input type="text" name="dob" id="dob" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Gender<span class="form-required">*</span></label>
                    <label class="form-label"><input type="radio" name="gender" id="male" value="Male" checked required> Male</label>
                    <label class="form-label"><input type="radio" name="gender" id="Female" value="female" required> Female</label>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Father's Name<span class="form-required">*</span></label>
                    <input type="text" name="fathers_name" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Mother's Name<span class="form-required">*</span></label>
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
                    <label class="form-label">Religion<span class="form-required">*</span></label>
                    <label class="form-label"><input type="radio" name="religion" value="Hindu" checked required> Hindu</label>
                    <label class="form-label"><input type="radio" name="religion" value="Muslim" required> Muslim</label>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Caste<span class="form-required">*</span></label>
                    @foreach($castes as $key => $caste)
                    <label class="form-label"><input type="radio" name="caste_id" value="{{$caste->id}}" @if($key==0) checked @endif required> {{$caste->name}}</label>
                    @endforeach
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Nationality<span class="form-required">*</span></label>
                    <input type="text" name="nationality" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">State<span class="form-required">*</span></label>
                    <input type="text" name="state" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">District<span class="form-required">*</span></label>
                    <input type="text" name="district" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">City<span class="form-required">*</span></label>
                    <input type="text" name="city" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Pin<span class="form-required">*</span></label>
                    <input type="text" name="pin" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Present Address<span class="form-required">*</span></label>
                    <textarea name="present_address" class="form-control" required></textarea>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Permanent Address<span class="form-required">*</span></label>
                    <textarea name="parmanent_address" class="form-control" required></textarea>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Annual Income<span class="form-required">*</span></label>
                    <input type="number" name="annual_income" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Blood Group<span class="form-required">*</span></label>
                    <input type="text" name="blood_group" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Last Board/University<span class="form-required">*</span></label>
                    <input type="text" name="last_board_or_university" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Last Exam Roll<span class="form-required">*</span></label>
                    <input type="text" name="last_exam_roll" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Last Exam No<span class="form-required">*</span></label>
                    <input type="text" name="last_exam_no" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-12 col-lg-12">
                  <div class="form-group">
                    <label class="form-label">Marks<span class="form-required">*</span></label>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th colspan="10">
                            <label><input type="radio" name="marks_type" id="type_percentage" checked> Percentage</label><br>
                            <label><input type="radio" name="marks_type" id="type_cgpa"> CGPA</label>
                          </th>
                        </tr>
                        <tr>
                          <th>Subjects offered in previous examination</th>
                          <th>Total Marks</th>
                          <th>Marks Secured</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(range(1, 6) as $number)
                        <tr>
                          <td><input type="text" class="form-control" name="sub_{{$number}}_name" required="true"></td>
                          <td><input type="text" class="form-control total_marks" name="sub_{{$number}}_total" value="100" readonly required="true"></td>
                          <td><input type="text" class="form-control cell total_score" name="sub_{{$number}}_score" required="true" onkeyup="this.value=this.value.replace(/[^0-9 . -]/g,'')"></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Total Marks<span class="form-required">*</span></label>
                    <input type="input" class="form-control" name="all_total_marks" id="all_total_marks" value="" required readonly>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Percentage<span class="form-required">*</span></label>
                    <input type="text" class="form-control" name="percentage" id="percentage" value="" readonly>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Passport Photo<span class="form-required">*</span></label>
                    <input type="file" name="passport" value="" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Signature<span class="form-required">*</span></label>
                    <input type="file" name="sign" value="" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Marksheet<span class="form-required">*</span></label>
                    <input type="file" name="marksheet" value="" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Pass Certificate</label>
                    <input type="file" name="pass_certificate" value="">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Caste Certificate</label>
                    <input type="file" name="caste_certificate" value="">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Course<span class="form-required">*</span></label>
                    @foreach($courses as $key => $course)
                    <label class="form-label"><input type="radio" name="course_id" value="{{$course->id}}"  required class="rdCourse"> {{$course->name}}</label>
                    @endforeach
                  </div>
                </div>
                {{-- HS --}}
                @include('common/application/course/hs/semester/semester')

                @include('common/application/course/hs/stream/stream')

                @include('common/application/course/hs/subject/science')

                @include('common/application/course/hs/subject/arts')

                @include('common/application/course/hs/subject/commerce')
                {{--/ HS --}}

                @include('common/application/course/degree/semester/semester')
                @include('common/application/course/degree/stream/stream')
                {{-- Degree Science --}}

                

                @include('common/application/course/degree/subject/science-major')
                @include('common/application/course/degree/subject/science')
                {{--/ Degree Science --}}

                {{-- Degree Arts --}}
                {{-- @include('common/application/course/degree/semester/semester') --}}

                

                @include('common/application/course/degree/subject/arts-major')
                @include('common/application/course/degree/subject/arts')
                {{--/ Degree Arts --}}

                {{-- Degree Commerce --}}
                {{-- @include('common/application/course/degree/semester/semester') --}}

                {{-- @include('common/application/course/degree/stream/stream') --}}

                @include('common/application/course/degree/subject/commerce-major')
                @include('common/application/course/degree/subject/commerce')
                {{--/ Degree Commerce --}}

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
    } ,
     "subject[]": { 
      required: true
    }
  }, 
  messages: { 
    "opt-subject[]": "Please select at least one types of spam."
  } 

}); 

$('.rdCourse').click(function(){
  //alert($(this).val());
  if($(this).val() == 1){
    $('.degree-panel').addClass('d-none');
    $('.degree-semester').addClass('d-none');
    $('.degree-stream').addClass('d-none');
    $('.hs-stream').removeClass('d-none');
    $('.hs-semester').removeClass('d-none');
  }
  else{
    $('.hs-panel').addClass('d-none');
    $('.degree-semester').removeClass('d-none');
    $('.hs-semester').addClass('d-none');
    $('.degree-stream').removeClass('d-none');
    $('.hs-stream').addClass('d-none');
  }

});
//HS Semester
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
  $.get("{{route('common.api.moresubject.index')}}/?stream_id="+streamId+"&parent_id="+subjectId, function(data, status){
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

$(document).ready(function(){
  $('#type_cgpa').click(function(){
    $(".total_marks").val('10');
    $(".total_score").val('');
    $('#percentage').val('');
    $('#all_total_marks').val('');
  })
  $('#type_percentage').click(function(){
    $(".total_marks").val('100');
    $(".total_score").val('');
    $('#percentage').val('');
    $('#all_total_marks').val('');
  })

  $(".cell").on('keyup', function(){
  var sum = 0;
  var data ={
  }
  /* console.log($(this).val()) */;
     $(".cell").each(function(index, item){
      var val = $(item).val();
      // alert(val);
      if($('#type_percentage').prop('checked') === true){
        if($(this).val() > 100){
          alert('Marks can not greater than 100');
          $(this).val('');
        }
      }

      if($('#type_cgpa').prop('checked') === true){
        if($(this).val() > 10){
          alert('Marks can not greater than 10');
          $(this).val('');
        }
      }

      var get_val = $(this).val();
        sum += Number(get_val);
       // console.log(sum);
    });
    if($('#type_percentage').prop('checked') === true){
     var percent = (sum/600)*100;
     var tmarks = sum;
   }

   if($('#type_cgpa').prop('checked') === true){
    var tmarks = sum*9.5;
    var percent = (tmarks/600)*100;
   }
    
    $('#percentage').val(percent.toFixed(2));
    $('#all_total_marks').val(tmarks);
});

  //degree Science  Major
  $('.rd-science-degree-major').click(function(){
    $('.degree-science-major').removeClass('d-none');
    $('.degree-arts-major').addClass('d-none');
    $('.degree-arts').addClass('d-none');
    $('.degree-commerce-major').addClass('d-none');
    $('.degree-commerce').addClass('d-none');
    $('.degree-science').addClass('d-none');
  })
//degree Science
  $('.rd-science-degree').click(function(){
    $('.degree-science-major').addClass('d-none');
    $('.degree-arts-major').addClass('d-none');
    $('.degree-arts').addClass('d-none');
    $('.degree-commerce-major').addClass('d-none');
    $('.degree-commerce').addClass('d-none');
    $('.degree-science').removeClass('d-none');
  })
//degree Arts Major
  $('.rd-arts-degree-major').click(function(){
    $('.degree-science-major').addClass('d-none');
    $('.degree-arts-major').removeClass('d-none');
    $('.degree-arts').addClass('d-none');
    $('.degree-commerce-major').addClass('d-none');
    $('.degree-commerce').addClass('d-none');
    $('.degree-science').addClass('d-none');
  })
  //degree Arts 
  $('.rd-arts-degree').click(function(){
    $('.degree-science-major').addClass('d-none');
    $('.degree-arts-major').addClass('d-none');
    $('.degree-arts').removeClass('d-none');
    $('.degree-commerce-major').addClass('d-none');
    $('.degree-commerce').addClass('d-none');
    $('.degree-science').addClass('d-none');
  })
  //degree Commerce Major
  $('.rd-commerce-degree-major').click(function(){
    $('.degree-science-major').addClass('d-none');
    $('.degree-arts-major').addClass('d-none');
    $('.degree-arts').addClass('d-none');
    $('.degree-commerce-major').removeClass('d-none');
    $('.degree-commerce').addClass('d-none');
    $('.degree-science').addClass('d-none');
  })
//degree Commerce
  $('.rd-commerce-degree').click(function(){
    $('.degree-science-major').addClass('d-none');
    $('.degree-arts-major').addClass('d-none');
    $('.degree-arts').addClass('d-none');
    $('.degree-commerce-major').addClass('d-none');
    $('.degree-commerce').removeClass('d-none');
    $('.degree-science').addClass('d-none');
  })
})



</script>
@stop


