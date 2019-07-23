<div class="col-md-6 col-lg-6 hs-subjects-commerce hs-panel @isset($application){{(($application->course_id==1) && ($application->appliedStream->stream_id==3))?'':'d-none'}}@else d-none @endisset">
  <div class='form-group'>
    <label class="form-label">COMPULSORY SUBJECTS</label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="50" required="true" {{(in_array("50", $applied_subs))?'checked':''}}>
      English
    </label>
    <label class="form-label">
      <input type="checkbox" value="51" required class="alt-english-mil" {{(in_array("52", $applied_subs)||in_array("54", $applied_subs)||in_array("55", $applied_subs)||in_array("56", $applied_subs)||in_array("57", $applied_subs)||in_array("58", $applied_subs))?'checked':''}}>
      Alternative English/MIL
    </label>
    <div class="margin alteng-mil {{(in_array("52", $applied_subs)||in_array("54", $applied_subs)||in_array("55", $applied_subs)||in_array("56", $applied_subs)||in_array("57", $applied_subs)||in_array("58", $applied_subs))?'':'d-none'}}">
      <label class="form-label">
        <input type="radio" name="subjects[]" value="52" class="alt-english" {{(in_array("52", $applied_subs))?'checked':''}}>
        Alternative English
      </label>
      <label class="form-label">
        <input type="radio" value="53" class="mil" {{(in_array("54", $applied_subs)||in_array("55", $applied_subs)||in_array("56", $applied_subs)||in_array("57", $applied_subs)||in_array("58", $applied_subs))?'checked':''}}>
        MIL
      </label>
      <div class="margin all-mil {{(in_array("54", $applied_subs)||in_array("55", $applied_subs)||in_array("56", $applied_subs)||in_array("57", $applied_subs)||in_array("58", $applied_subs))?'':'d-none'}}">
        <label class="form-label">
          <input type="radio" name="subjects[]" value="54" {{(in_array("54", $applied_subs))?'checked':''}}>
          Assamese
        </label>
        <label class="form-label">
          <input type="radio" name="subjects[]" value="55" {{(in_array("55", $applied_subs))?'checked':''}}>
          Boro
        </label>
        <label class="form-label">
          <input type="radio" name="subjects[]" value="56" {{(in_array("56", $applied_subs))?'checked':''}}>
          Bengali
        </label>
        <label class="form-label">
          <input type="radio" name="subjects[]" value="57" {{(in_array("57", $applied_subs))?'checked':''}}>
          Hindi
        </label>
        <label class="form-label">
          <input type="radio" name="subjects[]" value="58" {{(in_array("58", $applied_subs))?'checked':''}}>
          Nepali
        </label>
      </div>
    </div>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="59" required {{(in_array("59", $applied_subs))?'checked':''}}>
      Accountancy
    </label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="60" required {{(in_array("60", $applied_subs))?'checked':''}}>
      Business Studies
    </label>
  </div>
</div>
<div class="col-md-6 col-lg-6  hs-subjects-commerce hs-panel @isset($application){{(($application->course_id==1) && ($application->appliedStream->stream_id==3))?'':'d-none'}}@else d-none @endisset">
  <div class='form-group'>
    <label class="form-label">OPTIONAL SUBJECTS (Select any two of the following subjects (including the fourth subject))</label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="61" required="true" {{(in_array("61", $applied_subs))?'checked':''}}>
      Economics
    </label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="62"  required="true" {{(in_array("62", $applied_subs))?'checked':''}}>
      Banking
    </label>
    <label class="form-label">
      <input type="checkbox" value="63"  required="true" id="hs-commercial-commerce" {{(in_array("64", $applied_subs)||in_array("65", $applied_subs)||in_array("66", $applied_subs))?'checked':''}}>
      Commercial Mathematics and Statistics (C.M.S.T.) / Mathematics / Computer Science & Application
    </label>
    <div class="margin hs-commercial-commerce {{(in_array("64", $applied_subs)||in_array("65", $applied_subs)||in_array("66", $applied_subs))?'':'d-none'}}">
      <label class="form-label">
        <input type="radio" name="subjects[]" value="64" required="true" {{(in_array("64", $applied_subs))?'checked':''}}>
        Commercial Mathematics and Statistics (C.M.S.T.)
      </label>
      <label class="form-label">
        <input type="radio" name="subjects[]" value="65" required="true" {{(in_array("65", $applied_subs))?'checked':''}}>
        Mathematics
      </label>
      <label class="form-label">
        <input type="radio" name="subjects[]" value="66" required="true" {{(in_array("66", $applied_subs))?'checked':''}}>
        Computer Science & Application
      </label>
    </div>
  </div>
</div>