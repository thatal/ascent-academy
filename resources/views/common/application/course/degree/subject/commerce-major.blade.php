<div class="col-md-12 col-lg-12 degree-commerce-major degree-panel d-none">
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
          <select name="preference_{{$number}}_subject_ids[]" class="form-control" required>
            <option value="">Select major subject</option>
            <option value="67">Accountancy(with a special paper Cost Accounting)</option>
            <option value="68">Management(with a special paper Human Resource Management)</option>
            <option value="69">Management(with a special paper Rural & Micro Finance)</option>
          </select>
        </td>
        <td>
          <div class="form-group">
            <label class="form-label">
              <input type="radio" name="preference_{{$number}}_subject_ids[]" class="Science" value="90" required> Business Mathematics
            </label>
            <label class="form-label">
              <input type="radio" name="preference_{{$number}}_subject_ids[]" class="Science" value="91" required> Financial Accounting-I 
            </label>
            <label class="form-label">
              <input type="radio" name="preference_{{$number}}_subject_ids[]" class="Science" value="91" required> Business Organization
            </label>
            <label class="form-label">
              <input type="radio" name="preference_{{$number}}_subject_ids[]" class="Science" value="91" required> Entrepreneurship Development 
            </label>
            <label class="form-label">
              <input type="radio" name="preference_{{$number}}_subject_ids[]" class="Science" value="91" required> Indian Financial System
            </label>
          </div>
        </td>
        <td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>