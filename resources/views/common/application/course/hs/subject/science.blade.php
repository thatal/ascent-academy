<div class="col-md-6 col-lg-6 hs-subjects-science @isset($application){{(($application->course_id==1) && ($application->appliedStream->stream_id==1))?'':'d-none'}}@else d-none @endisset hs-panel">
  <div class='form-group compulsory'>
    <label class="form-label">COMPULSORY SUBJECTS</label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="1" data-rule-oneormorechecked="2" data-msg-required="required" {{(in_array("1", $applied_subs))?'checked':''}}>
      English
    </label>
    <label class="form-label">
      <input type="checkbox" class="alt-english-mil" data-rule-altsubject="true" {{(in_array("3", $applied_subs)||in_array("5", $applied_subs)||in_array("6", $applied_subs)||in_array("7", $applied_subs)||in_array("8", $applied_subs)||in_array("9", $applied_subs))?'checked':''}} >
      Alternative English/MIL
    </label>
    <div class="margin alteng-mil {{(in_array("3", $applied_subs)||in_array("5", $applied_subs)||in_array("6", $applied_subs)||in_array("7", $applied_subs)||in_array("8", $applied_subs)||in_array("9", $applied_subs))?'':'d-none'}}">
      <label class="form-label">
        <input type="radio" name="subjects[]"  value="3" class="alt-english" {{(in_array("3", $applied_subs))?'checked':''}}>
        Alternative English
      </label>
      <label class="form-label">
        <input type="radio" class="mil alt-subject" {{(in_array("5", $applied_subs)||in_array("6", $applied_subs)||in_array("7", $applied_subs)||in_array("8", $applied_subs)||in_array("9", $applied_subs))?'checked':''}}>
        MIL
      </label>
      <div class="margin all-mil {{(in_array("5", $applied_subs)||in_array("6", $applied_subs)||in_array("7", $applied_subs)||in_array("8", $applied_subs)||in_array("9", $applied_subs))?'':'d-none'}}">
        <label class="form-label">
          <input type="radio" name="subjects[]" value="5" {{(in_array("5", $applied_subs))?'checked':''}}>
          Assamese
        </label>
        <label class="form-label">
          <input type="radio" name="subjects[]" value="6" {{(in_array("6", $applied_subs))?'checked':''}}>
          Boro
        </label>
        <label class="form-label">
          <input type="radio" name="subjects[]" value="7" {{(in_array("7", $applied_subs))?'checked':''}}>
          Bengali
        </label>
        <label class="form-label">
          <input type="radio" name="subjects[]" value="8" {{(in_array("8", $applied_subs))?'checked':''}}>
          Hindi
        </label>
        <label class="form-label">
          <input type="radio" name="subjects[]" value="9" {{(in_array("9", $applied_subs))?'checked':''}}>
          Nepali
        </label>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6 col-lg-6  hs-subjects-science hs-panel  @isset($application){{(($application->course_id==1) && ($application->appliedStream->stream_id==1))?'':'d-none'}}@else d-none @endisset">
  <div class='form-group'>
    <label class="form-label">OPTIONAL SUBJECTS (Select any one of the following groups (including the optional Fourth subject))</label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="10" required="true" {{(in_array("10", $applied_subs))?'checked':''}}>
      Physics + Chemistry + Mathematics + Biology
    </label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="11"  required="true" {{(in_array("11", $applied_subs))?'checked':''}}>
      Physics+ Chemistry + Mathematics + Statistics
    </label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="12"  required="true" {{(in_array("12", $applied_subs))?'checked':''}}>
      Physics + Chemistry + Mathematics +Geography
    </label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="13" required="true" {{(in_array("13", $applied_subs))?'checked':''}}>
      Physics + Economics + Statistics + Mathematics
    </label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="14" required="true" {{(in_array("14", $applied_subs))?'checked':''}}>
      Physics + Chemistry + Mathematics + Computer Science & Application
    </label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="15" required="true" {{(in_array("15", $applied_subs))?'checked':''}}>
      Economics + Statistics + Mathematics + Computer Science & Application
    </label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="16" required="true" {{(in_array("16", $applied_subs))?'checked':''}}>
      Physics + Mathematics + Geography + Computer Science & Application
    </label>
  </div>
</div>