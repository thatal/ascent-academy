<div class="card-body">
	@csrf
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<div class="form-group">
				<label class="form-label">Course</label>
				<select name="course_id" id="course" class="form-control" required>
					<option value="">Select Course</option>
					@foreach($courses as $course)
					<option value="{{$course->id}}" @isset($fee){{$fee->course_id==$course->id?'selected':''}}@endisset>{{$course->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="form-group">
				<label class="form-label">Stream</label>
				<select name="stream_id" id="stream" class="form-control" required>
					<option value="">Select Stream</option>
					@foreach($streams as $stream)
					<option value="{{$stream->id}}" @isset($fee){{$fee->stream_id==$stream->id?'selected':''}}@endisset>{{$stream->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="form-group">
				<label class="form-label">Semester</label>
				<select name="semester_id" id="semester" class="form-control" required>
					<option value="">Select Semester</option>
					@foreach($semesters as $semester)
					<option value="{{$semester->id}}" @isset($fee){{$fee->semester_id==$semester->id?'selected':''}}@endisset>{{$semester->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		@php
		$f_year_zero = date('Y');
		$f_year_one = date('Y')+1;
		$f_year_two = date('Y')+2;
		@endphp
		<div class="col-md-4 col-lg-4">
			<div class="form-group">
				<label class="form-label">Financial Year</label>
				<select name="financial_year" class="form-control" required>
					<option value="">Select Year</option>
					<option value="{{$f_year_zero.'-'.$f_year_one}}" @isset($fee){{$fee->financial_year==($f_year_zero.'-'.$f_year_one)?'selected':''}}@endisset>{{$f_year_zero.'-'.$f_year_one}}</option>
					<option value="{{$f_year_one.'-'.$f_year_two}}" @isset($fee){{($fee->financial_year==($f_year_one.'-'.$f_year_two))?'selected':''}}@endisset>{{$f_year_one.'-'.$f_year_two}}</option>
				</select>
			</div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="form-group">
				<label class="form-label">Year</label>
				<select name="year" class="form-control" required>
					<option value="">Select Year</option>
					<option value="{{$f_year_zero}}" @isset($fee){{$fee->year==($f_year_zero)?'selected':''}}@endisset>{{$f_year_zero}}</option>
					<option value="{{$f_year_one}}" @isset($fee){{$fee->year==($f_year_one)?'selected':''}}@endisset>{{$f_year_one}}</option>
				</select>
			</div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="form-group">
				<label class="form-label">Gender</label>
				<select name="gender" class="form-control" required>
					<option value="">Select Gender</option>
					<option value="Male" @isset($fee){{$fee->gender=='Male'?'selected':''}}@endisset>Male</option>
					<option value="Female" @isset($fee){{$fee->gender=='Female'?'selected':''}}@endisset>Female</option>
				</select>
			</div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="form-group">
				<label class="form-label">Practical</label>
				<select name="practical" class="form-control" required>
					<option value="">Select</option>
					<option value="1" @isset($fee){{$fee->practical==1?'selected':''}}@endisset>Yes</option>
					<option value="0" @isset($fee){{$fee->practical==0?'selected':''}}@endisset>No</option>
				</select>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered table-smaller-font" id="fee_head_table">
			<thead>
				<tr>
					<th>
						<label class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" id="global_required" checked>
							<span class="custom-control-label"></span>
						</label>
					</th>
					<th>Fee Head</th>
					<th>Amount</th>
					<th>
						<label class="custom-control custom-checkbox custom-control-inline" data-toggle="tooltip" data-title="Check if free applicable." data-container="body">
							<input type="checkbox" class="custom-control-input" id="global_free" checked>
							<span class="custom-control-label">Free Applied</span>
						</label>
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($fee_heads as $index =>  $fee_head)
				@php
				if(isset($fee))
					$structure = $fee->feeStructures->where('fee_head_id',$fee_head->id)->first();
				@endphp
				<tr class="free-class required-class">
					<td>
						<label class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" name="is_required[{{$index}}]" value="1" id="required_fee_head" @if(isset($fee)) @if($structure)checked @endif @else checked @endif>
							<span class="custom-control-label"></span>
						</label>
					</td>
					<td>
						<input type="text" class="form-control " value="{{$fee_head->name}}" readonly>
						<input type="hidden" name="fee_heads[{{$index}}]" value="{{$fee_head->id}}" readonly>
					</td>
					<td>
						<input type="number" name="amounts[{{$index}}]" class="form-control amounts text-right" min="0" minlength="1" @if(isset($fee)) @if($structure) value="{{$structure->amount}}" @endif @else value="0" @endif>
					</td>
					<td>
						<label class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" name="is_free[{{$index}}]" value="1" id="is_free" @if(isset($fee) && !empty($structure)) @if($structure->is_free)checked @endif @else checked @endif>
							<span class="custom-control-label"></span>
						</label>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th colspan="2" class="text-right">Total</th>
					<th id="total" class="text-right">0.00</th>
					<th id=""></th>
				</tr>
			</tfoot>

		</table>
	</div>
</div>