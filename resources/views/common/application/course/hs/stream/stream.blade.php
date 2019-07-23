<div class="col-md-6 col-lg-6 hs-stream @isset($application){{($application->course_id==1)?'': 'd-none'}}@else d-none @endisset">
	<div class="form-group ">
		<label class="form-label">Stream<span class="form-required">*</span></label>
		{{-- <label class="form-label">
			<input type="radio" name="stream_id" class="Science" value="1" @isset($application){{($application->appliedStream->stream_id==1)?'checked': ''}}@endisset required> Science
		</label>
		<label class="form-label">
			<input type="radio" name="stream_id" class="Arts" value="2" @isset($application){{($application->appliedStream->stream_id==2)?'checked': ''}}@endisset required> Arts
		</label>
		<label class="form-label">
			<input type="radio" name="stream_id" class="Commerce" value="3" @isset($application){{($application->appliedStream->stream_id==3)?'checked': ''}}@endisset required> Commerce
		</label> --}}
        <select name="semester_id" class="form-control" required>
            <option value="">Select Stream</option>
            <option value="1" @isset($application){{($application->appliedStream->stream_id==1)?'selected': ''}}@endisset >Science</option>
            <option value="2" @isset($application){{($application->appliedStream->stream_id==2)?'selected': ''}}@endisset>Arts</option>
            <option value="3" @isset($application){{($application->appliedStream->stream_id==3)?'selected': ''}}@endisset>Commerce</option>
        </select>
	</div>
</div>