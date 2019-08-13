@extends('common.student-app')
@section('title')
Select Subject
@endsection

@section('css')
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form name="application" id="application" method="get"
                            action="{{route('student.application.select-subject.store')}}" autocomplete="off">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="col-auto mr-auto">
                                        <h3 class="card-title">Select Subject</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">UID</label>
                                            <input type="text" class="form-control" name="uid"
                                                value="{{Request::get('uid')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Course Id</label>
                                            <select name="course_id" class="form-control" id="course_id"
                                                name="course_id" required>
                                                <option value="">Select Course</option>
                                                @foreach($courses as $course)
                                                <option value="{{$course->id}}"
                                                    {{$course->id==Request::get('course_id')?'selected':''}}>
                                                    {{$course->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @include('common/application/stream_all')
                                    @include('common/application/semester_all')
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if(isset($application))
            @php
            $guard = 'Student';
            $subjects = $application->appliedStream->stream->subjects->where('semester_id',$application->semester_id);
            $major_subjects = $subjects->where("is_major", 1);
            $compulsory_subjects = $subjects->where("is_compulsory", 1);
            $other_subjects = $subjects->where("is_compulsory", 0)->where("is_major", 0);
            @endphp
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <div class="row justify-content-between">
                                <div class="col-auto mr-auto">
                                    <h3 class="card-title">Select Subject</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form name="subject-allocation-form" id="subject-allocation-form" method="post"
                                action="{{route('student.application.select-subject.store',$application->uuid)}}">
                                @csrf
                                @include("common.admin-staff.subject-allocation.main")
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are You Sure ?')"> Proceed</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('js')
@include('common/application/js')
@if(isset($application))
@include("common.admin-staff.subject-allocation.js")
@endif
<script type="text/javascript">
    $('#transaction_date').Zebra_DatePicker({
        format: 'Y-m-d'
    });
</script>
@stop
