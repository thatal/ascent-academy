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
                                action="{{route('student.select-subject.store',$application->uuid)}}">
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
