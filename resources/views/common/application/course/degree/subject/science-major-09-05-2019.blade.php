<div class="col-md-12 col-lg-12 degree-science-major degree-panel d-none">
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
        <td>{{$number}}.</td>
        <td>
          <select name="major" class="form-control" required>
            <option value="">Select major subject</option>
            <option value="67">Physics</option>
            <option value="68">Chemistry</option>
            <option value="69">Mathematics</option>
            <option value="70">Zoology</option>
            <option value="71">Botany</option>
            <option value="72">Statistics</option>
            <option value="73">Economics</option>
            <option value="73">Geography</option>
            <option value="73">Home Science</option>
          </select>
        </td>
        <td>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="90" required> General English
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="91" required> Functional English
            </label>
          </div>
        </td>
        <td>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Mathematics
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Chemistry / Statistics / Computer Science
            </label>
            <div class="margin">
              <label class="form-label">
                <input type="radio" name="stream_id" class="Science" value="77"> Chemistry
              </label>
              <label class="form-label">
                <input type="radio" name="stream_id" class="Science" value="77"> Statistics
              </label>
              <label class="form-label">
                <input type="radio" name="stream_id" class="Science" value="77"> Computer Science
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Mathematics
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Physics
            </label>
          </div>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Physics
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Chemistry / Statistics / Computer Science / Geography
            </label>
          </div>
          <div class="margin">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Chemistry
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Statistics
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Computer Science
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Geography
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Economics
            </label>
          </div>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Statistics / Computer Science
            </label>
          </div>
          <div class="margin">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Statistics
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Computer Science
            </label>
          </div>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Chemistry
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Botany / Home Science
            </label>
          </div>
          <div class="margin">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Botany
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Home Science
            </label>
          </div>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Chemistry
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77">  Zoology / Home Science
            </label>
          </div>
          <div class="margin">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Zoology
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Home Science
            </label>
          </div>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Mathematics
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Physics / Economics
            </label>
          </div>
          <div class="margin">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Physics
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Economics
            </label>
          </div>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Mathematics
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Statistics
            </label>
          </div>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Mathematics
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Zoology
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Physics / Botany
            </label>
          </div>
          <div class="margin">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Physics
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Botany
            </label>
          </div>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Chemistry
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77">  Botany / Zoology
            </label>
          </div>
          <div class="margin">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Botany
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Zoology
            </label>
          </div>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Communicative English
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Microbiology
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Biochemistry – 1
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77"> Cell Biology
            </label>
            <label class="form-label">
              <input type="radio" name="stream_id" class="Science" value="77">  Practical
            </label>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>