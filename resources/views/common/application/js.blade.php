{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('public/js/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/js/additional-methods.js')}}"></script>
<script type="text/javascript">
    $('#dob').Zebra_DatePicker({
        format: 'Y-m-d',
        direction:-1
    });
    $(document).on("contextmenu",function(e){
       e.preventDefault();
    });
</script>
<noscript><meta http-equiv="refresh" content="0; URL={{Url("/no_script")}}" /></noscript>
<script type="text/javascript">
  /*$('#submit').click(function(){
 // console.log($('.compulsory input[type="checkbox"]').filter(':checked').length);
 $.validator.addMethod("oneormorechecked", function(value, element, param) {
  return $('.compulsory input[type="checkbox"]:checked').length == param;
}, "All compulsory subjects must be selected");

$.validator.addMethod("altsubject", function(value, element, param) {
  depends: function(element) {
          return $(".alt-english-mil").prop("checked") == param;
        }

}, "kkkkkkkkkkkkk");*/

/*$("#application").validate({

  rules: {
    "opt-subject[]": {
      required: true,
      minlength: 1
    },
    "subjects[]":{
      required: true
    }

  },
  messages: {
    "opt-subject[]": "Please select at least one types of spam."
    //"subject[]" : "Please select all compulsory subjects"
  }

});
 });*/
 // new code added.
$(document).ready(function(){
    /*console.log = function(){

    }*/
    var bootstrapOptionsValidator =
    {errorElement: "span",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "invalid-feedback" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".form-group" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ||  element.prop( "type" ) === "radio") {
                error.insertAfter( element.parent( "label" ).parent("div") );
            } else {
                error.insertAfter( element );
            }
            element.addClass('is-invalid');

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
            if ( $( element ).prop( "type" ) === "checkbox" ||  $( element ).prop( "type" ) === "radio") {
                $( element ).removeClass('is-invalid');
            }else
                $( element ).removeClass('is-invalid').addClass('is-valid');
        }};

        // Custom Validation
    $('form#application').on('submit', function(event) {
        $(".se-pre-con").fadeIn("slow");

        $("input[name='caste_id'").rules("add",
        {
            required: true,
            messages:{
                required:"Please select caste."
            }
        });
        $("input[name='course_id'").rules("add",
        {
            required: true,
            number: true,
            messages: {
                number: "Select a valid Course."
            }
        });
        $("input[name='stream_id'").rules("add",
        {
            required: true,
            number: true,
            messages: {
                number: "Select a valid Stream."
            }
        });
        $("input[name='semester_id'").rules("add",
        {
            required: true,
            number: true,
            messages: {
                number: "Select a valid Semester."
            }
        });
        $("input[name='dob'").rules("add",
        {
            required: true,
            maxlength: 60
        });
        $("input[name='gender'").rules("add",
        {
            required: true
        });
        $("input[name='mothers_name'").rules("add",
        {
            required: true,
            maxlength: 60
        });
        $("input[name='religion'").rules("add",
        {
            required: true
        });
        $("input[name='present_vill_or_town'").rules("add",
        {
            required: true
        });
        $("input[name='present_city'").rules("add",
        {
            required: true
        });
        $("input[name='present_pin'").rules("add",
        {
            required: true,
            number: true,
            maxlength:6,
            minlength:6
        });
        $("select[name='blood_group'").rules("add",
        {
            required: true
        });
        $("select[name='percentage'").rules("add",
        {
            required: true,
            number: true
        });
        $("select[name='all_total_marks'").rules("add",
        {
            required: true,
            number: true
        });
        /*var course_id = $("#course_id:checked").val();
        if (course_id != undefined) {
            console.log("course is checked");
            if (course_id == 1) {
                // higher secondary validation
                var stream = $("#stream_id:checked").val();
                if (stream != undefined) {
                    if (![4,6,8].includes(stream_id)) {
                        $without_major_subjects = $("#without_major_subjects");
                        $without_major_subjects.find(".select_subjects").each(function(index, element){
                            $(element).rules("add",{
                                required: true,
                                number: true,
                                messages: {
                                    required: "Subjecet Field is required"
                                }
                            });
                        });
                        if($without_major_subjects.length <= 0){
                            alert("Something wrong. Please Select Course/Stram/Semester proper way.");
                            return false;
                        }
                    // else major
                    }else if([4,6,8].includes(stream_id)){
                        $("#subjects_with_major").find(".with_major_subject_row").each(function(ind, row){
                            $(row).find(".select_subjects").each(function(index, element){
                                $(element).rules("add",{
                                    required: true,
                                    number: true,
                                    messages: {
                                        required: "Subjecet Field is required"
                                    }
                                });
                            });
                        });
                        $("#subjects_with_major").find(".major_subjects").each(function(index, element){
                            $(element).rules("add",{
                                required: true,
                                number: true,
                                messages: {
                                    required: "Subjecet Field is required"
                                }
                            });
                        });
                    }
                }else{
                    $("input[name='stream_id'").rules("add", {
                        required: true,
                        messages:{
                            required:"Please select Valid Stream."
                        }
                    });
                }

                //end of higher secodary validation

            }
        }else{
            $("input[name='course_id'").rules("add", {
                required: true,
                messages:{
                    required:"Please select a course."
                }
            });
        }*/

        var board = $("#last_board_or_university").val();
        if (board == "OTHER") {
            console.log($("#other_board_university"));
            if($("#other_board_university").val() == undefined){
                alert("Please specify other board.");
                return false;
                event.preventDefault();
            }else{
                $("input[name='other_board_university'").rules("add",{
                    required: true,
                    number: false
                });
            }
        }
        if ({{(isset($application) ? 0 : 1)}}) {

            $("input[name='passport'").rules("add",
            {
                extension: "jpe?g|png",
                required: true,
                maxsize: 100000,
                "messages": {
                    maxsize: "Max File Size is 100KB",
                    extension: "Accept only jpg/jpeg file",
                    required: "Passport Photo is required"
                }
            });
            $("input[name='sign'").rules("add",
            {
                extension: "jpe?g|png",
                required: true,
                maxsize: 100000,
                "messages": {
                    maxsize: "Max File Size is 100KB",
                    extension: "Accept only jpg/jpeg file",
                    required: "Signature Photo is required"
                }
            });
            $("input[name='marksheet'").rules("add",
            {
                extension: "jpe?g|png",
                maxsize: 1000000,
                required: true,
                "messages": {
                    maxsize: "Max File Size is 1 MB",
                    extension: "Accept only jpg/jpeg file"
                }
            });
            if($("input[name='caste_id']:checked").val() != 1){

                $("input[name='caste_certificate'").rules("add",
                {
                    extension: "jpe?g|png",
                    maxsize: 1000000,
                    required: true,
                    "messages": {
                        maxsize: "Max File Size is 1 MB",
                        extension: "Accept only jpg/jpeg file"
                    }
                });
            }else{
                $("input[name='caste_certificate'").rules("add",
                {
                    extension: "jpe?g|png",
                    maxsize: 1000000,
                    required: false,
                    "messages": {
                        maxsize: "Max File Size is 1 MB",
                        extension: "Accept only jpg/jpeg file"
                    }
                });
            }
            // annual income
            if($("#annual_income").val() < 100000 && $("#annual_income").val() != 0){
                if($("#course_id").val() == 3){
                    return true;
                }
                if($("input[name='free_admission']:checked").val() == 'yes'){
                    $("input[name='income_certificate'").rules("add",
                    {
                        extension: "jpe?g|png",
                        maxsize: 1000000,
                        required: true,
                        "messages": {
                            maxsize: "Max File Size is 1 MB",
                            extension: "Accept only jpg/jpeg file"
                        }
                    });
                }else{
                    $("input[name='income_certificate'").rules("add",
                    {
                        extension: "jpe?g|png",
                        maxsize: 1000000,
                        required: false,
                        "messages": {
                            maxsize: "Max File Size is 1 MB",
                            extension: "Accept only jpg/jpeg file"
                        }
                    });
                }
            }else{
                $("input[name='income_certificate'").rules("add",
                {
                    extension: "jpe?g|png",
                    maxsize: 1000000,
                    required: false,
                    "messages": {
                        maxsize: "Max File Size is 1 MB",
                        extension: "Accept only jpg/jpeg file"
                    }
                });
            }
            // Plantation Image
            if($("input[name='free_admission']:checked").val() == "yes"){

                $("input[name='image_of_tree_plantation'").rules("add",
                {
                    extension: "jpe?g|png",
                    maxsize: 1000000,
                    required: true,
                    "messages": {
                        maxsize: "Max File Size is 1 MB",
                        extension: "Accept only jpg/jpeg file"
                    }
                });
            }else{
                $("input[name='image_of_tree_plantation'").rules("add",
                {
                    extension: "jpe?g|png",
                    maxsize: 1000000,
                    required: false,
                    "messages": {
                        maxsize: "Max File Size is 1 MB",
                        extension: "Accept only jpg/jpeg file"
                    }
                });
            }
        }

        // test if form is valid
        if($('form#application').validate(bootstrapOptionsValidator).form()) {
            $(this).unbind('submit').submit();
            console.log("Validation Success.");
        } else {
            console.log("Validation Errors.");
            event.preventDefault();
            $(".se-pre-con").fadeOut("slow");
        }
    });
    $("form#application").validate(bootstrapOptionsValidator);
    // blocking default submit function
});

$('.rdCourse').change(function(){
  //alert($(this).val());
  if($(this).val() == 1){
    $('.degree-panel').addClass('d-none');
    $('.hs-panel :input').attr('disabled', false);
    $('.degree-panel :input').attr('disabled', true);
    // added
    $('.hs-stream :input').attr('disabled', false);
    $('.hs-semeste :input').attr('disabled', false);

    $('.degree-semester').addClass('d-none');
    $('.degree-stream').addClass('d-none');
    $('.hs-stream').removeClass('d-none');
    $('.hs-semester').removeClass('d-none');
  }
  else{
    $('.hs-panel :input').attr('disabled', true);
    // added
    $('.hs-stream :input').attr('disabled', true);
    $('.hs-semeste :input').attr('disabled', true);

    $('.degree-panel :input').attr('disabled', false);
    $('.degree-semester').removeClass('d-none');
    $('.hs-semester').addClass('d-none');
    $('.degree-stream').removeClass('d-none');
    $('.hs-stream').addClass('d-none');
    $('.hs-panel').addClass('d-none');
  }

});
//HS Semester
$(document).on("click",".Science", function(){
  $(".hs-subjects-science").removeClass('d-none');
  $(".hs-subjects-arts").addClass('d-none');
  $(".hs-subjects-commerce").addClass('d-none');
  // disabling inputs for
  $(".hs-subjects-arts :input").prop('disabled', true);
  $(".hs-subjects-commerce :input").prop('disabled', true);
  $(".hs-subjects-science :input").prop('disabled', false);
});

$(document).on("click",".Arts", function(){
  $(".hs-subjects-science").addClass('d-none');
  $(".hs-subjects-arts").removeClass('d-none');
  $(".hs-subjects-commerce").addClass('d-none');


  // disabling inputs for
  $(".hs-subjects-arts :input").prop('disabled', false);
  $(".hs-subjects-commerce :input").prop('disabled', true);
  $(".hs-subjects-science :input").prop('disabled', true);
});

$(document).on("click",".Commerce", function(){
  $(".hs-subjects-arts").addClass('d-none');
  $(".hs-subjects-science").addClass('d-none');
  $(".hs-subjects-commerce").removeClass('d-none');
  $(".hs-subjects-science").removeClass('disabled', true);

  // disabling inputs for
  $(".hs-subjects-arts :input").prop('disabled', true);
  $(".hs-subjects-commerce :input").prop('disabled', false);
  $(".hs-subjects-science").prop('disabled', true);

});

$(document).on("click",".rdSubject", function(){
  $('.sub').html('');
  var subjectId = $(this).val();
  var streamId = $("input[name='stream']:checked").val();
  $.get("{{route('common.api.moresubject.index')}}/?stream_id="+streamId+"&parent_id="+subjectId, function(data, status){
    var subject1 = "<div style='margin-left:50px'>";
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

$(document).on("click",".alt-english-mil", function(){
  if($(this).is(":checked") == true){
    $('.alteng-mil').removeClass('d-none');
  }else{
    $('.alteng-mil').addClass('d-none');
  }
})

$(document).on("click",".mil", function(){
    if ($(this).is(":checked")) {
        $('.all-mil').removeClass('d-none');
    }else{
        $('.all-mil').addClass('d-none');
    }
})

$(document).on("click",".alt-english", function(){
  $('.all-mil').addClass('d-none');
})

$(document).on("click","#hs-history-arts", function(){
  if($(this).is(":checked") == true){
    $('.hs-history-arts').removeClass('d-none');
  }else{
    $('.hs-history-arts').addClass('d-none');
    $('.hs-history-arts :input').prop('checked', false);
  }
});
$(document).on("click","#hs-geography-arts", function(){
  if($(this).is(":checked") == true){
    $('.hs-geography-arts').removeClass('d-none');
  }else{
    $('.hs-geography-arts').addClass('d-none');
    $('.hs-geography-arts :input').prop('checked', false);
  }
});
$(document).on("click","#hs-logic-arts", function(){
  if($(this).is(":checked") == true){
    $('.hs-logic-arts').removeClass('d-none');
  }else{
    $('.hs-logic-arts').addClass('d-none');
    $('.hs-logic-arts :input').prop('checked', false);
  }
});
$(document).on("click","#hs-home-arts", function(){
  if($(this).is(":checked") == true){
    $('.hs-home-arts').removeClass('d-none');
  }else{
    $('.hs-home-arts').addClass('d-none');
    $('.hs-home-arts :input').prop('checked', false);
  }
});
$(document).on("click","#hs-sanskrit-arts", function(){
  if($(this).is(":checked") == true){
    $('.hs-sanskrit-arts').removeClass('d-none');
  }else{
    $('.hs-sanskrit-arts').addClass('d-none');
    $('.hs-sanskrit-arts :input').prop('checked', false);
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
  var totalMarks = $('#total_marks').val();
  var percentage = (totalMarks/500)*100;
  $('#percentage').val(percentage);
}

$(document).ready(function(){
  $('#type_cgpa').click(function(){
    $(".total_marks").val('10');
    $(".total_score").val(0);
    $('#percentage').val('');
    $('#all_total_marks').val('');
    changePlaceholderSubjects();
  })
  $('#type_percentage').click(function(){
    $(".total_marks").val('100');
    $(".total_score").val(0);
    $('#percentage').val('');
    $('#all_total_marks').val('');
    changePlaceholderSubjects();
  })

  $(".cell, .total_marks").on('keyup', function(){
    console.log("Key Upc from .cell");
    var sum = 0;
    var data ={
    }
  /* console.log($(this).val()) */;
  var compulsory_subject_marks  = [];
  var other_subject_marks       = [];
  var na_subjects_marks         = [];
  var total_marks_for_pg        = 0;
    $(".cell").each(function(index, item){
        if ($(item).data("compulsory") == "yes") {
            if (isNaN(parseFloat($(item).val()))) {
                compulsory_subject_marks.push(0);
            }else
                compulsory_subject_marks.push(parseFloat($(item).val()));
        }
        if ($(item).data("compulsory") == "no") {
            if (isNaN(parseFloat($(item).val()))) {
                other_subject_marks.push(0);
            }else
                other_subject_marks.push(parseFloat($(item).val()));

        }
        if($(".last_subjects").eq(index).val().toLowerCase().replace(/\./g, "").trim() == "na"){
             if (isNaN(parseFloat($(item).val()))) {
                na_subjects_marks.push(0);
            }else
                na_subjects_marks.push(parseFloat($(item).val()));
        }else{
            total_marks_for_pg += parseFloat($(".total_marks").eq(index).val());
        }
      // var val = $(item).val();
      // alert(val);
      if($("#course_id").val() != 3){
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
      }

        // var get_val = $(this).val();
        // sum += Number(get_val);
    });
    // after storing value into
    sum = arrSum(compulsory_subject_marks);
    sum += arrSum(other_subject_marks);
    if(na_subjects_marks.length > 0){
        sum -= arrSum(na_subjects_marks);
    }
    console.log(other_subject_marks);
    console.log(compulsory_subject_marks);
    if ($("#course_id").val() == 2) {
        if($("#type_percentage").is(":checked")){
            sum -= Math.min(...other_subject_marks);
        }else if($("#type_cgpa").is(":checked")){
            sum -= parseFloat(other_subject_marks[(other_subject_marks.length-1)]);
        }
    }else if($("#course_id").val() == 1){
        if($("#type_cgpa").is(":checked")){
            sum -= parseFloat(other_subject_marks[(other_subject_marks.length-1)]);
        }
    }
    console.log("sum is "+sum);
    if($('#type_percentage').prop('checked') === true){
        if ($("#course_id").val() == 2) {
            // sum -= Math.min(...other_subject_marks);
            var percent = (sum/500)*100;
        }else if($("#course_id").val() == 1){
            // var percent = (sum/600)*100;
            var calculation_total_marks = 0;
            $(".last_subjects").each(function(){
                if($(this).val().toLowerCase().replace(/\./g, "").trim() == "na"){

                }else{
                    calculation_total_marks+=1;
                }
            });
            calculation_total_marks = calculation_total_marks * 100;
            var percent = (sum/calculation_total_marks)*100;
        }else if($("#course_id").val() == 3){
            console.log("total_marks_for_pg");
            console.log(total_marks_for_pg);
            var percent =  (sum/total_marks_for_pg) * 100
        }
        var tmarks = sum;
    }

    if($('#type_cgpa').prop('checked') === true){
        var tmarks = sum*9.5;
        if ($("#course_id").val() == 2) {
            var percent = (tmarks/500)*100;
        }else if($("#course_id").val() == 1){
            var percent = (tmarks/500)*100;
        }else if($("#course_id").val() == 2){
            var calculation_total_marks = 0;
            $(".last_subjects").each(function(){
                if($(this).val().toLowerCase().replace(/\./g, "").trim() == "na"){

                }else{
                    calculation_total_marks+=1;
                }
            });
            calculation_total_marks = calculation_total_marks * 100;
            var percent = (tmarks/calculation_total_marks)*100;
            // var percent = (tmarks/500)*100;
        }else if($("#course_id").val() == 3){
            console.log("total_marks_for_pg");
            console.log(total_marks_for_pg);
            // var percent =  (sum/total_marks_for_pg) * 100
            percent = tmarks;
            tmarks = Math.round((percent/100) * total_marks_for_pg);
        }
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
});
// Added 2019-05-15
$(".2nd-compulsory").change(function(){
    console.log("compulsory subject arts");
    if($(this).is(":checked")){
        var other_compulsory = $(".2nd-compulsory").not($(this));
        other_compulsory.prop("checked", false).trigger("changed");
        other_compulsory.each(function(index, element){
            var $el = $(element);
            $el.parents("label").next(".margin").find("input").prop("checked", false);
            // $(".all-mil").find("input").prop("checked", false);
        });
    }else{
        var other_compulsory = $(".2nd-compulsory");
        other_compulsory.prop("checked", false).trigger("changed");
        other_compulsory.each(function(index, element){
            var $el = $(element);
            $el.parents("label").next(".margin").find("input").prop("checked", false);
            // $(".all-mil").find("input").prop("checked", false);
        });
    }
});
$(".all-mil :input").change(function(){
    if($(this).is(":checked")){
        $(".all-mil :input").not($(this)).prop("checked", false);
    }
});
$("input[name='subjects[]']").change(function(){
    var is_mil_subjects = $(this).parents(".compalsory");
    if(is_mil_subjects.length){
        return true;
    }
    var is_sub_under_category = $(this).parents(".margin");
    if (is_sub_under_category.length) {
        // if subject is under category
        // check multiple or single select
        is_sub_under_category.find("input").not($(this)).prop("checked", false);
    }
    console.log(is_sub_under_category);
    var is_hs_panel = $(this).parents(".hs-panel");
    if (is_hs_panel.length) {
        if (is_hs_panel.find("input[name='subjects[]']:checked").length > 4) {
            alert("Maximum optional subject is 4.");
            // deselect first check box and hide margin data
            $(this).prop("checked", false);
            if (is_sub_under_category.length) {
                is_sub_under_category.prev("label").find("input").trigger("click");
            }
            return false;
        }
    }
});

majorChanged = function(Obj, ids){

	var $this = $(Obj);
    console.log($this.val());
	// if ($this.val() == '') {
	// 	//hide subjets and deselet inputs
	// 	return false;
	// }
  //var ids="#subject_td";
	var subject_class  = $this.val()+'_major';
	console.log(subject_class);
	var current_row = $this.parents("tr");

	current_row.find(ids).find(".form-group").hide(function(){
		$(this).find("input[type='checkbox']").prop("checked",  false);
        $(this).find(".margin").hide();
	});
	current_row.find(ids).find("#"+subject_class).show();

}
subjectSelected = function(Obj){
	if ($(Obj).is(":checked")) {
		$(Obj).parent("label").next(".margin").show(function(){
			//deselect box
     // $(Obj).parent("label").next(".margin").removeClass('d-none');
		})
	}else{
		$(Obj).parent("label").next(".margin").hide(function(){
			//deselect box
		});
    }
}
addSubjectSelected = function (Obj) {
    var $this = $(Obj);
    console.log("hitted addSubjectSelected");
    $this.parents(".margin").find("input[type='checkbox']").not($this).prop("checked", false);
    $this.parents(".margin").find("input[type='checkbox']").each(function(index, el) {
        console.log(el)
    });
}

clearFormData = function(id,param1,param2,param3,param4,param5){
  //console.log(param1);
  $('.'+id+ ':input').attr('disabled', false);
  $('.'+param1+ ':input').attr('disabled', true);
  $('.'+param2+ ':input').attr('disabled', true);
  $('.'+param3+ ':input').attr('disabled', true);
  $('.'+param4+ ':input').attr('disabled', true);
  $('.'+param5+ ':input').attr('disabled', true);
  $('.'+param1+ ' select').attr('disabled', "disabled");
  $('.'+param2+ ' select').attr('disabled', "disabled");
  $('.'+param3+ ' select').attr('disabled', "disabled");
  $('.'+param4+ ' select').attr('disabled', "disabled");
  $('.'+param5+ ' select').attr('disabled', "disabled");
  //console.log( $('.'+id+ ':input'));
}
$(document).ready(function() {
    // var max_subject = ;
    var subjects = {!!json_encode($stream_wise_subjects)!!};
    @php
        if (isset($application)) {
            $applied_stream = $application->appliedStream->stream_id;
            if (in_array($applied_stream, [4,6,8])) {
                echo 'hideAndDisabled("#without_major_subjects");';
            } else {
                echo 'hideAndDisabled("#subjects_with_major");';
            }
        }else
            echo 'hideAndDisabled("#subject_column");';
    @endphp
    // boardCondition();
    if(parseInt($("#course_id").val()) == 1 || parseInt($("#course_id").val()) == 2 || parseInt($("#course_id").val()) == 3){
        $("#course_id").trigger("change");
    }
  $('#application')[0].reset();
	$(".degree-science-major").find("tr").each(function(index, el) {
		$(el).find("#subject-td-science-major").find(".form-group, .margin").hide();
	});
  $(".degree-arts-major").find("tr").each(function(index, el) {
    $(el).find("#subject-td-arts-major").find(".form-group, .margin").hide();
  });

  @isset($application)
  {!!$application->course_id == 1 ? "clearFormData('hs-panel','degree-science-major','degree-science','degree-arts-major','degree-arts','degree-commerce-major');":''!!}
  @endisset
  // new code
    $(document).on("change", "#course_id", function(){
        var course_id = $(this).val();
        // for streams
        var current_stream = $(".stream-"+course_id);
        var other_streams = $(".stream").not(current_stream);
        other_streams.addClass("d-none").find("select, input").prop("disabled", true).val("");
        current_stream.find("input, select").prop("disabled", false);
        current_stream.removeClass('d-none');

        // for Semesters
        var current_semester = $(".semester-"+course_id);
        var other_semesters = $(".semester").not(current_semester);
        other_semesters.addClass("d-none").find("select, input").prop("disabled", true).val("");
        current_semester.find("input, select").prop("disabled", false);
        current_semester.removeClass('d-none').find("option").prop("disabled", false);
        resetSubjects();
        boardCondition(course_id);
    });
    $(document).on("change", "#stream_id", function(){
      return false;
        console.log(subjects);
        var stream_id = parseInt($(this).val());
        if (isNaN(stream_id)) {
            // blank function which will reset all subjects
            hideAndDisabled("#subject_column");
            resetSubjects();
        }else{
            var stream_subject =  subjects[stream_id];
            if (typeof subjects[stream_id] == 'undefined') {
                alert("Subject not found for the selected course/stream.");
                return false;
            }
            // loop through index
            // if not major
            if (![4,6,8].includes(stream_id)) {
                console.log("General Stream selected");
                hideAndDisabled('#subjects_with_major');
                showAndEnabled('#without_major_subjects');
                $("#without_major_subjects").find(".select_subjects").each(function(index, element){
                    $(this).html('<option value="" disabled selected>--SELECT--</option>');
                    if(typeof stream_subject[(index+1)]  == 'undefined'){
                        $(this).append('<option value="NA">N/A</option>');
                    }else{
                        var subject_per_no_wise = stream_subject[(index+1)];
                        for (var i = 0; i <=  subject_per_no_wise.length - 1; i++) {
                            console.log(subject_per_no_wise[i]);
                            $(this).append('<option value="'+subject_per_no_wise[i].id+'">'+subject_per_no_wise[i].name+'</option>')
                        }
                    }
                });
            // else major
            }else if([4,6,8].includes(stream_id)){
                hideAndDisabled('#without_major_subjects');
                showAndEnabled('#subjects_with_major');
                console.log("Major Stream selected");
                $("#subjects_with_major").find(".with_major_subject_row").each(function(ind, row){
                    $(row).find(".select_subjects").each(function(index, element){

                        $(this).html('<option value="" disabled selected>--SELECT--</option>');
                        if(typeof stream_subject[(index+1)]  == 'undefined'){
                            $(this).append('<option value="NA">N/A</option>');
                        }else{
                            var subject_per_no_wise = stream_subject[(index+1)];
                            for (var i = 0; i <=  subject_per_no_wise.length - 1; i++) {
                                console.log(subject_per_no_wise[i]);
                                $(this).append('<option value="'+subject_per_no_wise[i].id+'">'+subject_per_no_wise[i].name+'</option>')
                            }
                        }
                    });
                });
                $("#subjects_with_major").find(".major_subjects").each(function(index, element){
                    $(this).html('<option value="" disabled selected>--SELECT--</option>');
                    if(typeof stream_subject[""]  == 'undefined'){
                        $(this).append('<option value="NA">N/A</option>');
                    }else{
                        var subject_per_no_wise = stream_subject[""];
                        // blank means with major
                        for (var i = 0; i <=  subject_per_no_wise.length - 1; i++) {
                            console.log(subject_per_no_wise[i]);
                            if (subject_per_no_wise[i].major) {
                                $(this).append('<option value="'+subject_per_no_wise[i].id+'">'+subject_per_no_wise[i].name+'</option>')
                            }
                        }
                    }
                });
            }else{
                hideAndDisabled('#without_major_subjects');
                hideAndDisabled('#subjects_with_major');
            }
            console.log(subjects[stream_id]);
        }
    });
    $(document).on("change",".select_subjects", function(){
        if ($(this).val() == "") {
            return false;
        }else{
            console.log($(this).find("option:selected").text());
            var $current = $(this);
            if ($current.find("option:selected").text().toLowerCase() == 'n/a') {
                return true;
            }
            if ($(this).parents("#without_major_subjects").length > 0) {
                // not major condition
                $("#without_major_subjects").find(".select_subjects").not($current).each(function(index, element){
                    if($(element).find("option:selected").length > 0){
                        if($(element).find("option:selected").text().toLowerCase() == $current.find("option:selected").text().toLowerCase()){
                            alert($current.find("option:selected").text()+" is already selected as subject "+(index+1)+'.');
                            $current.val("");
                            $(element).focus();
                            return false;
                        }
                    }
                });
            }else if($(this).parents("#subjects_with_major").length > 0){
                $(this).parents('tr').find(".select_subjects").not($current).each(function(index, element){
                    if($(element).find("option:selected").length > 0){
                        if($(element).find("option:selected").text().toLowerCase() == $current.find("option:selected").text().toLowerCase()){
                            alert($current.find("option:selected").text()+" is already selected as subject "+(index+1)+'.');
                            $current.val("");
                            $(element).focus();
                            return false;
                        }
                    }
                });
            }
        }
    });
    $(document).on("change",".any_gap", function(){
        if ($(this).is(":checked") && $(this).val() == "yes") {
            $("#gap_certificate").prop({"required": true, "disabled":false});
        }else
            $("#gap_certificate").prop({"required": false, "disabled":true});
    });
    $(document).on("change","input[name='differently_abled']", function(){
        if ($(this).is(":checked")) {
            $("#differently_abled").prop("required", true);
        }else
            $("#differently_abled").prop("required", false);
    });
    $(document).on("change","input[name='co_curricular']", function(){
        if ($(this).is(":checked")) {
            $("#co_curricular_certificate").prop("required", true);
        }else
            $("#co_curricular_certificate").prop("required", false);
    });
    $(document).on("change",".major_subjects", function(){
        $current = $(this);
        $(".major_subjects").not($current).each(function(index, element){
            if($(element).find("option:selected").length > 0){
                if($(element).find("option:selected").text().toLowerCase() == $current.find("option:selected").text().toLowerCase()){
                    alert($current.find("option:selected").text()+" is already selected as "+(index+1)+' Preference.');
                    $current.val("");
                    $(element).focus();
                    return false;
                }
            }
        });
    });
    $(document).on("input",".present_address", function(){
        if ($("#address_same").is(":checked")) {
            var current_input_name = $(this).prop("name");
            current_input_name = current_input_name.replace('present', 'permanent')
            $("input[name='"+current_input_name+"']").val($(this).val());
            $("input[name='"+current_input_name+"']").focus();
            $(this).focus();
        }
    });
    $(document).on("change","#course_id", function(){
        // var e = $.Event('keyup');
        // e.keyCode = 16;
        $(document).find(".cell").first().trigger("keyup");
        changePlaceholderSubjects();
    });
    $(document).on("input","#address_same", function(){
        if ($("#address_same").is(":checked")) {
            $(".present_address").each(function(index, element){
                if ($(this).val() != "") {
                    $(this).trigger("input");
                }
            });
            $(".permanent_address").prop("readonly", true);
        }else
            $(".permanent_address").prop("readonly", false).val('');
    });
    $(document).on("change","#last_board_or_university", function(){
        if ($(this).val() == "OTHER") {
            showAndEnabled("#other_board_university_row");
            $("#other_board_university").prop("required", true);
        }else
            hideAndDisabled("#other_board_university_row");
            $("#other_board_university").prop("required", false).val("");
    });
    $(document).on("input","#annual_income", function(){
        var course_id = $("#course_id").val();
        if(course_id == 3 || course_id.trim() == ""){
            return true;
        }
        var income = $(this).val();
        income = parseFloat(income);
        if (income < 100000){
            $("#free_admission_row").find("input").prop("disabled", false);
            $("#income_certificate").prop({"disabled": false, "required": false});
        }else{
            $("#free_admission_row").find("input").prop({"disabled": true, "checked": false}).eq(1).prop({"checked" : true}).trigger("change");
            $("#income_certificate").prop({"disabled": true, "required": false});
        }
    });
    $(document).on("change","input[name='free_admission']", function(){
        var free_admission = $(this).val();
        if (free_admission == "yes") {
            $("#image_of_tree_plantation").prop({"required": true, "disabled":false});
        }else
            $("#image_of_tree_plantation").prop({"required": false, "disabled": true});
    });
    $(document).on("change","input[name='caste_id']", function(){
        var caste = $(this).val();
        if (caste != 1) {
            $("#caste_certificate").prop({"required": true, "disabled":false});
        }else
            $("#caste_certificate").prop({"required": false, "disabled": true});
    });
    $(document).on("change","input[name='differently_abled']", function(){
        var is_selected = $(this).is(":checked");
        if (is_selected) {
            $("#differently_abled").prop({"required": true, "disabled":false});
        }else
            $("#differently_abled").prop({"required": false, "disabled": true});
    });
    $(document).on("change","input[name='co_curricular']", function(){
        var is_selected = $(this).is(":checked");
        if (is_selected) {
            $("#co_curricular_certificate").prop({"required": true, "disabled":false});
        }else
            $("#co_curricular_certificate").prop({"required": false, "disabled": true});
    });
    $(document).on("input",".last_subjects", function(){
        $(document).find(".cell").first().trigger("keyup");
    });
    $(document).on("change","input[name='sign']", function(){
        console.log("Image size checking.");
        var _URL = window.URL || window.webkitURL;
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                // alert(this.width + " " + this.height);

                if (this.width > 200) {
                    $("input[name='sign']").val("");
                    alert("Image max width is 200px");
                    return false;
                }
                if (this.height > 150) {
                    $("input[name='sign']").val("");
                    alert("Image max height is 150px");
                    return false;
                }
            };
            img.onerror = function() {
                alert( "not a valid file: " + file.type);
                $("input[name='sign']").val("");
            };
            img.src = _URL.createObjectURL(file);
        }
    });
    $(document).on("change","input[name='passport']", function(){
        console.log("Image size checking.");
        var _URL = window.URL || window.webkitURL;
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                // alert(this.width + " " + this.height);

                if (this.width > 200) {
                    $("input[name='passport']").val("");
                    alert("Image max width is 200px");
                    return false;
                }
                if (this.height > 250) {
                    $("input[name='passport']").val("");
                    alert("Image max height is 250px");
                    return false;
                }
            };
            img.onerror = function() {
                alert( "not a valid file: " + file.type);
                $("input[name='passport']").val("");
            };
            img.src = _URL.createObjectURL(file);
        }
    });
    @if(isset($application))
        $("select[name='last_board_or_university_state']").val('{{$application->last_board_or_university_state}}');
    @endif
});
majorChangedLatest  = function(){
    return true;
}
resetSubjects = function(){
    $(".select_subjects").each(function(index, element){
        $(this).html('<option value="" disabled selected>--SELECT--</option>');
    });
    $(".major_subjects").each(function(index, element){
        $(this).html('<option value="" disabled selected>--SELECT--</option>');
    });
}
hideAndDisabled = function(field_id_name){
    var $selected_field = $(field_id_name);
    if ($selected_field.length > 0) {
        $selected_field.addClass('d-none').find("input, select, textarea").prop("disabled", true);
    }
}
showAndEnabled = function(field_id_name){
    $("#subject_column").removeClass("d-none");
    var $selected_field = $(field_id_name);
    if ($selected_field.length > 0) {
        $selected_field.removeClass('d-none').find("input, select, textarea").prop("disabled", false);
    }
}
boardCondition = function(course){
    if(course == 2){
        $("#last_board_or_university").find("option").eq(2).after('<option value="AHSEC">AHSEC</option>');
    }else{
        $("#last_board_or_university").find("option[value='AHSEC']").remove();
    }
}
const arrSum = arr => arr.reduce((a,b) => a + b, 0);
changePlaceholderSubjects = function(){
    var course_id = $("#course_id").val();
    if (course_id == 1) {
        // for hs
        if($("#type_cgpa").is(":checked")){
            $(".last_subjects").each(function(index, element){
                if (index < 5) {
                    $(element).attr("placeholder","CORE "+(index + 1));
                }else{
                    $(element).attr("placeholder","ELECT "+((index-5) +1)+" (will not be calculated in percentage.)");
                }
            });
        }else{
            $(".last_subjects").each(function(index, element){
                $(element).attr("placeholder","Subject "+(index +1));
            });
        }
        $(".total_marks").prop("readonly", true);
        $(".total_score").prop("max", 100);
    }else if(course_id == 2){
        // for degree
        // for percentage
        if($("#type_percentage").is(":checked")){
            $(".last_subjects").each(function(index, element){
                if (index <2) {
                    $(element).attr("placeholder","CORE "+(index +1));
                }else{
                    $(element).attr("placeholder","ELECT "+((index-2) +1)+" (Best of 3 elective will be used to calculated percentage.)");
                }
            });
        }else if($("#type_cgpa").is(":checked")){
            $(".last_subjects").each(function(index, element){
                if (index < 5) {
                    $(element).attr("placeholder","CORE "+(index + 1));
                }else{
                    $(element).attr("placeholder","ELECT "+((index-5) +1)+" (will not be calculated in percentage.)");
                }
            });
        }
        $(".total_marks").prop("readonly", true);
        $(".total_score").prop("max", 100);
        // for CGPA
    }else if(course_id == 3){
        $(".last_subjects").each(function(index, element){
            if (index <1) {
                $(element).attr("placeholder","MAJOR SUBJECT");
            }else{
                $(element).attr("placeholder","ELECTIVE");
            }
        });
        $(".total_marks").prop("readonly", false);
        $(".total_score").removeAttr("max");
    }
}
</script>
