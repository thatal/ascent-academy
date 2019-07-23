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
				<input type="hidden" name="preference" value="yes">
				<td>{{$number}}.</td>
				<td>
					<select name="preference_{{$number}}_subject_ids[]" class="form-control" required onchange="majorChanged(this,'#subject-td-science-major')">
						<option value="">Select major subject</option>
						<option value="67">Physics</option>
						<option value="68">Chemistry</option>
						<option value="69">Mathematics</option>
						<option value="70">Zoology</option>
						<option value="71">Botany</option>
						<option value="72">Statistics</option>
						<option value="73">Economics</option>
						<option value="74">Geography</option>
                        <option value="75">Home Science</option>
						<option value="76">Bio Technology</option>
					</select>
				</td>
				<td>
					<div class="form-group">
						<label class="form-label">
							<input type="checkbox" name="preference_{{$number}}_subject_ids[]" value="90"> General English
						</label>
						<label class="form-label">
							<input type="checkbox" name="preference_{{$number}}_subject_ids[]" value="91"> Functional English
						</label>
					</div>
				</td>
				<td id="subject-td-science-major">
                    {{-- physics --}}
					<div class="form-group parent_sub" id="67_major">
						<label class="form-label">
							<input type="checkbox" name="preference_{{$number}}_subject_ids[]" class="" value="77" onchange="subjectSelected(this)"> Mathematics
						</label>
						<label class="form-label">
							<input type="checkbox" class="" onchange="subjectSelected(this)"> Chemistry / Statistics / Computer Science
						</label>
						<div class="margin">
							<label class="form-label">
								<input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="174"  onchange="addSubjectSelected(this)"> Chemistry
							</label>
							<label class="form-label">
								<input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="175"  onchange="addSubjectSelected(this)"> Statistics
							</label>
							<label class="form-label">
								<input type="checkbox" name="preference_{{$number}}_subject_ids[]"  value="176"  onchange="addSubjectSelected(this)"> Computer Science
							</label>
						</div>
					</div>
                    {{-- Chemistry --}}
					<div class="form-group" id="68_major">
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="77"> Mathematics
						</label>
						<label class="form-label">
                            <input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="79"> Physics
                        </label>
                    </div>
                    {{-- mathmatics --}}
                    <div class="form-group" id="69_major">
                        <label class="form-label">
                            <input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="79"> Physics
                        </label>
                        <label class="form-label">
                            <input type="checkbox"  onchange="subjectSelected(this)" > Chemistry / Statistics / Computer Science / Geography
                        </label>
					{{-- </div> --}}
                        <div class="margin">
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="174"> Chemistry
                            </label>
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="175"> Statistics
                            </label>
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="176"> Computer Science
                            </label>
                            <label class="form-label">
    							<input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="80"> Geography
    						</label>
    						<label class="form-label">
    							<input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="81"> Economics
    						</label>
    					</div>
					{{-- <div class="form-group" id="70_major"> --}}
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" > Statistics / Computer Science
						</label>
                        <div class="margin">
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="175"> Statistics
                            </label>
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="176"> Computer Science
                            </label>
                        </div>
					</div>
                    {{-- End of mathematics --}}
                    {{-- Zoology --}}
					<div class="form-group"  id="70_major">
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="174"> Chemistry
						</label>
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" > Botany / Home Science
						</label>
                        <div class="margin">
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="82"> Botany
                            </label>
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="83"> Home Science
                            </label>
                        </div>
					</div>
                    {{-- botany --}}
					<div class="form-group"  id="71_major">
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="174"> Chemistry
						</label>
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" >  Zoology / Home Science
						</label>
                        <div class="margin">
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="84"> Zoology
                            </label>
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="83"> Home Science
                            </label>
                        </div>
					</div>
                    {{-- Statistics --}}
					<div class="form-group"  id="72_major">
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="77"> Mathematics
						</label>
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)"> Physics / Economics
						</label>
                        <div class="margin">
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="79"> Physics
                            </label>
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="81"> Economics
                            </label>
                        </div>
					</div>
                    {{-- Economics --}}
					<div class="form-group" id="73_major">
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="77"> Mathematics
						</label>
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="175"> Statistics
						</label>
					</div>
                    {{-- geography --}}
					<div class="form-group" id="74_major">
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="77"> Mathematics
						</label>
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="84"> Zoology
						</label>
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" > Physics / Botany
						</label>
                        <div class="margin">
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="79"> Physics
                            </label>
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="82"> Botany
                            </label>
    					</div>
					</div>
                    {{-- Home Science --}}
					<div class="form-group"  id="75_major">
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="174"> Chemistry
						</label>
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" >  Botany / Zoology
						</label>
                        <div class="margin">
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="82"> Botany
                            </label>
                            <label class="form-label">
                                <input type="checkbox"  onchange="addSubjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="84"> Zoology
                            </label>
                        </div>
					</div>
                    {{-- Biotechnology --}}
					<div class="form-group" id="76_major">
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="85"> Communicative English
						</label>
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="86"> Microbiology
						</label>
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="87"> Biochemistry – 1
						</label>
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="88"> Cell Biology
						</label>
						<label class="form-label">
							<input type="checkbox"  onchange="subjectSelected(this)" name="preference_{{$number}}_subject_ids[]"  value="89">  Practical
						</label>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>