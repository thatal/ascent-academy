@foreach($courses as $course)
    @if($course->semesters->count())
        @php
            $disabled = "";
        @endphp
        <div class="col-md-6 col-lg-6 semester semester-{{$course->id}} @isset($application){{($application->course_id==$course->id)?'': 'd-none'}}@else d-none @endisset">
            @isset($application)
                @if($application->course_id==$course->id)
                    @php $disabled = ''; @endphp
                @else
                    @php $disabled = 'disabled'; @endphp
                @endif
            @endisset
            <div class="form-group ">
                <label class="form-label">Year<span class="form-required">*</span></label>
                <select name="semester_id" class="form-control" id="semester_id" required {{$disabled}}>
                    <option value="">Select Year</option>
                    @if(auth('student')->check())
                        @php
                            $semesters = $course->semesters->whereIn('id',config('constants.apply_semester'));
                        @endphp
                    @else
                        @php
                            $semesters = $course->semesters;
                        @endphp
                    @endif
                    @foreach($semesters as $semester)
                        <option value="{{$semester->id}}" @isset($application){{($application->semester_id==$semester->id)?'selected': ''}}@endisset  {{$disabled}}>{{$semester->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
@endforeach
