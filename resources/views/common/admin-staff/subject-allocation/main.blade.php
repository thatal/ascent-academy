@if($application->course_id == 1)
{{-- for HS  --}}
<div class="row">
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Compulsory Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[0]" required data-subject-no="Compulsory Subject 1">
            <option value="" selected disabled>--SELECT--</option>
            @if($compulsory_subjects->where("subject_no", 1)->count() == 0)
            <option value="NA" @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($compulsory_subjects->where("subject_no", 1)->sortBy("name")->values()->all() as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[0]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Compulsory Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[1]" required data-subject-no="Compulsory Subject 2">
            <option value="" selected disabled>--SELECT--</option>
            @if($compulsory_subjects->where("subject_no", 2)->count() == 0)
            <option value="NA" {{(old("subjects[1]") == "NA" ? "selected" : "")}}  @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($compulsory_subjects->where("subject_no", 2)->sortBy("name")->values()->all()  as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[1]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    @foreach(range(3, 6) as $number)
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Subject {{$number}}</label>
        <select class="form-control form-control-sm subjects" name="subjects[{{$number-1}}]" required data-subject-no="Subject {{$number}}">
            <option value="" selected disabled>--SELECT--</option>
            @if($other_subjects->where("subject_no", $number)->count() == 0)
            <option value="NA" {{(old("subjects[($number-1)]") == "NA" ? "selected" : "")}}  @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($other_subjects->where("subject_no", $number)->sortBy("name")->values()->all()  as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[($number-1)]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
            @if($other_subjects->where("subject_no", $number)->count() > 0)
                <option value="NA" {{(old("subjects[($number-1)]") == "NA" ? "selected" : "")}} >NA</option>
            @endif
        </select>
    </div>
    @if($number == 3)
</div>
<div class="clreafix"></div>
<br>
<div class="row">
    @endif
    @endforeach
</div>
{{-- 4,6  are major course--}}
@elseif($application->course_id == 2 && in_array($application->appliedStream->stream_id, [4,6]))
<div class="alert alert-info">
    <strong>Notice !</strong> If the major subject selected as Psychology or Home Science. Free admission will not be not applied.
</div>
{{-- for Degree --}}
<div class="row">
    <div class="col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-control-label">Major Subject</label>
            <select class="form-control form-control-sm subjects major" name="subjects[0]" required data-subject-no="Major Subject">
                <option value="" selected disabled>--SELECT--</option>
                @if($major_subjects->count() == 0)
                <option value="NA" @isset($application) selected @endisset>NA</option>
                @endif
                @foreach($major_subjects->sortBy("name")->values()->all() as $subject)
                <option value="{{$subject->id}}" {{(old("subjects[0]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Compulsory Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[1]" required data-subject-no="Compulsory Subject 1">
            <option value="" selected disabled>--SELECT--</option>
            @if($compulsory_subjects->where("subject_no", 2)->count() == 0)
            <option value="NA" {{(old("subjects[1]") == "NA" ? "selected" : "")}}  @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($compulsory_subjects->where("subject_no", 2)->sortBy("name")->values()->all()  as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[1]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Generic Subject</label>
        <select class="form-control form-control-sm subjects" name="subjects[2]" required data-subject-no="Compulsory Subject 2">
            <option value="" selected disabled>--SELECT--</option>
            @if($other_subjects->where("subject_no", 3)->count() == 0)
            <option value="NA" {{(old("subjects[2]") == "NA" ? "selected" : "")}}  @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($other_subjects->where("subject_no", 3)->sortBy("name")->values()->all()  as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[2]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
</div>
@elseif($application->course_id == 2 && in_array($application->appliedStream->stream_id, [5]))
{{-- for degree regular BSC REGLAR --}}
<div class="row">
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Compulsory Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[0]" required data-subject-no="Compulsory Subject">
            <option value="" selected disabled>--SELECT--</option>
            @if($compulsory_subjects->where("subject_no", 1)->count() == 0)
            <option value="NA" @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($compulsory_subjects->where("subject_no", 1)->sortBy("name")->values()->all() as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[0]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    @foreach(range(2,4) as $number)

	    <div class="col-md-4 col-lg-4 form-group">
	        <label class="form-control-label">RC Subject {{$number - 1}}</label>
	        <select class="form-control form-control-sm subjects" name="subjects[{{$number -1}}]" required data-subject-no="RC Subject 1">
	            <option value="" selected disabled>--SELECT--</option>
	            @if($other_subjects->where("subject_no", $number)->count() == 0)
	            <option value="NA" {{(old("subjects[".($number-1)."]") == "NA" ? "selected" : "")}}  @isset($application) selected @endisset>NA</option>
	            @endif
	            @foreach($other_subjects->where("subject_no", $number)->sortBy("name")->values()->all()  as $subject)
	            <option value="{{$subject->id}}" {{(old("subjects[".($number -1)."]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
	            @endforeach
	        </select>
	    </div>
	    @if($number%3 == 0)
	    	</div>
    	<div class="row">
	    @endif
	@endforeach
</div>
@elseif($application->course_id == 2 && in_array($application->appliedStream->stream_id, [10]))
{{-- for degree regular Bio Technology --}}
<div class="row">
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Major Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[0]" required data-subject-no="Major Subject">
            <option value="" selected disabled>--SELECT--</option>
            @if($major_subjects->count() == 0)
            <option value="NA" @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($major_subjects->sortBy("name")->values()->all() as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[0]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Compulsory Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[1]" required data-subject-no="Compulsory Subject">
            <option value="" selected disabled>--SELECT--</option>
            @if($compulsory_subjects->where("subject_no", 2)->count() == 0)
            <option value="NA" @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($compulsory_subjects->where("subject_no", 2)->sortBy("name")->values()->all() as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[1]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Generic Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[2]" required data-subject-no="Generic Subject">
            <option value="" selected disabled>--SELECT--</option>
            @if($other_subjects->where("subject_no", 3)->count() == 0)
            <option value="NA" @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($other_subjects->where("subject_no", 3)->sortBy("name")->values()->all() as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[2]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
</div>
@elseif($application->course_id == 2 && in_array($application->appliedStream->stream_id, [7]))
{{-- for DEGREE ARTS REGULAR --}}
<div class="row">
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Compulsory Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[0]" required data-subject-no="Compulsory Subject">
            <option value="" selected disabled>--SELECT--</option>
            @if($compulsory_subjects->where("subject_no", 1)->count() == 0)
            <option value="NA" @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($compulsory_subjects->where("subject_no", 1)->sortBy("name")->values()->all() as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[0]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Compulsory Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[1]" required data-subject-no="Compulsory Subject">
            <option value="" selected disabled>--SELECT--</option>
            @if($compulsory_subjects->where("subject_no", 2)->count() == 0)
            <option value="NA" @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($compulsory_subjects->where("subject_no", 2)->sortBy("name")->values()->all() as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[1]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    @foreach(range(3, 4) as $number)

	    <div class="col-md-4 col-lg-4 form-group">
	        <label class="form-control-label">RC Subject {{$number - 2}}</label>
	        <select class="form-control form-control-sm subjects" name="subjects[{{$number - 1}}]" required data-subject-no="RC Subject 1">
	            <option value="" selected disabled>--SELECT--</option>
	            @if($other_subjects->where("subject_no", $number)->count() == 0)
	            <option value="NA" {{(old("subjects[".($number - 1)."]") == "NA" ? "selected" : "")}}  @isset($application) selected @endisset>NA</option>
	            @endif
	            @foreach($other_subjects->where("subject_no", $number)->sortBy("name")->values()->all()  as $subject)
	            <option value="{{$subject->id}}" {{(old("subjects[".($number - 1)."]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
	            @endforeach
	        </select>
	    </div>
	    @if($number%3 == 0)
	    	</div>
    	<div class="row">
	    @endif
	@endforeach
</div>

@elseif($application->course_id == 2 && in_array($application->appliedStream->stream_id, [8]))
{{-- for DEGREE Commerce Honours --}}
<div class="row">
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Paper 1 Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[0]" required data-subject-no="Paper 1 Subject">
            <option value="" selected disabled>--SELECT--</option>
            @if($compulsory_subjects->where("subject_no", 1)->count() == 0)
            <option value="NA" @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($compulsory_subjects->where("subject_no", 1)->sortBy("name")->values()->all() as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[0]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Paper 2 Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[1]" required data-subject-no="Paper 2 Subject">
            <option value="" selected disabled>--SELECT--</option>
            @if($compulsory_subjects->where("subject_no", 2)->count() == 0)
            <option value="NA" @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($compulsory_subjects->where("subject_no", 2)->sortBy("name")->values()->all() as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[1]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Paper 3 Subject</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[2]" required data-subject-no="Paper 3 Subject">
            <option value="" selected disabled>--SELECT--</option>
            @if($compulsory_subjects->where("subject_no", 3)->count() == 0)
            <option value="NA" @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($compulsory_subjects->where("subject_no", 3)->sortBy("name")->values()->all() as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[2]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-lg-4 form-group">
        <label class="form-control-label">Generic Paper</label>
        <select class="form-control form-control-sm subjects compulsory" name="subjects[3]" required data-subject-no="Generic Paper">
            <option value="" selected disabled>--SELECT--</option>
            @if($other_subjects->where("subject_no", 4)->count() == 0)
            <option value="NA" @isset($application) selected @endisset>NA</option>
            @endif
            @foreach($other_subjects->where("subject_no", 4)->sortBy("name")->values()->all() as $subject)
            <option value="{{$subject->id}}" {{(old("subjects[3]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
</div>

@elseif($application->course_id == 3)
<div class="row">
    <div class="col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-control-label">Major Subject</label>
            <select class="form-control form-control-sm subjects major" name="subjects[0]" required data-subject-no="Major Subject">
                <option value="" selected disabled>--SELECT--</option>
                @if($major_subjects->count() == 0)
                <option value="NA" @isset($application) selected @endisset>NA</option>
                @endif
                @foreach($major_subjects->sortBy("name")->values()->all() as $subject)
                <option value="{{$subject->id}}" {{(old("subjects[0]", findSubjectInAppliedSubject($application->appliedSubjects, $subject->id)) == $subject->id ? "selected" : "")}}>{{$subject->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@else
<p>Subject Selection is not available for <strong>Regular Course</strong> just select practical or without practical.</p>
@endif
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="form-group">
            <label class="form-label">Resevation Category<span class="form-required">*</span></label>
            <div class="custom-controls-stacked">
                @foreach($categories as $category)
                <label class="custom-control custom-radio custom-control-inline"><input type="radio" name="category" id="category" data-original-id="{{$application->caste_id}}" value="{{$category->id}}" required class="custom-control-input"

                    @if($application->selected_category_id == $category->id)
                    {{"checked"}}
                    @elseif($application->category_id == $category->id && !$application->selected_category_id)
                    {{"checked"}}
                    @endif

                    ><span class="custom-control-label"> {{$category->name}}</span></label>
                    @endforeach
                </div>
            </div>
            <div class="form-group" id="remarks" style="{{$application->selected_caste_reason ? '' : 'display: none;'}}">
                <label class="form-label">Reason for changing resevation category.<span class="form-required">*</span></label>
                <textarea name="reason" class="form-control" placeholder="Reason for changing reservation category. min 5 character." minlength="5">{{$application->selected_caste_reason}}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="form-group">
              <label class="form-label">Practical<span class="form-required">*</span></label>
              <div class="custom-controls-stacked">
                <label class="custom-control custom-radio custom-control-inline"><input type="radio" name="practical" id="with_practical" value="1" required class="custom-control-input" {{$application->with_practical ? "checked": "" }}><span class="custom-control-label"> Yes</span></label>
                <label class="custom-control custom-radio custom-control-inline"><input type="radio" name="practical" id="without_practical" value="0" required class="custom-control-input" {{$application->with_practical ? "": "checked" }}><span class="custom-control-label"> No</span></label>
            </div>
        </div>
        {{-- free admission hidden field --}}
        <input type="hidden" name="free_admission" id="free_admission" value="{{$application->free_admission}}" data-old="{{$application->free_admission}}">
                        {{-- <div class="form-group">
                              <label class="form-label"><button type="button" class="btn btn-info btn-sm cursor-help"  data-toggle="tooltip" data-title="Click here to view the fee details." data-placement="right" onclick="showFeeStructure(this)"><i class="fa fa-info-circle"></i> Check Admission Fee</button></label>
                          </div> --}}
                      </div>
                  </div>
