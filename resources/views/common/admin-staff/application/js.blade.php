<style type="text/css">
    .row-effect{
        border: 2px dashed red;
    }
</style>
<script>
    $('#course').change(function(){
    $('#semester').html('');
    $('#stream').html('');
        var courseId = $(this).val();
        $.get("{{route('common.api.semester.index')}}?course_id="+courseId, function(data, status){
            console.log(data);
            semester = "<option value=''>Select Semester</option>";
            $.each(data.semesters,function(k,v){
                  semester += "<option value='"+v.id+"'>"+v.name+"</option>";
            })
            var streams = "<option value=''>Select Stream</option>";
            $.each(data.streams,function(k,v){
                  streams += "<option value='"+v.id+"'>"+v.name+"</option>";
            })
            $('#semester').append(semester);
            $('#stream').append(streams);
        })
    })
    $(document).ready(function() {
        $("#myTable").find("td").prop({
            "tabindex" : 1
        });
        $("#stream").change(function(event) {
            var stream = parseInt($(this).val());
            console.log(stream)
            if ([4,6,8].includes(stream)) {
                $("#preference").slideDown();
            }else{
                $("#preference").slideUp(function(){
                    $(this).find("select").val("");
                });
            }
        });
        $(document).on("focus", "#myTable td", function(){
            $(this).parents("tr").addClass("row-effect");
        });
        $(document).on("focusout", "#myTable td", function(){
            $(this).parents("tr").removeClass("row-effect");
        });
    });
</script>