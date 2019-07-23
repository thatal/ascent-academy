<div class="col-xs-12 col-lg-12 col-md-12" id="subject_column">
    @php
    // called in js blade too
        $subject_serial = \App\Models\Subject::groupBy("subject_no")->distinct("subject_no")->whereNotNull('subject_no')->get("subject_no");
        $application_stream_id = (isset($application) ? $application->appliedStream->stream_id : "");
    @endphp
    <p>Select Subjects</p>
    {{-- Stream wihtout major --}}
    <div class="row" id="without_major_subjects">        
        @foreach($subject_serial as $key =>  $subject_no)
            <div class="col-md-4 col-lg-4 col-xs-12">
                <div class="form-group">
                    <label class="form-label">Subject {{$subject_no->subject_no}}<span class="form-required">*</span></label>
                    <select name="subjects[{{$key}}]" required id="subject_no_{{$subject_no->subject_no}}" class="form-control select_subjects" required>
                        @if(isset($stream_wise_subjects[$application_stream_id][$subject_no->subject_no]))
                            {{-- 4,6,8 major subjects  --}}
                            <option value="" disabled selected>--SELECT--</option>
                            {{-- print all data belongs to same stream id subject_no wise --}}
                            @foreach($stream_wise_subjects[$application_stream_id][$subject_no->subject_no] as $key => $subject_info)
                                <option value="{{$subject_info["id"]}}"
                                    @if($application->appliedSubjects->count())
                                        @foreach($application->appliedSubjects as $applied_subject_key => $applied_subject)
                                            @if($applied_subject->subject_id == $subject_info["id"])
                                                selected 
                                                @php
                                                    unset($application->appliedSubjects[$applied_subject_key]);
                                                    break 1;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                    >{{$subject_info["name"]}}</option>
                            @endforeach
                        @else
                            <option value="" disabled >--SELECT--</option>
                            <option value="NA" >N/A</option>
                        @endif
                    </select>
                </div>
            </div>
        @endforeach
    </div>
    {{-- Stream with major --}}
    <div class="row" id="subjects_with_major">
        <div class="col-md-12 col-lg-12 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr  style="border-top: 1px solid #dee2e6;">
                        <th>Preference</th>
                        <th>Major</th>
                        <th colspan="{{$subject_serial->count()}}" class="text-center">Compulsory Subjects</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(range(1, 3) as $number)
                    <tr style="border-bottom: 1px solid #dee2e6;" id="with_major_row_{{$number}}" class="with_major_subject_row">
                        {{-- <input type="hidden" name="preference" value="yes"> --}}
                        <td>{{$number}}.</td>
                        <td>
                            <label class="form-label">Major Subject <span class="form-required">*</span></label>
                            <select name="preference_subject[{{($number-1)}}]" class="form-control form-control-sm major_subjects" required onchange="majorChangedLatest(this)" id="preference_subject_{{$number}}">
                                @if(isset($stream_wise_subjects[$application_stream_id]) && in_array($application_stream_id, [4,6,8]))
                                    {{-- 4,6,8 major subjects  --}}

                                        @php
                                            $is_checked = false;
                                        @endphp
                                    @foreach($stream_wise_subjects[$application_stream_id][""] as $key => $subject_info)
                                            <option value="{{$subject_info["id"]}}" 
                                            @if(!$is_checked)
                                                @foreach($application->appliedSubjects as $index =>  $applied_subject)
                                                {{-- major check --}}
                                                    @if($applied_subject->is_major)
                                                        @if($applied_subject->subject_id == $subject_info["id"])
                                                            selected 
                                                                @php 
                                                                    unset($application->appliedSubjects[$index]);
                                                                    $is_checked = true;
                                                                @endphp
                                                            @break
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                            >{{$subject_info["name"]}}</option>
                                    @endforeach
                                @else
                                    <option value="" disabled selected>--SELECT--</option>
                                @endif
                            </select>
                        </td>
                        @foreach($subject_serial as $key =>  $subject_no)
                            @if($subject_serial->count() == ($key+1))
                                <td style="border:none; border-right: 1px solid #dee2e6;">
                            @else
                                @php
                                    $serial = $key+1;
                                @endphp
                                @if($serial % 3 == 0)
                                    <td style="border:none; border-right: 1px solid #dee2e6;">
                                @else
                                    <td style="border:none;">
                                @endif
                            @endif
                                <label class="form-label">Subject {{$subject_no->subject_no}}<span class="form-required">*</span></label>
                                <select name="subjects[{{$number-1}}][{{$key}}]" required id="subject_no_{{$subject_no->subject_no}}" class="form-control form-control-sm select_subjects" required>
                                    @if(isset($stream_wise_subjects[$application_stream_id][$subject_no->subject_no]))
                                        {{-- 4,6,8 major subjects  --}}
                                        <option value="" disabled selected>--SELECT--</option>
                                        {{-- print all data belongs to same stream id subject_no wise --}}
                                        @foreach($stream_wise_subjects[$application_stream_id][$subject_no->subject_no] as $key => $subject_info)
                                            <option value="{{$subject_info["id"]}}"
                                                @if($application->appliedSubjects->count())
                                                    @foreach($application->appliedSubjects as $applied_subject_key => $applied_subject)
                                                        @if($applied_subject->subject_id == $subject_info["id"])
                                                            selected 
                                                            @php
                                                                unset($application->appliedSubjects[$applied_subject_key]);
                                                                break 1;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endif
                                                >{{$subject_info["name"]}}</option>
                                        @endforeach
                                    @else
                                        <option value="" disabled >--SELECT--</option>
                                        <option value="NA" >N/A</option>
                                    @endif
                                </select>
                            </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>