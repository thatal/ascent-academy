<div class="col-xs-12 col-lg-12 col-md-12" id="subject_column">
    @php
    // called in js blade too
        $subject_serial = \App\Models\Subject::groupBy("subject_no")->distinct("subject_no")->whereNotNull('subject_no')->get("subject_no");
    @endphp
    <p>Select Subjects</p>
    {{-- Stream wihtout major --}}
    <div class="row" id="without_major_subjects">        
        @foreach($subject_serial as $key =>  $subject_no)
            <div class="col-md-4 col-lg-4 col-xs-12">
                <div class="form-group">
                    <label class="form-label">Subject {{$subject_no->subject_no}}<span class="form-required">*</span></label>
                    <select name="subjects[{{$key}}]" required id="subject_no_{{$subject_no->subject_no}}" class="form-control select_subjects" required>
                        <option value="" disabled selected>--SELECT--</option>
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
                                <option value="" disabled selected>Select major subject</option>
                            </select>
                        </td>
                        @foreach($subject_serial as $key =>  $subject_no)
                        @if($subject_serial->count() == ($key+1))
                            <td style="border:none; border-right: 1px solid #dee2e6;">
                        @else
                            @php
                                $serial = $key+1;
                            @endphp
                            @if($serial%3 == 0)
                                <td style="border:none; border-right: 1px solid #dee2e6;">
                            @else
                                <td style="border:none;">
                            @endif
                        @endif
                                <label class="form-label">Subject {{$subject_no->subject_no}}<span class="form-required">*</span></label>
                                <select name="subjects[{{$number-1}}][{{$key}}]" required id="subject_no_{{$subject_no->subject_no}}" class="form-control form-control-sm select_subjects" required>
                                    <option value="" disabled selected>--SELECT--</option>
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