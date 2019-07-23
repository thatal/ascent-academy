@foreach($courses as $course)
    @if($course->streams->count())
        @php
            $disabled = "";
        @endphp
        <div class="col-md-6 col-lg-6 stream stream-{{$course->id}} @isset($application){{($application->course_id==$course->id)?'': 'd-none'}}@else d-none @endisset">
            @isset($application)
                @if($application->course_id==$course->id)
                    @php $disabled = ''; @endphp
                @else
                    @php $disabled = 'disabled'; @endphp
                @endif
            @endisset
            <div class="form-group ">
                <label class="form-label">Stream<span class="form-required">*</span></label>
                <select name="stream_id" class="form-control" id="stream_id" required {{$disabled}}>
                    <option value="">Select Stream</option>
                    @foreach($course->streams as $stream)
                        <option value="{{$stream->id}}" @isset($application){{($application->appliedStream->stream_id==$stream->id)?'selected': ''}}@endisset>{{$stream->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
@endforeach