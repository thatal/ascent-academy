<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script src="{{asset("public/js/odometer/odometer.js")}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset("public/css/odometer/odometer-theme-train-station.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("public/css/odometer/odometer-theme-minimal.css")}}">
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>

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
        $("#tr_"+data.application.id+"").addClass("admission-taken").find("#status_button").html(returnButton(data.application.status));
        scrollToTr("tr_"+data.application.id+"");
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
    channel.bind('subject-edited-event', function(data) {
        // alert(JSON.stringify(data));
        $.notify({
            // options
            title: "<strong>Seat Booking Edited: </strong>",
            message: data.message
        },{
            // settings
            type: 'pastel-info',
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
    showAnimation = function(effect){
        // var min = 0;
        // var max = $('#myTable').find("tr").length;
        // var random_row = Math.floor(Math.random() * (max - min) + min);
        // console.log(random_row);
        // console.log($('#myTable tr').eq(random_row));
        // $('#myTable tr').eq(random_row).removeClass().addClass("bounce" + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        //     $(this).removeClass();
        // });
        $('#animateModal .modal-dialog').attr('class', 'modal-dialog  ' + effect + '  animated');
    }
    // function testAnim(x) {
    //     $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + x + '  animated');
    // };
    $('#animateModal').on('show.bs.modal', function (e) {
        console.log("showing modal.");
        // var anim = $('#entrance').val();
        showAnimation("fadeInLeft");
        setTimeout(function(){ 
            $('#animateModal').modal("hide");
            // alert("hiddent");
        }, 3000);
    })
    $('#animateModal').on('hide.bs.modal', function (e) {
      // var anim = $('#exit').val();
      showAnimation("fadeOutLeft");
  });
    showModal = function(){
        if($('#animateModal').hasClass('show')){
            $("#animateModal").modal('hide');
            setTimeout(function(){ 
                $("#animateModal").modal("show");
                // alert("hiddent");
            }, 1000);
        }else
        $("#animateModal").modal("show");
        // $.toast({
        //   title: 'Admission Taken',
        //   subtitle: '11 mins ago',
        //   content: 'Hello, world! This is a toast message.',
        //   type: 'info',
        //   delay: 5000
        // });
    }
</script>
<script type="text/javascript" src="{{ asset('public/js/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/js/bootstrap-notify.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/animate.css')}}">
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
            $(document).on("change", ".subjects", function(){
                var $current = $(this);
                console.log($current.val());
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
                })
            });
            $(document).on("change", "input[name='caste']:checked", function(){
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

    var my_time;
    function pageScroll() {
        var objDiv = document.getElementById("contain");
        objDiv.scrollTop = objDiv.scrollTop + 1;  
        if ((objDiv.scrollTop + 100) == objDiv.scrollHeight) {
            objDiv.scrollTop = 0;
        }
        my_time = setTimeout('pageScroll()', 25);
    }

    function getWidthHeader(id_header, id_scroll) {
        var colCount = 0;
        $('#' + id_scroll + ' tr:nth-child(1) td').each(function () {
        if ($(this).attr('colspan')) {
            colCount += +$(this).attr('colspan');
        } else {
            colCount++;
        }
    });

    for(var i = 1; i <= colCount; i++) {
        var th_width = $('#' + id_scroll + ' > tbody > tr:first-child > td:nth-child(' + i + ')').width();
            $('#' + id_header + ' > thead th:nth-child(' + i + ')').css('width',th_width + 'px');
        }
    }
    generateSerialNo = function(){
        $(".serial_no").each(function(index, el) {
            $(this).html((index+100));
        });
    }
    scrollToTr = function(tr_id){
            clearTimeout(my_time);
            // Get row position by index
            var $row = $('#table_scroll #'+tr_id+'')
            var ypos = $row.offset().top;
            ypos-=400;
            // Go to row
            $('#contain').animate({
                scrollTop: $('#contain').scrollTop() + ypos
            }, 500);
            setTimeout(function(){ 
                pageScroll();
            }, 5000);

    }
    returnButton = function($status){
        var $button = $("<button></button>");
        $button.prop("disabled", true);
        $button.addClass("btn");
        if($status == 0){
            $button.addClass('btn-default')
            $button.html("Pending");
        }else if($status == 1){
            $button.addClass('btn-primary')
            $button.html("Verified");
        }else if($status == 2){
            $button.addClass('btn-danger')
            $button.html("On Hold");            
        }else if($status == 3){
            $button.addClass('btn-success')
            $button.html("Subject Allocated");            
        }else if($status == 4){
            $button.addClass('btn-success')
            $button.html("Admission Complete");            
        }else if($status == 5){
            $button.addClass('btn-danger')
            $button.html("Admission Rejected");            
        }else if($status == 6){
            $button.addClass('btn-default')
            $button.html("Cancelled As Already Admitted");            
        }else if($status == 6){
            $button.addClass('btn-default')
            $button.html("Rejected As No Seat Available");            
        }else{
            return "";
        }
        return $button;
    }
    $(document).ready(function() {
        pageScroll();
        $("#contain").mouseover(function() {
            clearTimeout(my_time);
        }).mouseout(function() {
            pageScroll();
        });

        getWidthHeader('table_fixed','table_scroll');
        var el= document.querySelector('#botany');
        botany = new Odometer({
          el: el,
          value: 1,
          format: 'd',

          // Any option (other than auto and selector) can be passed in here
          format: '',
          theme: 'train-station'
        });
    });
</script>