<h3>Course Information</h3>
<hr>
<div class="row">
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Course<span class="form-required">*</span></label>
      <select name="course_id" class="form-control" required id="course_id">
        <option value="">Select Course</option>
        @foreach($courses as $key => $course)
        <option value="{{$course->id}}" @isset($application) {{($application->course_id==$course->id)? 'selected':''}} @endisset>{{$course->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
@include('common/application/stream_all')
@include('common/application/semester_all')
<hr>
  {{-- HS --}}
{{--   @include('common/application/course/hs/semester/semester')

  @include('common/application/course/hs/stream/stream') --}}
{{--
  @include('common/application/course/hs/subject/science')

  @include('common/application/course/hs/subject/arts')

  @include('common/application/course/hs/subject/commerce') --}}
  {{--/ HS --}}

  {{-- @include('common/application/course/degree/semester/semester')
  @include('common/application/course/degree/stream/stream') --}}
  {{-- Degree Science --}}

  {{--

  @include('common/application/course/degree/subject/science-major')
  @include('common/application/course/degree/subject/science') --}}
  {{--/ Degree Science --}}

  {{-- Degree Arts --}}
  {{-- @include('common/application/course/degree/semester/semester') --}}

  {{--

  @include('common/application/course/degree/subject/arts-major')
  @include('common/application/course/degree/subject/arts') --}}
  {{--/ Degree Arts --}}

  {{-- Degree Commerce --}}
  {{-- @include('common/application/course/degree/semester/semester') --}}

  {{-- @include('common/application/course/degree/stream/stream') --}}
{{--
  @include('common/application/course/degree/subject/commerce-major')
  @include('common/application/course/degree/subject/commerce') --}}
  {{--/ Degree Commerce --}}


  {{-- new subject selection --}}
  {{-- @include('common/application/subject_selection_all') --}}
</div>
<h3>Personal Information</h3>
<hr>
<div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="form-group">
            <label class="form-label mr-3">Caste<span class="form-required">*</span></label>
            <div class="custom-controls-stacked">
                @foreach($castes as $key => $caste)
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="caste_id" value="{{$caste->id}}" @if(isset($application))
                        {{($application->caste_id==$caste->id)?'checked':''}} @else {{$key==0?'selected':''}} @endif
                        required class="custom-control-input"> <span
                        class="custom-control-label">{{$caste->name}}</span>
                </label>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6">
        <div class="form-group">
        </div>
    </div>
</div>
<div class="row">
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Full Name<span class="form-required">*</span></label>
      <input type="text" class="form-control" name="fullname" placeholder="Full Name" autocomplete="off" @if(isset($application)) value="{{$application->fullname}}" @elseif(isset($fullname) && empty(!$fullname)) value="{{$fullname}}" readonly="" @endif  required>
    </div>
  </div>
    <div class="col-md-6 col-lg-6">
        <div class="form-group">
            <label class="form-label">Gender<span class="form-required">*</span></label>
            <div class="custom-controls-stacked">
                <label class="custom-control custom-radio custom-control-inline"><input type="radio" name="gender" id="male"
                        value="Male" @if(isset($application)) {{$application->gender=='Male'? 'checked':''}} @else checked
                        @endif required class="custom-control-input"><span class="custom-control-label"> Male</span></label>
                <label class="custom-control custom-radio custom-control-inline"><input type="radio" name="gender"
                        id="Female" value="Female" @if(isset($application)) {{$application->gender=='Female'? 'checked':''}}
                        @else @endif required class="custom-control-input"><span class="custom-control-label">
                        Female</span></label>
                <label class="custom-control custom-radio custom-control-inline"><input type="radio" name="gender"
                        id="Transgender" value="Transgender" @if(isset($application))
                        {{$application->gender=='Transgender'? 'checked':''}} @else @endif required
                        class="custom-control-input"><span class="custom-control-label"> Transgender</span></label>
            </div>
        </div>
    </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Mobile Number<span class="form-required">*</span></label>
      <input type="number" class="form-control" name="mobile_no" placeholder="Mobile Number" autocomplete="off"

      @if(isset($application))
      value="{{$application->mobile_no}}" readonly=""
      @else
      value="{{auth()->user()->mobile_no}}" readonly=""
      @endif

       required  minlength="10" maxlength="10">
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Email<span class="form-required">*</span></label>
      <input type="email" class="form-control" name="email" placeholder="Email ID" autocomplete="off"

      @if(isset($application))
      value="{{$application->email}}" readonly=""

      @else
      value="{{auth()->user()->email}}" readonly=""
      @endif

      required>
    </div>
  </div>

  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Date of Birth<span class="form-required">*</span></label>
      <input type="text" name="dob" id="dob" class="form-control" placeholder="Date of Birth" @isset($application) value="{{date("Y-m-d",strtotime($application->dob))}}" @endisset required>
    </div>
  </div>

  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Age as on 1<sup>st</sup> March 2020<span class="form-required">*</span></label>
    <input type="text" name="age" id="age" class="form-control" placeholder="Age" @isset($application)
        value="{{$application->age}}" @endisset required readonly>
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Father's / Guardian's Name<span class="form-required">*</span></label>
      <input type="text" name="fathers_name" class="form-control" placeholder="Father's Name" @isset($application) value="{{$application->fathers_name}}" @endisset required>
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Father's / Guardian's Occupation<span class="form-required">*</span></label>
      <input type="text" name="father_occupation" class="form-control" placeholder="Father's / Guardian's Occupation" @isset($application) value="{{$application->mothers_name}}" @endisset required>
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Relationship with Guardian<span class="form-required">*</span></label>
      <select name="guardian_relationship" class="form-control" required id="course_id">
        <option value="">Select Relationship</option>
        @foreach($relations_array as $key => $relation)
        <option value="{{$relation}}" @isset($application) {{($application->guardian_relationship==$relation)? 'selected':''}}
            @endisset>{{ucwords($relation)}}</option>
        @endforeach
    </select>
    </div>
  </div>
    <div class="col-md-6 col-lg-6">
        <div class="form-group">
            <label class="form-label">Mother's Name<span class="form-required">*</span></label>
            <input type="text" name="mothers_name" class="form-control" placeholder="Mother's Name" @isset($application)
                value="{{$application->mothers_name}}" @endisset required>
        </div>
    </div>
    <div class="col-sm-12">
        <h3>Communication Information</h3>
        <hr>
    </div>
  <div class="col-md-6 col-lg-6">
    <label><h4>Present Address</h4></label>
    <div class="form-group">
      <label class="form-label">Village / Town<span class="form-required">*</span></label>
      <input type="text" name="present_vill_or_town" class="form-control present_address" placeholder="Village / Town" @isset($application) value="{{$application->present_vill_or_town}}" @endisset required>
    </div>
    <div class="form-group">
      <label class="form-label">City<span class="form-required">*</span></label>
      <input type="text" name="present_city" class="form-control present_address" placeholder="City" @isset($application) value="{{$application->present_city}}" @endisset required>
    </div>
    <div class="form-group">
      <label class="form-label">State<span class="form-required">*</span></label>
      <input type="text" name="present_state" class="form-control present_address" placeholder="State" @isset($application) value="{{$application->present_state}}" @endisset required>
    </div>
    <div class="form-group">
      <label class="form-label">District<span class="form-required">*</span></label>
      <input type="text" name="present_district" class="form-control present_address" placeholder="District" @isset($application) value="{{$application->present_district}}" @endisset required>
    </div>
    <div class="form-group">
      <label class="form-label">Pin<span class="form-required">*</span></label>
      <input type="number" minlength="6" maxlength="6" name="present_pin" class="form-control present_address" placeholder="Pin" @isset($application) value="{{$application->present_pin}}" @endisset required>
    </div>
    <div class="form-group">
        <label class="form-label">Tel No<span class="form-required">*</span></label>
        <input type="number" minlength="10" maxlength="12" name="present_tel" class="form-control present_address" placeholder="Tel No"
            @isset($application) value="{{$application->present_tel}}" @endisset required>
    </div>
    {{-- <div class="form-group">
      <label class="form-label">Nationality<span class="form-required">*</span></label>
      <input type="text" name="present_nationality" class="form-control present_address" placeholder="Nationality" @isset($application) value="{{$application->present_nationality}}" @endisset required>
    </div> --}}
  </div>
  <div class="col-md-6 col-lg-6">
    <label><h4>Permanent Address</h4></label>
    <label class="custom-control custom-checkbox custom-control-inline"><input type="checkbox" name="same" class="custom-control-input" id="address_same"><span class="custom-control-label">Same as present address </span></label>
    <div class="form-group">
      <label class="form-label">Village / Town<span class="form-required">*</span></label>
      <input type="text" name="permanent_vill_or_town" class="form-control permanent_address" placeholder="Village / Town" @isset($application) value="{{$application->permanent_vill_or_town}}" @endisset required>
    </div>
    <div class="form-group">
      <label class="form-label">City<span class="form-required">*</span></label>
      <input type="text" name="permanent_city" class="form-control permanent_address" placeholder="City" @isset($application) value="{{$application->permanent_city}}" @endisset required>
    </div>
    <div class="form-group">
      <label class="form-label">State<span class="form-required">*</span></label>
      <input type="text" name="permanent_state" class="form-control permanent_address" placeholder="State" @isset($application) value="{{$application->permanent_state}}" @endisset required>
    </div>
    <div class="form-group">
      <label class="form-label">District<span class="form-required">*</span></label>
      <input type="text" name="permanent_district" class="form-control permanent_address" placeholder="District" @isset($application) value="{{$application->permanent_district}}" @endisset required>
    </div>
    <div class="form-group">
      <label class="form-label">Pin<span class="form-required">*</span></label>
      <input type="number" minlength="6" maxlength="6" name="permanent_pin" class="form-control permanent_address" placeholder="Pin" @isset($application) value="{{$application->permanent_pin}}" @endisset required>
    </div>
    <div class="form-group">
      <label class="form-label">Tel No<span class="form-required">*</span></label>
      <input type="number" minlength="10" maxlength="12" name="permanent_tel" class="form-control permanent_address" placeholder="Tel No" @isset($application) value="{{$application->permanent_tel}}" @endisset required>
    </div>
  </div>
{{--   <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Nationality<span class="form-required">*</span></label>
      <input type="text" name="permanent_nationality" class="form-control permanent_address" placeholder="Nationality" @isset($application) value="{{$application->permanent_nationality}}" @endisset required>
    </div>
  </div> --}}
{{--
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Annual Income<span class="form-required">*</span></label>
      <input type="number" name="annual_income" class="form-control" placeholder="Annual Income" @isset($application) value="{{$application->annual_income}}" @endisset required id="annual_income">
    </div>
  </div>
  <div class="col-md-6 col-lg-6" id="free_admission_row">
    <div class="form-group">
      <label class="form-label">Free Admission <span class="form-required">*</span></label>
      <div class="custom-controls-stacked">
          <label class="custom-control custom-radio custom-control-inline"><input type="radio" name="free_admission" value="yes" class="custom-control-input"
            @if(isset($application))
                {{$application->annual_income < 100000 ? "" : " disabled "}}
                {{$application->free_admission == "yes" ? " checked " : ""}}
            @else
                disabled
            @endif

            ><span class="custom-control-label"> Yes</span></label>
          <label class="custom-control custom-radio custom-control-inline"><input type="radio" name="free_admission"

            @if(isset($application))
                {{$application->annual_income < 100000 ? "" : " disabled "}}
                {{$application->free_admission == "no" ? " checked " : ""}}
            @else
                disabled checked
            @endif

           value="no" required class="custom-control-input"><span class="custom-control-label"> No</span></label>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Blood Group</label>
      <select name="blood_group" class="form-control">
        <option value="" disabled selected>Select Blood Group</option>
        <option value="A+" @isset($application) {{($application->blood_group=='A+')?'selected':''}} @endisset>A+</option>
        <option value="A-" @isset($application) {{($application->blood_group=='A-')?'selected':''}} @endisset>A-</option>
        <option value="B+" @isset($application) {{($application->blood_group=='B+')?'selected':''}} @endisset>B+</option>
        <option value="B-" @isset($application) {{($application->blood_group=='B-')?'selected':''}} @endisset>B-</option>
        <option value="O+" @isset($application) {{($application->blood_group=='O+')?'selected':''}} @endisset>O+</option>
        <option value="O-" @isset($application) {{($application->blood_group=='O-')?'selected':''}} @endisset>O-</option>
        <option value="AB+" @isset($application) {{($application->blood_group=='AB+')?'selected':''}} @endisset>AB+</option>
        <option value="AB-" @isset($application) {{($application->blood_group=='AB-')?'selected':''}} @endisset>AB-</option>
      </select>
    </div>
  </div> --}}
    <div class="col-sm-12">
        <h3>Last Qualifying Examination Information</h3>
        <hr>
    </div>
    <div class="col-md-6 col-lg-6">
        <div class="form-group">
            <label class="form-label">Name of the school last attended<span class="form-required">*</span></label>
            <input type="text" name="last_attended_school" class="form-control" placeholder="Name of the school last attended" @isset($application)
                value="{{$application->last_attended_school}}" @endisset required>
        </div>
    </div>
    <div class="col-md-6 col-lg-6">
        @php
        $qualifying_examination = (isset($application) ? $application->qualifying_examination : "")
        @endphp
        <div class="form-group">
            <label class="form-label">Name of the qualifying examination<span class="form-required">*</span></label>
            <select name="qualifying_examination" required class="form-control" id="qualifying_examination">
                <option value="" selected disabled>--SELECT--</option>
                <option value="HSLC" {{($qualifying_examination == "HSLC" ? "selected" : "")}}>HSLC</option>
                <option value="HS" {{($qualifying_examination == "HS" ? "selected" : "")}}>HS</option>
            </select>
        </div>
    </div>
  @php
    $last_board_or_university = (isset($application) ? $application->last_board_or_university : "")
  @endphp
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Last Passed Board<span class="form-required">*</span></label>
      <select name="last_board_or_university" required class="form-control" id="last_board_or_university">
          <option value="" selected disabled>--SELECT--</option>
          <option value="SEBA" {{($last_board_or_university == "SEBA" ? "selected" : "")}}>SEBA</option>
          <option value="CBSE" {{($last_board_or_university == "CBSE" ? "selected" : "")}}>CBSE</option>
          <option value="ICSE" {{($last_board_or_university == "ICSE" ? "selected" : "")}}>ICSE</option>
          <option value="AHSEC" {{($last_board_or_university == "AHSEC" ? "selected" : "")}}>AHSEC</option>
          <option value="OTHER" {{($last_board_or_university == "OTHER" || (!in_array($last_board_or_university, ["SEBA","CBSE","ICSE","AHSEC"]) && $last_board_or_university != "") ? "selected" : "")}}>OTHER</option>
      </select>
    </div>
  </div>
  <div class="col-md-6 col-lg-6
  @if(isset($application))
    {{in_array($application->last_board_or_university, ["SEBA","CBSE","ICSE","AHSEC"]) ? "d-none" : ""}}
  @else
  d-none
  @endif
  " id="other_board_university_row">
    <div class="form-group">
      <label class="form-label">Please specify <strong class="text-danger">"OTHER"</strong> board means.<span class="form-required">*</span></label>
      <input type="text" name="other_board_university" class="form-control" id="other_board_university" placeholder="Please specify OTHER board means."
      @if(isset($application))
        value="{{in_array($application->last_board_or_university, ["SEBA","CBSE","ICSE","AHSEC"]) ? "" : $application->last_board_or_university}}"
      @else
      value=""
      @endif
      >
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">State of Last Passed Board<span class="form-required">*</span></label>
      <select name="last_board_or_university_state" required class="form-control">
          <option value="" selected disabled>--SELECT--</option>
          {!!returnStateListHtml()!!}
      </select>
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Last Exammination Roll<span class="form-required">*</span></label>
      <input type="text" name="last_exam_roll" class="form-control" placeholder="Last Exammination Roll" @isset($application) value="{{$application->last_exam_roll}}" @endisset required>
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Last Exammination No<span class="form-required">*</span></label>
      <input type="text" name="last_exam_no" class="form-control" placeholder="Last Exammination No" @isset($application) value="{{$application->last_exam_no}}" @endisset required>
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
      <label class="form-label">Last Exammination Year<span class="form-required">*</span></label>
      <input type="number" min="2000" name="last_exam_year" class="form-control" placeholder="Last Exammination year" @isset($application) value="{{$application->last_exam_year}}" @endisset required>
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group">
        @php
            $last_result = isset($application) ? $application->last_exam_result : "";
        @endphp
      <label class="form-label">Last Exammination Result<span class="form-required">*</span></label>
        <select name="last_exam_result" required class="form-control" id="last_exam_result">
            <option value="" selected disabled>--SELECT--</option>
            <option value="PASSED" {{($last_result == "PASSED" ? "selected" : "")}}>PASSED</option>
            <option value="APPEARED" {{($last_result == "APPEARED" ? "selected" : "")}}>APPEARED</option>
            <option value="FAILED" {{($last_result == "FAILED" ? "selected" : "")}}>FAILED</option>
        </select>
    </div>
  </div>
  <div class="col-md-12 col-lg-12">
    <div class="alert alert-warning">
        <strong><i class="fa fa-info-circle"></i></strong> If any Subject not available write <strong>NA</strong> in subject and <strong>0</strong> in marks. Calculation will be made on remaining subjects.
    </div>
    <div class="form-group">
      <label class="form-label">Marks<span class="form-required">*</span></label>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th colspan="10">
              <label><input type="radio" name="marks_type" id="type_percentage" @if(isset($application)) {{($application->sub_1_total==100)?'checked':''}} @else checked @endif> Percentage</label><br>
              <label><input type="radio" name="marks_type" id="type_cgpa" @if(isset($application)) {{($application->sub_1_total==10)?'checked':''}}@endif> CGPA</label>
            </th>
          </tr>
          <tr>
            <th>Subjects offered in previous examination</th>
            <th>Total Marks</th>
            <th>Marks Secured</th>
          </tr>
        </thead>
        <tbody>
          @foreach(range(1, 6) as $number)
          <tr>
            <td>
              <input type="text" class="form-control last_subjects" name="sub_{{$number}}_name" @isset($application) value="{{$application->{'sub_'.$number.'_name'} }}" @endisset required="true" placeholder="{{(($number == 1 || $number ==2 ) ? "CORE" :"ELEC-".($number-2))}}">
            </td>
            <td>
              <input type="text" class="form-control total_marks" name="sub_{{$number}}_total" @if(isset($application)) value="{{$application->{'sub_'.$number.'_total'} }}" @else value="100" @endif readonly required="true">
            </td>
            <td>
              <input type="text" class="form-control cell total_score" name="sub_{{$number}}_score" @if(isset($application)) value="{{$application->{'sub_'.$number.'_score'} }}" @else value="0" @endif required="true" onkeyup="this.value=this.value.replace(/[^0-9 . -]/g,'')"  data-compulsory="{{(($number == 1 || $number ==2 ) ? "yes" :"no")}}">
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @php
    $readonly = "";
    if(auth()->guard('student')->check()){
        $readonly = ' readonly ';
    }
  @endphp
  <div class="col-md-4 col-lg-4">
    <div class="form-group">
      <label class="form-label">Total marks secured according to marksheet<span class="form-required">*</span></label>
      <input type="number" class="form-control" name="total_marks_according_marksheet" id="total_marks_according_marksheet" placeholder="Total marks secured according marksheet" @isset($application) value="{{$application->total_marks_according_marksheet}}" @endisset required>
    </div>
  </div>
  <div class="col-md-4 col-lg-4">
    <div class="form-group">
      <label class="form-label">Total Marks<span class="form-required">*</span></label>
      <input type="input" class="form-control" name="all_total_marks" id="all_total_marks" @isset($application) value="{{$application->all_total_marks}}" @endisset required {{$readonly}}>
    </div>
  </div>
  <div class="col-md-4 col-lg-4">
    <div class="form-group">
      <label class="form-label">Percentage<span class="form-required">*</span></label>
      <input type="text" class="form-control" name="percentage" id="percentage" placeholder="Total Marks" @isset($application) value="{{$application->percentage}}" @endisset  {{$readonly}}>
    </div>
  </div>
    {{-- <div class="col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label">Any gap in studies</label>
            <div class="custom-controls-stacked">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="gap" value="yes" class="any_gap custom-control-input" @isset($application) {{$application->is_gap?'checked':''}} @endisset required><span class="custom-control-label"> Yes</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="gap" value="no" class="any_gap custom-control-input" @isset($application) {{!$application->is_gap?'checked':''}} @endisset required><span class="custom-control-label"> No</span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-lg-offset-4 col-md-offset-4">
        <p>If yes, copy of gap certificate by Gazetted Officer/Affidavit is to be attached. Gap Certificate issued by any coaching institute will not be considered.</p>
    </div> --}}
    <div class="col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label">State whether admission is sought as: <span class="form-required">*</span></label>
            <div class="radio">
                <label>
                    <input type="radio" name="admission_is_sought_as" value="Day Scholar" required
                    @if(isset($application) && $application->admission_is_sought_as == "Day Scholar")
                    checked
                    @endif
                    > Day Scholar
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="admission_is_sought_as" value="Borderer"
                    @if(isset($application) && $application->admission_is_sought_as == "Borderer")
                    checked
                    @endif
                    > Borderer
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4">
    </div>
    <div class="col-sm-12">
        <h3>Attachments</h3>
        <hr>
    </div>
    @if(auth()->guard("student")->check())
        <div class="col-md-12 col-lg-12">
            <div class="alert alert-warning">
                <strong><i class="fa fa-exclamation-triangle"></i></strong> File Size Maximum Limit 1MB (except passport photo and signature)
            </div>
        </div>
      <div class="col-md-6 col-lg-6">
        <div class="form-group">
          <label class="form-label">Passport Photo<span class="form-required">* max 200px(W) X max 250px(H) and max size 100KB</span></label>
          <input type="file" name="passport" value="" @isset($application) {{$application->passport?'':'required'}} @endisset>
          @isset($application)
          <a href="{{url($application->passport)}}" target="_blank">Passport Photo</a>
          @endisset
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="form-group">
          <label class="form-label">Signature<span class="form-required">* max 200px(W) X max 150px(H) and max size 100KB</span></label>
          <input type="file" name="sign" value="" @isset($application) {{$application->sign?'':'required'}} @endisset>
          @isset($application)
          <a href="{{url($application->sign)}}" target="_blank">Signature</a>
          @endisset
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="form-group">
          <label class="form-label">Marksheet<span class="form-required">*</span></label>
          <input type="file" name="marksheet" value="" @isset($application) {{get_attachment('marksheet', $application) ?'':'required'}} @endisset>
          @isset($application)
                @if(get_attachment('marksheet', $application))
                    <a href="{{url((String)get_attachment('marksheet', $application))}}" target="_blank">Marksheet</a>
                @endif
          @endisset
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="form-group">
          <label class="form-label">Admit Card<span class="form-required">*</span></label>
          <input type="file" name="admit_card" value="" required>
          @isset($application)
            @if(get_attachment('admit_card', $application))
            <a href="{{url((String)get_attachment('admit_card', $application))}}" target="_blank">Pass Certificate</a>
            @endif
          @endisset
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="form-group">
          <label class="form-label">Migration Certificate (<span class="form-required">(if HSLC from Non-SEBA Board).</span>)</label>
          <input type="file" name="migration_certificate" value=""

           id="migration_certificate">
          @isset($application)
            @if(get_attachment('migration_certificate', $application))
            <a href="{{url((String)get_attachment('migration_certificate', $application))}}" target="_blank">Migration Certificate</a>
            @endif
          @endisset
        </div>
      </div>

      </div>
    @endif
</div>
<div class="container-fluid">
    <h3>Declaration</h3>
    <hr>
    <p>
        The facts stated above are true to my knowledge. If found otherwise my seat in the Academy will be liable to be cancelled. I promise to abide by the rules and regulations of the Academy.
    </p>
    <div class="row">
        <div class="col-sm-12">
            <div class="checkbox">
                <label><input type="checkbox" name="declaration" value="1" required
                    @if(isset($application))
                        checked
                    @endif
                    > Accept</label>
            </div>
        </div>
    </div>
</div>
