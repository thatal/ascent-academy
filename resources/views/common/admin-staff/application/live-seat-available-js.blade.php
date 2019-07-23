<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script src="{{asset("public/js/odometer/odometer.js")}}"></script>
{{-- <link rel="stylesheet" type="text/css" href="{{asset("public/css/odometer/odometer-theme-train-station.css")}}"> --}}
<link rel="stylesheet" type="text/css" href="{{asset("public/css/odometer/odometer-theme-minimal.css")}}">
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>
// global_reservation_list = json assigned in view please look there
	// Enable pusher logging - don't include this in production
	Pusher.logToConsole = true;

	var pusher = new Pusher('e6b2de14d985bf7ff32d', {
		cluster: 'ap2',
		forceTLS: true
	});

	var channel = pusher.subscribe('merit-list-change');
	channel.bind('admission-done-event', function(data) {
		// alert(JSON.stringify(data));
        $.notify({
            // options
            message: data.message,
            title: "<strong>Admission Taken:</strong>"
        },{
            // settings
            // type: 'success',
            // icon: "fa fa-check",
            type: 'pastel-success',
            delay: 10600,
            placement: {
              from: "top",
              align: "right"
            },
            newest_on_top: true,
            animate: {
                enter: 'animated zoomInDown',
                exit: 'animated zoomOutUp'
            },
            /*template: '<div data-notify="container" class="col-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>' */
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<span data-notify="title">{1}</span>' +
                '<span data-notify="message">{2}</span>' +
            '</div>'
        });
        // $("#tr_"+data.application.id+"").addClass("admission-taken").find("#status_button").html(returnButton(data.application.status));
        // scrollToTr("tr_"+data.application.id+"");
        seatAllocatedEvent(data);
	});
    channel.bind('application-edited-event', function(data) {
        // alert(JSON.stringify(data));
        $.notify({
            // options
            title : "<strong>Application Updated :</strong>",
            message: data.message
        },{
            // settings
            type: 'pastel-info',
            delay: 10600,
            placement: {
              from: "top",
              align: "right"
            },
            newest_on_top: true,
            animate: {
                enter: 'animated zoomInDown',
                exit: 'animated zoomOutUp'
            },
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<span data-notify="title">{1}</span>' +
                '<span data-notify="message">{2}</span>' +
            '</div>'
        });
        if($("#tr"+data.application.id).length){
            $("#tr_"+data.application.id+"").find("#status_button").html(returnButton(data.application.status));
            scrollToTr("tr_"+data.application.id+"");
            setTimeout(function(){
                location.reload();
            }, 3000);
        }
    });
    channel.bind('subject-allocated-event', function(data) {
        // alert(JSON.stringify(data));
        $.notify({
            // options
            title: "<strong>Seat Booked: </strong>",
            message: data.message
        },{
            // settings
            type: 'pastel-success',
            delay: 10600,
            placement: {
              from: "top",
              align: "right"
            },
            newest_on_top: true,
            animate: {
                enter: 'animated zoomInDown',
                exit: 'animated zoomOutUp'
            },
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<span data-notify="title">{1}</span>' +
                '<span data-notify="message">{2}</span>' +
            '</div>'
        });
        // if($("#tr"+data.application.id).length){
        //     $("#tr_"+data.application.id+"").find("#status_button").html(returnButton(data.application.status));
        //     scrollToTr("tr_"+data.application.id+"");
        //     setTimeout(function(){
        //         location.reload();
        //     }, 3000);
        // }
        seatAllocatedEvent(data);
    });
    channel.bind('subject-edited-event', function(data) {
        // alert(JSON.stringify(data));
        $.notify({
            // options
            title: "<strong>Seat Booking Edited: </strong>",
            message: data.message
        },{
            // settings
            type: 'pastel-info',
            delay: 10600,
            placement: {
              from: "top",
              align: "right"
            },
            newest_on_top: true,
            animate: {
                enter: 'animated zoomInDown',
                exit: 'animated zoomOutUp'
            },
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<span data-notify="title">{1}</span>' +
                '<span data-notify="message">{2}</span>' +
            '</div>'
        });
        if($("#tr"+data.application.id).length){
            $("#tr_"+data.application.id+"").find("#status_button").html(returnButton(data.application.status));
            scrollToTr("tr_"+data.application.id+"");
            setTimeout(function(){
                location.reload();
            }, 3000);
        }
    });
    global_json_data = {
  "message": "Application Edited",
  "application": {
    "id": 1425,
    "uuid": "14d04be5-de7f-48db-a58d-7d9133d1e757",
    "student_id": 1980,
    "fullname": "MRIDUSMITA BARUAH",
    "mobile_no": "7637847714",
    "email": "mridzzzxyz11@gmail.com",
    "free_admission": null,
    "last_board_or_university_state": "Assam",
    "course_id": 2,
    "semester_id": 3,
    "gender": "Female",
    "dob": "13-03-2001",
    "fathers_name": "MUNIN CHANDRA BARUAH",
    "mothers_name": "KALPANA BARUAH",
    "annual_income": 200000,
    "religion": "Hindu",
    "caste_id": 2,
    "co_curricular": 0,
    "differently_abled": 0,
    "present_vill_or_town": "GHARPARA CHUBURI",
    "present_city": "TEZPUR",
    "present_state": "ASSAM",
    "present_district": "SONITPUR",
    "present_pin": 784001,
    "present_nationality": "INDIAN",
    "permanent_vill_or_town": "GHARPARA CHUBURI",
    "permanent_city": "TEZPUR",
    "permanent_state": "ASSAM",
    "permanent_district": "SONITPUR",
    "permanent_pin": 784001,
    "permanent_nationality": null,
    "last_board_or_university": "AHSEC",
    "last_exam_roll": "0799",
    "last_exam_no": "20121",
    "sub_1_name": "ENGLISH",
    "sub_1_total": 100,
    "sub_1_score": 94,
    "sub_2_name": "ALT. ENGLISH",
    "sub_2_total": 100,
    "sub_2_score": 97,
    "sub_3_name": "BIOLOGY",
    "sub_3_total": 100,
    "sub_3_score": 95,
    "sub_4_name": "CHEMISTRY",
    "sub_4_total": 100,
    "sub_4_score": 92,
    "sub_5_name": "PHYSICS",
    "sub_5_total": 100,
    "sub_5_score": 82,
    "sub_6_name": "MATHEMATICS",
    "sub_6_total": 100,
    "sub_6_score": 54,
    "total_marks_according_marksheet": 500,
    "all_total_marks": 460,
    "percentage": 92,
    "year": "2019",
    "blood_group": "B+",
    "is_gap": 0,
    "passport": "public/uploads/1980/27052019-passport.jpg",
    "sign": "public/uploads/1980/27052019-sign.jpg",
    "is_confirmed": 1,
    "payment_status": 1,
    "verified_by": "Staff",
    "verified_by_id": 1,
    "on_hold_reason": null,
    "admission_caste_id": null,
    "admission_done_by": null,
    "admission_done_by_id": null,
    "with_practical": 0,
    "selected_caste_category": null,
    "selected_caste_reason": null,
    "rejection_reason": "",
    "rejected_by": null,
    "rejected_by_id": null,
    "status": 1,
    "deleted_at": null,
    "created_at": "2019-05-28 02:15:42",
    "updated_at": "2019-05-30 16:18:17",
    "applied_subjects": [],
    "applied_major_subjects": null,
    "applied_stream": {
      "id": 467,
      "uuid": "fde7e7ee-53c3-44d3-acd6-a69061b4e615",
      "student_id": 1980,
      "application_id": 1425,
      "stream_id": 4,
      "deleted_at": null,
      "created_at": "2019-05-28 02:15:42",
      "updated_at": "2019-05-28 02:15:42",
      "stream": {
        "id": 4,
        "uuid": null,
        "course_id": 2,
        "name": "THREE YEAR DEGREE COURSE SCIENCE (HONOURS)",
        "total_seat": 285,
        "deleted_at": null,
        "created_at": "2019-05-07 00:00:00",
        "updated_at": "2019-05-07 00:00:00"
      }
    },
    "student": {
      "id": 1980,
      "uuid": "5cea5a81-328b-4273-8646-5d42accd7b40",
      "name": "MRIDUSMITA BARUAH",
      "mobile_no": "7637847714",
      "email": "mridzzzxyz11@gmail.com",
      "otp": 225850,
      "is_otp_verified": 1,
      "deleted_at": null,
      "created_at": "2019-05-28 02:10:27",
      "updated_at": "2019-05-28 02:10:39"
    },
    "course": {
      "id": 2,
      "uuid": null,
      "name": "DEGREE",
      "deleted_at": null,
      "created_at": "2019-05-07 00:00:00",
      "updated_at": "2019-05-07 00:00:00"
    },
    "semester": {
      "id": 3,
      "uuid": null,
      "course_id": 2,
      "name": "1st Sem",
      "deleted_at": null,
      "created_at": "2019-05-07 00:00:00",
      "updated_at": "2019-05-07 00:00:00"
    },
    "caste": {
      "id": 2,
      "uuid": null,
      "name": "OBC",
      "deleted_at": null,
      "created_at": "2019-04-29 00:00:00",
      "updated_at": "2019-04-29 00:00:00"
    },
    "attachments": [
      {
        "id": 1295,
        "student_id": 1980,
        "application_id": 1425,
        "doc_name": "Marksheet",
        "path": "public/uploads/1980/27052019-marksheet.jpg",
        "deleted_at": null,
        "created_at": "2019-05-28 02:15:42",
        "updated_at": "2019-05-28 02:15:42"
      },
      {
        "id": 1296,
        "student_id": 1980,
        "application_id": 1425,
        "doc_name": "Pass Certificate",
        "path": "public/uploads/1980/27052019-pass_certificate.jpg",
        "deleted_at": null,
        "created_at": "2019-05-28 02:15:42",
        "updated_at": "2019-05-28 02:15:42"
      },
      {
        "id": 1297,
        "student_id": 1980,
        "application_id": 1425,
        "doc_name": "Caste Certificate",
        "path": "public/uploads/1980/27052019-caste_certificate.jpg",
        "deleted_at": null,
        "created_at": "2019-05-28 02:15:42",
        "updated_at": "2019-05-28 02:15:42"
      }
    ],
    "receipt": null,
    "admitted_student": null,
    "payment_receipt": {
      "id": 645,
      "student_id": 1980,
      "application_id": 1425,
      "transaction_id": "QUR27584417626",
      "transaction_date": "27-05-2019 20:46:29",
      "biller_response": "DARRANGCOL|1425|QUR27584417626|914720373475|250.00|UR2|607066|03|INR|RDDIRECT|NA-573366|NA|00000000.00|27-05-2019 20:46:29|0300|NA|1980|mridzzzxyz11@gmail.com|7637847714|support@billdesk.com|NA|NA|NA|NA|PGS10001-Success",
      "amount": 250,
      "code": "0300",
      "status": 1,
      "deleted_at": null,
      "created_at": "2019-05-28 02:16:59",
      "updated_at": "2019-05-28 02:16:59"
    }
  },
  "seat_details": {
    "allocated_applications": {
      "7": {
        "1": 1,
        "2": 1
      }
    },
    "admission_complete": {
      "1": {
        "1": 1,
        "2": 1,
        "3": 1,
        "4": 2
      },
      "2": {
        "1": 2,
        "2": 1,
        "3": 1,
        "5": 1
      },
      "4": {
        "106": {
          "1": 1
        }
      },
      "5": {
        "2": 1
      },
      "7": {
        "2": 1
      },
      "9": {
        "5": 1
      }
    },
    "reservations": {
      "1": {
        "1": 150,
        "2": 38,
        "3": 25,
        "4": 12,
        "5": 18,
        "6": 7
      },
      "2": {
        "1": 180,
        "2": 45,
        "3": 30,
        "4": 15,
        "5": 21,
        "6": 9
      },
      "3": {
        "1": 150,
        "2": 38,
        "3": 25,
        "4": 12,
        "5": 18,
        "6": 7
      },
      "4": {
        "106": {
          "1": 24,
          "2": 6,
          "3": 4,
          "4": 2,
          "5": 3,
          "6": 1
        },
        "107": {
          "1": 24,
          "2": 6,
          "3": 4,
          "4": 2,
          "5": 3,
          "6": 1
        },
        "108": {
          "1": 24,
          "2": 6,
          "3": 4,
          "4": 2,
          "5": 3,
          "6": 1
        },
        "109": {
          "1": 24,
          "2": 6,
          "3": 4,
          "4": 2,
          "5": 3,
          "6": 1
        },
        "110": {
          "1": 24,
          "2": 6,
          "3": 4,
          "4": 2,
          "5": 3,
          "6": 1
        },
        "111": {
          "1": 24,
          "2": 6,
          "3": 4,
          "4": 2,
          "5": 3,
          "6": 1
        },
        "112": {
          "1": 6,
          "2": 1,
          "3": 1,
          "4": 1,
          "5": 1,
          "6": 0
        },
        "113": {
          "1": 6,
          "2": 1,
          "3": 1,
          "4": 1,
          "5": 1,
          "6": 0
        },
        "114": {
          "1": 6,
          "2": 1,
          "3": 1,
          "4": 1,
          "5": 1,
          "6": 0
        },
        "115": {
          "1": 15,
          "2": 4,
          "3": 2,
          "4": 1,
          "5": 2,
          "6": 1
        }
      },
      "5": {
        "1": 60,
        "2": 15,
        "3": 10,
        "4": 5,
        "5": 7,
        "6": 3
      },
      "6": {
        "125": {
          "1": 30,
          "2": 8,
          "3": 5,
          "4": 2,
          "5": 4,
          "6": 1
        },
        "126": {
          "1": 36,
          "2": 9,
          "3": 6,
          "4": 3,
          "5": 4,
          "6": 2
        },
        "127": {
          "1": 24,
          "2": 6,
          "3": 4,
          "4": 2,
          "5": 3,
          "6": 1
        },
        "128": {
          "1": 18,
          "2": 4,
          "3": 3,
          "4": 2,
          "5": 2,
          "6": 1
        },
        "129": {
          "1": 30,
          "2": 8,
          "3": 5,
          "4": 2,
          "5": 4,
          "6": 1
        },
        "130": {
          "1": 30,
          "2": 8,
          "3": 5,
          "4": 2,
          "5": 4,
          "6": 1
        },
        "131": {
          "1": 30,
          "2": 8,
          "3": 5,
          "4": 2,
          "5": 4,
          "6": 1
        },
        "132": {
          "1": 24,
          "2": 6,
          "3": 4,
          "4": 2,
          "5": 3,
          "6": 1
        },
        "133": {
          "1": 24,
          "2": 6,
          "3": 4,
          "4": 2,
          "5": 3,
          "6": 1
        },
        "134": {
          "1": 30,
          "2": 8,
          "3": 5,
          "4": 2,
          "5": 4,
          "6": 1
        },
        "135": {
          "1": 1,
          "2": 1,
          "3": 1,
          "4": 1,
          "5": 1,
          "6": 0
        },
        "136": {
          "1": 30,
          "2": 8,
          "3": 5,
          "4": 2,
          "5": 4,
          "6": 1
        },
        "137": {
          "1": 1,
          "2": 1,
          "3": 1,
          "4": 1,
          "5": 1,
          "6": 0
        },
        "138": {
          "1": 6,
          "2": 2,
          "3": 2,
          "4": 1,
          "5": 1,
          "6": 0
        },
        "139": {
          "1": 15,
          "2": 4,
          "3": 2,
          "4": 1,
          "5": 2,
          "6": 1
        }
      },
      "7": {
        "1": 120,
        "2": 30,
        "3": 20,
        "4": 10,
        "5": 14,
        "6": 6
      },
      "8": {
        "147": {
          "1": 15,
          "2": 4,
          "3": 2,
          "4": 1,
          "5": 2,
          "6": 1
        }
      },
      "9": {
        "1": 45,
        "2": 11,
        "3": 8,
        "4": 4,
        "5": 5,
        "6": 2
      }
    }
  }
};
@php
    $global_stream_data = [];
    $global_stream_data = \App\Models\Stream::select("id")->pluck("id")->toArray();
@endphp
global_stream_data = {{json_encode($global_stream_data)}};
seatAllocatedEvent = function(event_data){
    console.log("seatAllocatedEvent");
    $(global_stream_data).each(function(index, stream_id){
    // $(event_data).each(function(index, stream_id){
       // console.log(stream_id);
        // if(global_json_data.seat_details.reservations[stream_id] === undefined){
        //     return;
        // }
        // start available seat 
        // var stream_data = event_data.seat_details.reservations[stream_id];
        var stream_data = event_data.seat_details.admission_complete[stream_id];
        var stream_data_allocated = event_data.seat_details.allocated_applications[stream_id];
        if(stream_data == null || stream_data == undefined){
            return;
        }
        // console.log(stream_data_allocated);
        // $(global_reservation_list).each(function(index, reservation_id){
        //     console.log(stream_data[reservation_id]);
        // })
        if (stream_id == 4 || stream_id == 6 || stream_id == 8) {
            // major subject found
            var major_subjects = Object.keys(stream_data);
            // console.log(major_subjects);
            $(major_subjects).each(function(sub_index, subject_id){
                // console.log("Subject ID "+subject_id);
                // console.log(stream_data[subject_id]);
                var available_categories = Object.keys(stream_data[subject_id]);
                $(available_categories).each(function(category_index, category_id){
                    // $("#reservation_"+stream_id+"_"+subject_id).text(stream_data[subject_id]);
                    // $("#reservation_"+stream_id+"_"+subject_id+"_"+category_id).css({
                    //     "border": "red 2px solid"
                    // });
                    var dynamica_obj_string = "reservation_"+stream_id+'_'+subject_id+'_'+category_id;
                    // window[dynamica_obj_string].update(stream_data[subject_id][category_id]);
                    if (window[dynamica_obj_string] != undefined) {
                        var total_seat_taken = 0;
                        if(stream_data[subject_id][category_id] !== undefined){
                            total_seat_taken += parseInt(stream_data[subject_id][category_id]);
                        }
                        if(stream_data_allocated[subject_id] !== undefined){
                            if(stream_data_allocated[subject_id][category_id] != undefined){
                                total_seat_taken += parseInt(stream_data_allocated[subject_id][category_id]);
                            }
                        }
                        window[dynamica_obj_string].update(stream_data[subject_id][category_id]);
                    }
                });
            });
        }else{
            // without major subject
            // var major_subjects = Object.keys(stream_data);
            // // console.log(major_subjects);
            // $(major_subjects).each(function(sub_index, subject_id){
                var available_categories = Object.keys(stream_data);
                $(available_categories).each(function(category_index, category_id){
                    var dynamica_obj_string = "reservation_"+stream_id+'_'+category_id;
                    if (window[dynamica_obj_string] != undefined) {
                        var total_seat_taken = 0;
                        if(stream_data[category_id] != undefined){
                            total_seat_taken += parseInt(stream_data[category_id]);
                        }
                        if(stream_data_allocated[category_id] != undefined){
                            total_seat_taken += parseInt(stream_data_allocated[category_id]);
                        }
                        window[dynamica_obj_string].update(stream_data[category_id]);
                    }
                });
            // });
        }
        // end available seat
        // console.log(stream_id);
        // console.log(global_json_data.seat_details.reservations[stream_id]);
        // 
    });
};
</script>
<script type="text/javascript" src="{{ asset('public/js/bootstrap-notify.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/animate.css')}}">