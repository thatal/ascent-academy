<div class="card-body">
    {{-- @if($application->course_id == 2 && in_array($application->appliedStream->stream_id, [5,7,9,10]))
    <p>Subject Details not available for <strong>{{$application->appliedStream->stream->name}}</strong>.</p>
    @else --}}
    <ul class="sub-ul">
        @foreach($application->appliedSubjects as $subject)
        <li class="sub-li">{{$subject->subject->name}} {!!($subject->is_major ? "<strong>(Major)</strong>" : "")!!} {!!($subject->is_compulsory ? "<strong>(Compulsory)</strong>" : "")!!}</li>
        @endforeach
    </ul>
    {{-- @endif --}}
</div>