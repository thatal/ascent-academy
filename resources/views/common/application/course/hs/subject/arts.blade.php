<div class="col-md-6 col-lg-6 hs-subjects-arts hs-panel compalsory @isset($application){{(($application->course_id==1) && ($application->appliedStream->stream_id==2))?'':'d-none'}}@else d-none @endisset">
  <div class='form-group'>
    <label class="form-label">COMPULSORY SUBJECTS</label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="17" required="true" {{(in_array("17", $applied_subs))?'checked':''}}>
      English
    </label>
    <label class="form-label">
      <input type="checkbox" required class="alt-english-mil" {{(in_array("19", $applied_subs)||in_array("21", $applied_subs)||in_array("22", $applied_subs)||in_array("23", $applied_subs)||in_array("24", $applied_subs)||in_array("25", $applied_subs))?'checked':''}}>
      Alternative English/MIL
    </label>
    <div class="margin alteng-mil {{(in_array("19", $applied_subs)||in_array("21", $applied_subs)||in_array("22", $applied_subs)||in_array("23", $applied_subs)||in_array("24", $applied_subs)||in_array("25", $applied_subs))?'':'d-none'}}">
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="19" class="alt-english 2nd-compulsory" {{(in_array("19", $applied_subs))?'checked':''}}>
        Alternative English
      </label>
      <label class="form-label">
        <input type="checkbox" class="mil 2nd-compulsory" {{(in_array("21", $applied_subs)||in_array("22", $applied_subs)||in_array("23", $applied_subs)||in_array("24", $applied_subs)||in_array("25", $applied_subs))?'checked':''}}>
        MIL
      </label>
      <div class="margin all-mil {{(in_array("21", $applied_subs)||in_array("22", $applied_subs)||in_array("23", $applied_subs)||in_array("24", $applied_subs)||in_array("25", $applied_subs))?'':'d-none'}}">
        <label class="form-label">
          <input type="checkbox" name="subjects[]" value="21" {{(in_array("21", $applied_subs))?'checked':''}}>
          Assamese
        </label>
        <label class="form-label">
          <input type="checkbox" name="subjects[]" value="22" {{(in_array("22", $applied_subs))?'checked':''}}>
          Boro
        </label>
        <label class="form-label">
          <input type="checkbox" name="subjects[]" value="23" {{(in_array("23", $applied_subs))?'checked':''}}>
          Bengali
        </label>
        <label class="form-label">
          <input type="checkbox" name="subjects[]" value="24" {{(in_array("24", $applied_subs))?'checked':''}}>
          Hindi
        </label>
        <label class="form-label">
          <input type="checkbox" name="subjects[]" value="25" {{(in_array("25", $applied_subs))?'checked':''}}>
          Nepali
        </label>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6 col-lg-6 hs-subjects-arts hs-panel @isset($application){{(($application->course_id==1) && ($application->appliedStream->stream_id==2))?'':'d-none'}}@else d-none @endisset">
  <div class='form-group'>
    <label class="form-label">OPTIONAL SUBJECTS: Any four of the following subjects (including the fourth subject).</label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="26" required="true" {{(in_array("26", $applied_subs))?'checked':''}}>
      Economics
    </label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="27"  required="true" {{(in_array("27", $applied_subs))?'checked':''}}>
      Education
    </label>
    <label class="form-label">
      <input type="checkbox" required="true" id="hs-history-arts">
      History / Sociology / Home Science
    </label>
    <div class="margin hs-history-arts d-none">
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="29" required="true" {{(in_array("29", $applied_subs))?'checked':''}}>
        History
      </label>
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="30" required="true" {{(in_array("30", $applied_subs))?'checked':''}}>
        Sociology
      </label>
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="31" required="true" {{(in_array("31", $applied_subs))?'checked':''}}>
        Home Science
      </label>
    </div>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="32" required="true" {{(in_array("32", $applied_subs))?'checked':''}}>
      Political Science
    </label>
    <label class="form-label">
      <input type="checkbox" name="subjects[]" value="33" required="true" {{(in_array("33", $applied_subs))?'checked':''}}>
      Mathematics* (* Eco+Stats+Maths combination)
    </label>
    <label class="form-label">
      <input type="checkbox" value="34" required="true" id="hs-geography-arts" {{(in_array("34", $applied_subs))?'checked':''}}>
      Geography / Statistics
    </label>
    <div class="margin hs-geography-arts d-none">
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="35" required="true" {{(in_array("35", $applied_subs))?'checked':''}}>
        Geography
      </label>
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="36" required="true" {{(in_array("36", $applied_subs))?'checked':''}}>
        Statistics
      </label>
    </div>
    <label class="form-label">
      <input type="checkbox" required="true" id="hs-logic-arts">
      Logic & Philosophy / Psychology
    </label>
    <div class="margin hs-logic-arts d-none">
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="38" required="true" {{(in_array("38", $applied_subs))?'checked':''}}>
        Logic & Philosophy
      </label>
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="39" required="true" {{(in_array("39", $applied_subs))?'checked':''}}>
        Psychology
      </label>
    </div>
    <label class="form-label">
      <input type="checkbox" required="true" id="hs-home-arts" >
      Home Science / Computer Science & Application
    </label>
    <div class="margin hs-home-arts d-none">
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="41" required="true" {{(in_array("41", $applied_subs))?'checked':''}}>
        Home Science
      </label>
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="42" required="true" {{(in_array("42", $applied_subs))?'checked':''}}>
        Computer Science & Application
      </label>
    </div>
    <label class="form-label">
      <input type="checkbox" value="43" required="true" id="hs-sanskrit-arts">
      Sanskrit or Assamese Second Language / Bengali Second Language / Hindi Second Language / E.S.L (E.S.L is allowed but not taught in the college)
    </label>
    <div class="margin hs-sanskrit-arts d-none">
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="44" required="true" {{(in_array("44", $applied_subs))?'checked':''}}>
        Sanskrit 
      </label>
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="45" required="true" {{(in_array("44", $applied_subs))?'checked':''}}>
        Assamese Second Language
      </label>
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="46" required="true" {{(in_array("44", $applied_subs))?'checked':''}}>
        Bengali Second Language
      </label>
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="47" required="true" {{(in_array("44", $applied_subs))?'checked':''}}>
        Hindi Second Language
      </label>
      <label class="form-label">
        <input type="checkbox" name="subjects[]" value="48" required="true" {{(in_array("44", $applied_subs))?'checked':''}}>
        E.S.L (E.S.L is allowed but not taught in the college)
      </label>
    </div>
  </div>
</div>