<div class="col-md-12 col-lg-12 degree-arts-major degree-panel d-none">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Preference</th>
        <th>Major</th>
        <th>Compulsory Subjects</th>
        <th>Optional Subjects</th>
      </tr>
    </thead>
    <tbody>
      @foreach(range(1, 3) as $number)
      <tr>
        <input type="hidden" name="preference" value="yes">
        <td>{{$number}}.</td>
        <td>
          <select name="preference_{{$number}}_subject_ids[]" class="form-control" required onchange="majorChanged(this,'#subject-td-arts-major')">
            <option value="">Select major subject</option>
            <option value="113">English</option>
            <option value="114">Assamese</option>
            <option value="115">Hindi</option>
            <option value="116">Bengali</option>
            <option value="117">Political Science</option>
            <option value="118">Economics</option>
            <option value="119">Philosophy</option>
            <option value="120">Geography</option>
            <option value="121">Sanskrit</option>
            <option value="122">Education</option>
            <option value="123">Mathematics</option>
            <option value="124">History</option>
            <option value="125">Statistics</option>
            <option value="126">Home Science</option>
            <option value="127">Psychology</option>
          </select>
        </td>
        <td>
          <div class='form-group'>
            <label class="form-label">COMPULSORY SUBJECTS</label>
            <label class="form-label">
              <input type="checkbox" name="preference_{{$number}}_subject_ids[]" value="104" required="true">
              English
            </label>
            <label class="form-label">
              <input type="checkbox" class="alt-english-mil" >
              Alternative English/MIL
            </label>
            <div class="margin alteng-mil d-none">
              <label class="form-label">
                <input type="radio" name="preference_{{$number}}_subject_ids[]" value="106" id="alt-english">
                Alternative English
              </label>
              <label class="form-label">
                <input type="radio" class="mil">
                MIL
              </label>
              <div class="margin d-none all-mil" >
                <label class="form-label">
                  <input type="radio" name="preference_{{$number}}_subject_ids[]" value="108">
                  Assamese
                </label>
                <label class="form-label">
                  <input type="radio" name="preference_{{$number}}_subject_ids[]" value="109">
                  Boro
                </label>
                <label class="form-label">
                  <input type="radio" name="preference_{{$number}}_subject_ids[]" value="110">
                  Bengali
                </label>
                <label class="form-label">
                  <input type="radio" name="preference_{{$number}}_subject_ids[]" value="111">
                  Hindi
                </label>
                <label class="form-label">
                  <input type="radio" name="preference_{{$number}}_subject_ids[]" value="112">
                  Nepali
                </label>
              </div>
            </div>
          </div>
        </td>
        <td  id="subject-td-arts-major">
          <div class="form-group" id="113_major">
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> History / Philosophy / Psychology
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="128"  onchange="addSubjectSelected(this)"> History
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="129" onchange="addSubjectSelected(this)"> Philosophy
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox"  onchange="subjectSelected(this)"> Political Science / Economics / Geography
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="131" onchange="addSubjectSelected(this)"> Political Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="132" onchange="addSubjectSelected(this)"> Economics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="133" onchange="addSubjectSelected(this)"> Geography
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox"  onchange="subjectSelected(this)"> Education / Psychology
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134" onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="135" onchange="addSubjectSelected(this)"> Psychology
              </label>
            </div>
          </div>

          <div class="form-group" id="114_major">
            <label class="form-label">
              <input type="checkbox"  onchange="subjectSelected(this)"> History / Philosophy / Psychology
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="128" onchange="addSubjectSelected(this)"> History
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="129" onchange="addSubjectSelected(this)"> Philosophy
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Political Science / Economics / Geography
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="131" onchange="addSubjectSelected(this)"> Political Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="132" onchange="addSubjectSelected(this)"> Economics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="133" onchange="addSubjectSelected(this)"> Geography
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Education / Psychology
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134" onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
            </div>
          </div>

          <div class="form-group" id="115_major">
            <label class="form-label">
              <input type="checkbox"  onchange="subjectSelected(this)"> History / Philosophy / Psychology
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="128" onchange="addSubjectSelected(this)"> History
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="129" onchange="addSubjectSelected(this)"> Philosophy
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox"  onchange="subjectSelected(this)"> Political Science / Economics / Geography
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="131"  onchange="addSubjectSelected(this)"> Political Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="132" onchange="addSubjectSelected(this)"> Economics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="133" onchange="addSubjectSelected(this)"> Geography
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Education / Psychology
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134" onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
            </div>
          </div>

          <div class="form-group" id="116_major" >
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> History / Philosophy / Psychology
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="128" onchange="addSubjectSelected(this)"> History
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="129" onchange="addSubjectSelected(this)"> Philosophy
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Political Science / Economics / Geography
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="131" onchange="addSubjectSelected(this)"> Political Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="132" onchange="addSubjectSelected(this)"> Economics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="133" onchange="addSubjectSelected(this)"> Geography
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Education / Psychology
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134" onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
            </div>
          </div>

          <div class="form-group" id="117_major">
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> History / Education / Psychology / Sociology
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="128" onchange="addSubjectSelected(this)"> History
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134" onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="135" onchange="addSubjectSelected(this)"> Sociology
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Economics / NSL */ Psychology / Geography
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="132" onchange="addSubjectSelected(this)"> Economics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="136" onchange="addSubjectSelected(this)"> NSL*
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="129" onchange="addSubjectSelected(this)"> Psychology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="133" onchange="addSubjectSelected(this)"> Geography
              </label>
            </div>
          </div>

          <div class="form-group" id="118_major">
            <label class="form-label">
              <input type="checkbox"  onchange="subjectSelected(this)"> Political Science / History / Geography/ NSL*
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="131" onchange="addSubjectSelected(this)"> Political Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="128" onchange="addSubjectSelected(this)"> History
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="133" onchange="addSubjectSelected(this)"> Geography
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="136" onchange="addSubjectSelected(this)"> NSL*
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Education / Mathematics / Psychology / Sociology / NSL*
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134" onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="137" onchange="addSubjectSelected(this)"> Mathematics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="135" onchange="addSubjectSelected(this)"> Sociology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="136" onchange="addSubjectSelected(this)"> NSL*
              </label>
            </div>
          </div>

          <div class="form-group" id="119_major">
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Sanskrit / Political Science / Psychology / NSL*
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="138" onchange="addSubjectSelected(this)"> Sanskrit
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="131" onchange="addSubjectSelected(this)"> Political Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="136" onchange="addSubjectSelected(this)"> NSL*
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Education / Home Science / Psychology / NSL* 
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134" onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="139" onchange="addSubjectSelected(this)"> Home Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="136" onchange="addSubjectSelected(this)"> NSL*
              </label>
            </div>
          </div>

          <div class="form-group" id="120_major">
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Mathematics / Economics / Education / Psychology / NSL*
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="137" onchange="addSubjectSelected(this)"> Mathematics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="132" onchange="addSubjectSelected(this)"> Economics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134" onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="136" onchange="addSubjectSelected(this)"> NSL*
              </label>
            </div>
            <label class="form-label">
              <input type="checkbox"  onchange="subjectSelected(this)"> Political Science / History / NSL*
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="131" onchange="addSubjectSelected(this)"> Political Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="128" onchange="addSubjectSelected(this)"> History
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="136" onchange="addSubjectSelected(this)"> NSL*
              </label>
            </div>
          </div>

          <div class="form-group" id="121_major">
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Political Science / Philosophy
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="131" onchange="addSubjectSelected(this)"> Political Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="129" onchange="addSubjectSelected(this)"> Philosophy
              </label>
            </div>

            <label class="form-label">
              <input type="checkbox"  onchange="subjectSelected(this)"> Education / Psychology
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134" onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
            </div>
          </div>

          <div class="form-group" id="122_major">
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Political Science / Economics / NSL*
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="131" onchange="addSubjectSelected(this)"> Political Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="132" onchange="addSubjectSelected(this)"> Economics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="136" onchange="addSubjectSelected(this)"> NSL*
              </label>
            </div>

            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)">  Philosophy / Home Science / Psychology 
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="129" onchange="addSubjectSelected(this)"> Philosophy
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="139" onchange="addSubjectSelected(this)"> Home Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
            </div>
          </div>

          <div class="form-group" id="123_major">
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Economics / Statistics / Geography
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="132" onchange="addSubjectSelected(this)"> Economics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="140" onchange="addSubjectSelected(this)"> Statistics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="133" onchange="addSubjectSelected(this)"> Geography
              </label>
            </div>
          </div>

          <div class="form-group" id="124_major">
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Education/ Political Science / Psychology / Sociology 
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134" onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="131" onchange="addSubjectSelected(this)"> Political Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130" onchange="addSubjectSelected(this)"> Psychology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="135" onchange="addSubjectSelected(this)"> Sociology
              </label>
            </div>

            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Economics / Philosophy / Home Science / Sociology / NSL* 
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="132" onchange="addSubjectSelected(this)"> Economics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="129" onchange="addSubjectSelected(this)"> Philosophy
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="139" onchange="addSubjectSelected(this)"> Home Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="135" onchange="addSubjectSelected(this)"> Sociology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="136" onchange="addSubjectSelected(this)"> NSL* 
              </label>
            </div>
          </div>

          <div class="form-group" id="125_major">
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Mathematics / Economics
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="137" onchange="addSubjectSelected(this)"> Mathematics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="132" onchange="addSubjectSelected(this)"> Economics
              </label>
            </div>
          </div>

          <div class="form-group"  id="126_major">
            <label class="form-label">
              <input type="checkbox"  onchange="subjectSelected(this)"> Education / Psychology / Economics / Sociology / NSL* 
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134"  onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="130"  onchange="addSubjectSelected(this)"> Psychology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="132"  onchange="addSubjectSelected(this)"> Economics
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="135"  onchange="addSubjectSelected(this)"> Sociology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="136"  onchange="addSubjectSelected(this)"> NSL* 
              </label>
            </div>
          </div>

          <div class="form-group" id="127_major">
            <label class="form-label">
              <input type="checkbox" onchange="subjectSelected(this)"> Education / Home Science / Sociology / NSL*  
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="134" onchange="addSubjectSelected(this)"> Education
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="139" onchange="addSubjectSelected(this)"> Home Science
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="135" onchange="addSubjectSelected(this)"> Sociology
              </label>
              <label class="form-label">
                <input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="136" onchange="addSubjectSelected(this)"> NSL* 
              </label>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>