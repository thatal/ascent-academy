<script type="text/javascript" src="{{ asset('public/js/jquery.validate.js')}}"></script>
<script type="text/javascript">
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
    $(document).ready(function(){
        @php
            $subjects            = $application->appliedStream->stream->subjects;
            $stream_id           = $application->appliedStream->stream_id;
        @endphp
        stream_id = {{$stream_id}};
        subjects = {!!json_encode($subjects)!!};
        not_in_combination = {
  "2": [
    [
      "History",
      "Sociology",
      "Home Science"
    ],
    [
      "Political Science",
      " Computer Science  & Application"
    ],
    [
      "Geography",
      "Statistics"
    ],
    [
      "Logic & Philosophy",
      "Psychology"
    ],
    [
      "Home Science",
      "Computer Science & Application"
    ],
    [
      "Adv. Assamese",
      "Adv. Bengali",
      "Adv. Hindi"
    ]
    
  ],
  "3": [
    [
      "Commercial Mathematics and Statistics (C.M.S.T.)",
      "Mathematics",
      "Computer Science & Application"
    ]
  ],
  "5": [
    [
      "Botany",
      "Home Science"
    ]
  ],
  "7": [
    [
      "Political Science",
      "Geography",
      "Home Science",
      "Psychology"
    ],
    [
      "Economics",
      "Philosophy"
    ],
    [
      "Education",
      "History"
    ]
  ]
};
        single_combinations = {"2":[["Mathematics* (* Eco+Stats+Maths combination)"]]};
        // in_combination = {"3":[["Commercial Mathematics and Statistics (C.M.S.T.)","Mathematics"],["Commercial Mathematics and Statistics (C.M.S.T.)","Computer Science & Application"]]};
        in_combination = {"3":[]};
        // single_combinations = {"3":[["Mathematics* (* Eco+Stats+Maths combination)"]]};
        console.log(subjects);
        $(document).on("change", ".subjects", function(){
            var $current = $(this);
            // console.log($current.val());
            if($current.val() == "" || $current.val() == null || $current.val() == "NA"){
                return false;
            }
            var selected_subject = $current.find("option:selected").text();
            $(".subjects").not($current).each(function(index, element){
                var each_selected_subject = $(element).val();
                var each_selected_subject_no = $(element).data("subject-no");
                if(selected_subject == $(element).find("option:selected").text()){
                    if(index == 1 || index == 0){
                        alert(selected_subject +" is already selected as "+each_selected_subject_no);
                    }else{
                        alert(selected_subject+" is already selected as "+each_selected_subject_no);
                    }
                    $current.val("");
                    return false;
                }
            });
            // if(stream_id != 1 && stream_id != 2){
            //     // only for degree 
            //     $(".subjects").not($current).each(function(index, element){
            //         var each_selected_subject = $(element).val();
            //         var each_selected_subject_no = $(element).data("subject-no");
            //         if(selected_subject == $(element).find("option:selected").text()){
            //             if(index == 1 || index == 0){
            //                 alert(selected_subject +" is already selected as "+each_selected_subject_no);
            //             }else{
            //                 alert(selected_subject+" is already selected as "+each_selected_subject_no);
            //             }
            //             $current.val("");
            //             return false;
            //         }
            //     });
            //     return true;
            // }
            if(!checkCombination(this)){
                return false;
            }
            changePracticalFalg();
            checkFreeAdmission(this, selected_subject);
        });
        $(document).on("change", "input[name='category']:checked", function(){
            console.log($(this).val());
            console.log($(this).data("original-id"));
            if($(this).val() != $(this).data("original-id")){
                $("#remarks").slideDown();
                $("#remarks").find('textarea').prop("required", true);
            }else{
                $("#remarks").slideUp();
                $("#remarks").find('textarea').val("");
            }
        });
        $("form#subject-allocation-form").validate(bootstrapOptionsValidator);
    });
    showFeeStructure = function(Obj){
        // console.log($(Obj).parents("form").serialize());
        console.log($("input[name='practical']:checked").val());
    }
    changePracticalFalg = function(){
        console.log("changePracticalFalg calling");
        var has_practical = false;
        $(".subjects").each(function(index, element){
            if($(element).val() == ""){
                return;
            }
            $(subjects).each(function(key, subject){
                if(subject.id == $(element).val()){
                    if(subject.has_practical){
                        has_practical = true;
                    }
                }
            });
        });
        if(has_practical){
            $("#with_practical").prop("checked", true).trigger("click");
            // $("#without_practical").prop("checked", false);
        }else{           
            // $("#with_practical").prop("checked", false);
            $("#without_practical").prop("checked", true).trigger("click");
        }
    }
    checkCombination = function(Obj){
        var $this = $(Obj);
        // if(stream_id == 2 || stream_id == 3 || stream_id == 5){
            // for HS Arts / Commerce
            var selected_subjects = [];
            $(".subjects").not(".compulsory").each(function(index, element){
                $current = $(element);
                // console.log($current.find("option:selected").text());
                selected_subjects.push($current.find("option:selected").text())
            });
            if(!checkNotInCombination($this, selected_subjects)){
                return false;
            }
            if(!checkInCombination($this, selected_subjects)){
                return false;
            }
            if(!checkSingleCombination($this, selected_subjects)){
                return false;
            }
        // }
        return true;
    }
    checkNotInCombination   = function($this, selected_subjects){
        var return_status = true;
        // console.log("checkNotInCombination is calling");
        // console.log(not_in_combination[stream_id]);
        if(typeof not_in_combination[stream_id] != undefined ){
            $(not_in_combination[stream_id]).each(function(index, combination_array_element){
                // console.log(combination_array_element);
                var combination_error_count = 0;
                $(combination_array_element).each(function(key, subject_name){
                    // console.log(subject_name);
                    $(selected_subjects).each(function(sub_key, selected_subject_name){
                        if(selected_subject_name.trim().toLowerCase() == subject_name.trim().toLowerCase()){
                            combination_error_count +=1;
                            console.log(subject_name+" == "+selected_subject_name);
                        }
                    });
                });
                if(combination_error_count > 1){
                    // or subject selected
                    alert("Please select any one from the list "+combination_array_element.join(" or "));
                    $this.val("").trigger("change");
                    return_status = false;
                    return false;
                }
            });
        }
        return return_status;
    }
    checkInCombination  = function($this, selected_subjects){
        var return_status = true;
        var combination_message = "";
        var subject_not_selected = false;
        var incorrect_combinations_subjects = [];
        var correct_combination_subjects = [];
        if(typeof in_combination[stream_id] != undefined ){
            $(in_combination[stream_id]).each(function(index, combination_array_element){
                // console.log(combination_array_element);
                var combination_error_count = 0;
                $(combination_array_element).each(function(key, subject_name){
                    // console.log(subject_name);
                    $(selected_subjects).each(function(sub_key, selected_subject_name){
                        if(selected_subject_name.trim().toLowerCase() == "--select--"){
                            subject_not_selected = true;
                            console.log(selected_subject_name.trim().toLowerCase());
                        }
                        if(selected_subject_name.trim().toLowerCase() == subject_name.trim().toLowerCase()){
                            combination_error_count +=1;
                            console.log(subject_name+" == "+selected_subject_name);
                        }
                    });
                });
                if(combination_error_count !=0  && combination_error_count != combination_array_element.length){
                    // or subject selected
                    // alert("Please select subject combination "+combination_array_element.join(" and "));
                    if(combination_message != ""){
                        combination_message += " or ";
                    }
                    combination_message += combination_array_element.join(" and ");
                    incorrect_combinations_subjects = incorrect_combinations_subjects.concat(combination_array_element);
                    // $this.val("");
                    return_status = false;
                    // return false;
                }else if(combination_error_count > 0 && combination_array_element.length == combination_error_count){
                    console.log(combination_array_element);
                    correct_combination_subjects = correct_combination_subjects.concat(combination_array_element);
                }
            });
            if(subject_not_selected){
                return true;
            }
            if(correct_combination_subjects.length){
                $(correct_combination_subjects).each(function(key, correct_subject){
                    $(incorrect_combinations_subjects).each(function(key, incorrect_subject){
                        if(incorrect_subject.trim().toLowerCase() == correct_subject.toLowerCase().trim()){
                            combination_message = "";
                            return true;
                        }
                    });
                });
            }
            if(combination_message != ""){
                $(incorrect_combinations_subjects).each(function(key, sub_name){
                     $(".subjects").not(".compulsory").each(function(index, element){
                        var $current = $(element);
                        // console.log($current.find("option:selected").text());
                        var current_selcted_subject =  $current.find("option:selected").text().toLowerCase().trim();
                        if(current_selcted_subject == sub_name.trim().toLowerCase()){
                            $current.val("").trigger("change");
                        }
                    });
                });
                alert("Please select subject combination of "+ combination_message);
                return false;
            }
        }        
        return return_status;
    }
    checkSingleCombination  = function($this, selected_subjects){
        // console.log("checkSingleCombination is calling");
        // console.log(single_combinations[stream_id]);
        var return_status = true;
        var selected_subjects_count = 0;
        $(".subjects").not(".compulsory").each(function(index, element){
            if($(element).val() != "NA" && $(element).val() && $(element).val() != null){
                selected_subjects_count +=1;
            }
        });
        // console.log("checkNotInCombination is calling");
        // console.log(single_combinations[stream_id]);
        if(typeof single_combinations[stream_id] != undefined ){
            $(single_combinations[stream_id]).each(function(index, combination_array_element){
                // console.log(combination_array_element);
                var combination_error_count = 0;
                $(combination_array_element).each(function(key, subject_name){
                    // console.log(subject_name);
                    $(selected_subjects).each(function(sub_key, selected_subject_name){
                        if(selected_subject_name.trim().toLowerCase() == subject_name.trim().toLowerCase()){
                            combination_error_count +=1;
                            // console.log(subject_name+" == "+selected_subject_name);
                            if(selected_subjects_count > 2){
                                // $(".subjects").not(".compulsory").not($this).val("NA").trigger("change");
                                $current.val("NA")
                                alert("Cannot allocate more then 4 subjects.");
                                return false;
                            }
                        }
                    });
                });
                // if(combination_error_count > 1){
                //     // or subject selected
                //     alert("Please select any one from the list "+combination_array_element.join(" or "));
                //     $this.val("");
                //     return_status = false;
                //     return false;
                // }
            });
        }
        return return_status;
    }
    scrollToDiv = function(div_id){
        $('html, body').animate({
            scrollTop: $("#"+div_id).offset().top
        }, 2000);
    }
    checkFreeAdmission = function(){
        if(!$(".major").length){
            return true;
        }
        var major_subject = $(".major").find("option:selected").text();
        if(major_subject.toLowerCase().trim() == "psychology" ||  major_subject.toLowerCase().trim() == "home science"){
            $("#free_admission").val("no");
            // alert("Free Admission will be cancelled. If major subject selected as Psychology or Home Science ");
        }else{
            $("#free_admission").val($("#free_admission").data("old"));
        }
    }
</script>