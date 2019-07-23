<div class="col-md-6 col-lg-6 hs-semester @isset($application){{($application->course_id==1)?'': 'd-none'}}@else d-none @endisset">
	<div class="form-group">
		<div id="semester">
			<label class="form-label">Semester<span class="form-required">*</span></label>
			<label class="form-label">
				<input type="radio" name="semester_id" class="rdSemester" value="1" @isset($application){{($application->semester_id==1)?'checked': ''}}@endisset required> 1st Year
			</label>
			<label class="form-label">
				<input type="radio" name="semester_id" class="rdSemester" value="2" @isset($application){{($application->course_id==2)?'checked': ''}}@endisset required> 2nd Year
			</label>
		</div>
	</div>
</div>